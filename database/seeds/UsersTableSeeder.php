<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'admin',
            'nis' => '10801080',
            'jk' => 'L',
            'password' => 'adminganteng',
            'level' => 'admin',
        ]);

    }
}
