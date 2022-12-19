<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin123')
         ]);

         Profile::create([
            'employee_code'=>'2113201044',
            'gender'=>'male',
            'address'=>'office',
            'phone_number'=>'08931237812',
            'users_id'=>'1',
            ]);
    }
}
