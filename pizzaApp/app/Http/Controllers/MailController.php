<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class MailController extends Controller
{
    public function sendEmail(){
        $userId=session('sid')->id;
        $data=DB::table('orders')->join('menus','orders.product_id','menus.id')
        ->select('orders.*')->where('orders.user_id',$userId)->get();
        foreach($data as $d){
        $details=[
            'title'=>'Title: Mail regarding your order',
            'body'=>"Body: Your order is Placed. Order Id:$d->order_id"
        ];
        Mail::to("session('sid')->email")->send(new TestMail($details));
        }
    }
}
