<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SystemAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'System Admin',
            'email'=>'systemadmin@gmail.com',
            'password'=>Hash::make('admin@assettracker'),
            'remember_token'=>csrf_token()
        ]);
    }
}
