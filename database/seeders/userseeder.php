<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = [
            [
                'name' => 'Admin1',
                'email' => 'admin1@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('1234')
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => bcrypt('1234')
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
