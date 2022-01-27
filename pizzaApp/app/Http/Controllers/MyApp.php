<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Order;
Use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Facades\DB;
use Session;
class MyApp extends Controller
{
    
    public function postregister(Request $req){
        $validate=$req->validate([
            'name'=>'required',
            'email'=>'required',
            'pass'=>'required|min:5|max:15',
            'mobile'=>"required|digits:10",
            'add'=>'required'
        ]);
        if($validate){
        $data=new Customer();
        $data->email=$req->email;
        $data->password=Hash::make($req->pass);
        $data->name=$req->name;
        $data->mobile=$req->mobile;
        $data->address=$req->add;
        $data->save();
        return redirect('/');
        }
    }
    public function postlogin(Request $req){
        $email=$req->email;
        $password=$req->pass;
        $data=Customer::where(['email'=>$email])->first();
        if(Hash::check($password,$data->password))
            {
             $menudata=Menu::all();
             $req->session()->put('sid',$data);
             session(['cartcnt'=>count(Cart::where('user_id',session('sid')->id)->get())]);
             return view("menu",['menudata'=>$menudata]);
            }
            else {
                return back()->with('errMsg',"Email or Password is not correct");
            }
    }
    public function displayprofile(){
        $id=session('sid')->id;
        $data=Customer::find($id);
        return view('profile',['data'=>$data]);

    }
    public function postupdate(Request $req){
        $id=session('sid')->id;
        $data=Customer::find($id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->mobile=$req->mobile;
        $data->address=$req->add;
        $data->save();
        return redirect('pizza/profile');

    }

    public function delete($id){
        $data=Cart::where(['product_id'=>$id,'email'=>session('sid')->email])->first();
        $data->delete();
        return view('menu');

    }
    public function add_to_cart(Request $req){
        $data=Cart::where(['product_id'=>$req->product_id,'user_id'=>session('sid')->id])->first();
        if(empty($data)){
        $cart=new Cart();
        $cart->user_id=session('sid')->id;
        $cart->product_id=$req->product_id;
        if($cart->save()){
        session(['cartcnt'=>count(Cart::where('user_id',session('sid')->id)->get())]);
        return redirect('pizza/menu');
        }
        }
        else{
            $data->quantity=$data->quantity+1;
            $data->save();
            return redirect('pizza/menu');
        }
    }
    public function cartlist(){
        $userId=session('sid')->id;
        $data=DB::table('carts')->join('menus','carts.product_id','menus.id')
        ->select('menus.*','carts.id as cart_id','carts.quantity as q')->where('carts.user_id',$userId)->get();
        return view('cart',['item'=>$data]);

    }
    public function removeCart($id){
        $data=Cart::where('id',$id)->first();
        if($data->quantity>1){
            $data->quantity=$data->quantity-1;
            $data->save();
            return redirect('pizza/cart');
        }else{
        Cart::destroy($id);
        session(['cartcnt'=>count(Cart::where('user_id',session('sid')->id)->get())]);
        return redirect('pizza/cart');
        }
    }
    public function checkout(){
        $userId=session('sid')->id;
        $data=DB::table('carts')->join('menus','carts.product_id','menus.id')
        ->select('menus.*','carts.id as cart_id','carts.quantity as q')->where('carts.user_id',$userId)->get();
        $total=0;
        foreach($data as $d){
            $price=$d->price*$d->q;
            $total=$total+$price;
        }
        return view('checkout',['total'=>$total]);
    }
    public function postcheckout(Request $req){
        $val=$req->validate([
            'cardno'=>'required|digits:16',
        ]);
        if($val){
            $pay=new Payment();
            $pay->cardnumber=$req->cardno;
            $pay->user_id=session('sid')->id;
            $pay->price=$req->total;
            if($pay->save()){
            $data=DB::table('carts')->join('menus','carts.product_id','menus.id')
            ->select('menus.*','carts.id as cart_id','carts.quantity as q')->where('carts.user_id',session('sid')->id)->get();
            foreach($data as $d){
                $order=new Order();
                $order->user_id=session('sid')->id;
                $order->product_id=$d->id;  
                $order->order_id=rand(1000,10000);
                $order->quantity=$d->q;
                $order->save();
                Cart::destroy($d->cart_id);
                    $details=[
                        'title'=>'Mail regarding your order',
                        'body'=>"Your order is Placed. Order Id:$order->order_id"
                    ];
                    Mail::to(session('sid')->email)->send(new TestMail($details));
                
            }
            session(['cartcnt'=>count(Cart::where('user_id',session('sid')->id)->get())]);


            return view('success');
            }
        }
    }
    public function orders(){
        $userId=session('sid')->id;
        $data=DB::table('orders')->join('menus','orders.product_id','menus.id')
        ->select('menus.*','orders.quantity as q','orders.order_id as order_id')->where('orders.user_id',$userId)->get();
        return view('order',['item'=>$data]);      
    }
    public function logout(){
        session()->forget('sid');
        session()->forget('cartcnt');
        return redirect('pizza/login');
    }
    
}