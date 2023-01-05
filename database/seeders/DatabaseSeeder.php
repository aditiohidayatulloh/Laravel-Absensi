<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Salary;
use App\Models\Profile;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Division;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Salary::create([
            'class'=>'I',
            'salary'=>'3.500.000',
        ]);
        Division::create([
            'division_name'=>'Administrsi',
            'description'=>'Bagian Pengurusan Administrasi',
        ]);
        Position::create([
            'position_name'=>'Administrator',
            'salary_id'=>'1',
            'division_id'=>'1'
        ]);
        User::create([
            'name'=> 'Admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin123'),
            'position_id'=>'1'
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
