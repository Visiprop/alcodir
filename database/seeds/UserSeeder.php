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
            'photo_path' => 'alcodir\images\users\Rendy.jpg',
            'password' => Hash::make('rendykayukayu123'),
        ]);

        User::create([
            'name' => 'Syaekhu',
            'email' => 'syaekhu@visiprop.com',
            'photo_path' => 'alcodir\images\users\Syaekhu.jpg',
            'password' => Hash::make('syaekhukayukayu123'),
        ]);

        User::create([
            'name' => 'Zulkifli',
            'email' => 'zulkifli@visiprop.com',
            'photo_path' => 'alcodir\images\users\Zulkifli.jpg',
            'password' => Hash::make('zulkiflikayukayu123'),
        ]);
    }

}
