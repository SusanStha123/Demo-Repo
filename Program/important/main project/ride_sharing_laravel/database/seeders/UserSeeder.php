<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'roles' => 0,
            'password' => bcrypt('admin'),
        ];

        $passenger = [
            'name' => 'passenger',
            'email' => 'passenger@gmail.com',
            'roles' => 1,
            'password' => bcrypt('passenger'),
        ];

        $driver = [
            'name' => 'driver',
            'email' => 'driver@gmail.com',
            'roles' => 2,
            'password' => bcrypt('driver'),
        ];

        User::create($admin);
        User::create($passenger);
        User::create($driver);
    }
}
