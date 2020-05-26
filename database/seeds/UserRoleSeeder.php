<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\UserRole;

class UserRoleSeeder extends Seeder
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

        UserRole::create([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        for ($i=2; $i < 7 ; $i++) { 
            UserRole ::create([
                'user_id' => $i,
                'role_id' => 2,
            ]);
        }

        for ($i=7; $i < 10 ; $i++) { 
            UserRole ::create([
                'user_id' => $i,
                'role_id' => 3,
            ]);
        }
        
    }
}
