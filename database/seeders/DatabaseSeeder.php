<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use App\Models\Doctor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User();
        $user->name = 'Hoàng An';
        $user->email = 'hoangan.web@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();

//        $doctor = new Doctor();
//        $doctor->name = 'Hoàng An Doctor';
//        $doctor->email = 'contact@pveser.com';
//        $doctor->password = Hash::make('123456');
//        $doctor->save();

    }
}
