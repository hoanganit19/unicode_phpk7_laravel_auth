<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

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
        // \App\Models\User::factory(10)->create();

        $user = new User();
        $user->name = 'Hoàng An';
        $user->email = 'hoangan.web@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();
    }
}
