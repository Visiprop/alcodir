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
        // $this->createSuperadmin();     
        // $this->createManagement();
        $this->createSoldier();
    }

    public function createSuperadmin()
    {
        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@visiprop.com',
            'photo_path' => 'alcodir\images\users\Superadmin.jpg',
            'password' => Hash::make('qwerty123'),
        ]);
    }

    public function createManagement()
    {
        User::create([
            'name' => 'Januar',
            'email' => 'januar@visiprop.com',
            'photo_path' => 'alcodir\images\users\Januar.jpg',
            'password' => Hash::make('qwerty123'),
        ]);

        User::create([
            'name' => 'Gayuh',
            'email' => 'gayuh@visiprop.com',
            'photo_path' => 'alcodir\images\users\Gayuh.jpg',
            'password' => Hash::make('qwerty123'),
        ]);

        User::create([
            'name' => 'Rohmat',
            'email' => 'rohmat@visiprop.com',
            'photo_path' => 'alcodir\images\users\Rohmat.jpg',
            'password' => Hash::make('qwerty123'),
        ]);

        User::create([
            'name' => 'Donny',
            'email' => 'donny@visiprop.com',
            'photo_path' => 'alcodir\images\users\Donny.jpg',
            'password' => Hash::make('qwerty123'),
        ]);

        User::create([
            'name' => 'Teguh',
            'email' => 'teguh@visiprop.com',
            'photo_path' => 'alcodir\images\users\Teguh.jpg',
            'password' => Hash::make('qwerty123'),
        ]);

        
    }

    public function createSoldier()
    {

        // User::create([
        //     'name' => 'Rendy Ipangaribuan',
        //     'email' => 'rendy@visiprop.com',
        //     'photo_path' => 'alcodir\images\users\Rendy.jpg',
        //     'password' => Hash::make('rendykayukayu123'),
        // ]);

        // User::create([
        //     'name' => 'Syaekhu',
        //     'email' => 'syaekhu@visiprop.com',
        //     'photo_path' => 'alcodir\images\users\Syaekhu.jpg',
        //     'password' => Hash::make('syaekhukayukayu123'),
        // ]);

        // User::create([
        //     'name' => 'Zulkifli',
        //     'email' => 'zulkifli@visiprop.com',
        //     'photo_path' => 'alcodir\images\users\Zulkifli.jpg',
        //     'password' => Hash::make('zulkiflikayukayu123'),
        // ]);

        User::create([
            'name' => 'Israndy',
            'email' => 'israndy@visiprop.com',
            'photo_path' => 'alcodir\images\users\Israndy.jpg',
            'password' => Hash::make('gemini86'),
        ]);
    }

}
