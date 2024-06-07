<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'kareem',
            'last_name' => 'shaban',
            'email_address' => 'kareem@gmail.com',
            'password' => Hash::make('password'), // password
            'phone_number'=>'01222222222',
            'gender' => 'male',
            'governorate_id'=>2,
            'city_id'=>3,
            'neighborhood_id'=>4,
            'postal_code'=>'',
            'street_address'=>'بنها , أتريب',
            'email_verified_at' => now(),
        ]);
    }
}