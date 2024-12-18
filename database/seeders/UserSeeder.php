<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Customer 1',
                'email' => 'customer1@gmail.com',
                'password' => Hash::make('12345678'),
                'role'  =>'customer',
            ],[
                'name' => 'Distributor',
                'email' => 'distributor@gmail.com',
                'password' => Hash::make('12345678'),
                'role'  =>'distributor',
            ],[
                'name' => 'Operator',
                'email' => 'operator@gmail.com',
                'password' => Hash::make('12345678'),
                'role'  =>'operator',
            ]
        ]);
    }
}
