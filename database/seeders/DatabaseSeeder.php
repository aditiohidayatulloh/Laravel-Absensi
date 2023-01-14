<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Salary;
use App\Models\Profile;
use App\Models\Division;
use App\Models\Position;
use App\Models\Schedule;
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
        Salary::create([
            'class'=>'I',
            'salary'=>'3.500.000',
        ]);
        Division::create([
            'division_name'=>'Administrsi',
            'description'=>'Bagian Pengurusan Administrasi',
        ]);
        Division::create([
            'division_name'=>'Web Development',
            'description'=>'Tim Pengembangan Aplikasi',
        ]);
        Position::create([
            'position_name'=>'Administrator',
            'salary_id'=>'1',
            'division_id'=>'1'
        ]);
        Position::create([
            'position_name'=>'Fullstack Web Developer',
            'salary_id'=>'1',
            'division_id'=>'2'
        ]);
        User::create([
            'name'=> 'Admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin123'),
            'position_id'=>'1'
         ]);

         Profile::create([
            'employee_code'=>'2113201044',
            'gender'=>'Laki-Laki',
            'address'=>'office',
            'phone_number'=>'08931237812',
            'users_id'=>'1',
        ]);
        Schedule::create([
            'day'=>'Senin',
            'shifts'=>'Pagi',
            'time_in'=>'08:00:00',
            'time_out'=>'16:00:00',
        ]);
        Schedule::create([
            'day'=>'Selasa',
            'shifts'=>'Pagi',
            'time_in'=>'08:00:00',
            'time_out'=>'16:00:00',
        ]);
        Schedule::create([
            'day'=>'Rabu',
            'shifts'=>'Pagi',
            'time_in'=>'08:00:00',
            'time_out'=>'16:00:00',
        ]);
        Schedule::create([
            'day'=>'Kamis',
            'shifts'=>'Pagi',
            'time_in'=>'08:00:00',
            'time_out'=>'16:00:00',
        ]);
        Schedule::create([
            'day'=>'Jumat',
            'shifts'=>'Pagi',
            'time_in'=>'08:00:00',
            'time_out'=>'16:00:00',
        ]);
    }
}
