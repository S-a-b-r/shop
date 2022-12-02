<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'admin@admin',
            'email_verified_at' => now(),
            'password'=> Hash::make('admin'),
            'address'=>'г. Ижевск, ул. Удмуртская, д.212, кв.27',
            'gender'=>1,
            'is_admin'=>true,
       ]);
    }
}
