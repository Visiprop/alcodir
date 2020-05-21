<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Foundation\Auth\RegistersUsers;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $this->createSoldier();
    }

    

    public function createSoldier()
    {
        User::create([
            'name' => 'januar',
            'email' => 'januar@visiprop.com',
            'password' => Hash::make('qwerty123'),
        ]);

        User::create([
            'name' => 'ipang',
            'email' => 'ipang@visiprop.com',
            'password' => Hash::make('qwerty123'),
        ]);
    }

}
