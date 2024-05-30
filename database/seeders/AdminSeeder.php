<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = [
            ["Username"=>'admin',"email_admin"=>'admin@gmail.com',"password"=>Hash::make('admin1234')],
           
        ];
        admin::insert($admin);
    }
}
