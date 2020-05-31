<?php

use Illuminate\Database\Seeder;
use App\RoleUser;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role ID
        //1 = superadmin
        //2 = management
        //3 = soldier
        
        //

        // //Create super admin
        // RoleUser::create([
        //     'user_id' => 1,
        //     'role_id' => 1,
        // ]);

        // //Create Management
        // for ($i=2; $i < 7 ; $i++) { 
        //     RoleUser ::create([
        //         'user_id' => $i,
        //         'role_id' => 2,
        //     ]);
        // }

        // //Create Soldier
        // for ($i=7; $i < 10 ; $i++) { 
        //     RoleUser ::create([
        //         'user_id' => $i,
        //         'role_id' => 3,
        //     ]);
        // }

        //Create Israndy
        RoleUser::create([
            'user_id' => 11,
            'role_id' => 2,
        ]);
    }
}
