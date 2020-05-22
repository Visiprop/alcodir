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
            'name' => 'Rendy',
            'email' => 'rendy@visiprop.com',
            'password' => Hash::make('qwerty123'),
        ]);

        User::create([
            'name' => 'Saehu',
            'email' => 'saehu@visiprop.com',
            'password' => Hash::make('qwerty123'),
        ]);

        User::create([
            'name' => 'Sule',
            'email' => 'zulkifli@visiprop.com',
            'password' => Hash::make('qwerty123'),
        ]);
    }

}
