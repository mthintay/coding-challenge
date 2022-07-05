<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert(
            [
                'username'  => Str::random(10),
                'email'     => Str::random(10).'@gmail.com',
                'password'  => md5('password'),
                'firstname' => Str::random(10),
                'lastname'  => Str::random(10),
                'gender'    => 'male',
                'country'   => 'Australia',
                'city'      => 'Canberra',
                'phone'     => '00-1234-5678'
            ]
        );
    }
}
