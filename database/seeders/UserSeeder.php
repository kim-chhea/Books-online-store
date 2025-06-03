<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name'     => 'Alice Johnson',
                'role_id'  => 1,
                'email'    => 'alice.johnson@example.com',
                'password' => Hash::make('password1'),
            ],
            [
                'name'     => 'Brian Smith',
                'role_id'  => 2,
                'email'    => 'brian.smith@example.com',
                'password' => Hash::make('password2'),
            ],
            [
                'name'     => 'Chloe Brown',
                'role_id'  => 4,
                'email'    => 'chloe.brown@example.com',
                'password' => Hash::make('password3'),
            ],
            [
                'name'     => 'David Lee',
                'role_id'  => 2,
                'email'    => 'david.lee@example.com',
                'password' => Hash::make('password4'),
            ],
            [
                'name'     => 'Emma Davis',
                'role_id'  => 1,
                'email'    => 'emma.davis@example.com',
                'password' => Hash::make('password5'),
            ],
        ];
        
       foreach($users as $user)
       {
        User::create($user);
       }
    }
}
