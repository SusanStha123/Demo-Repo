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
            'name'=>'admin',
            'email' => 'admin@example.com',
            'roles' => 0,
            'password' => bcrypt('admin@123'),
        ];

        $passenger = [
            'name'=>'passenger',
            'email' => 'passenger@example.com',
            'roles' => 1,
            'password' => bcrypt('passenger@123'),
        ];

        $driver = [
            'name'=>'driver',
            'email' => 'driver@example.com',
            'roles' => 2,
            'password' => bcrypt('driver@123'),
        ];

        User::create($admin);
        User::create($passenger);
        User::create($driver);
    }
}
