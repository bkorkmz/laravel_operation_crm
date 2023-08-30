<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::firstOrCreate(['name' => 'Super admin', 'guard_name' => 'web']);
        // $role2 = Role::firstOrCreate(['name' => 'administrator','guard_name'=>'web']);
        $role3 = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $role4 = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        // $role5 = Role::firstOrCreate(['name' => 'user','guard_name'=>'web']);


        //       User::factory(100000)->create();
        $user_super_admin =  User::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' =>   '$10$fLmCnHdAlieXsq5FwiF9s.yQ/qZ1wZ3tOXesYmNpyE/3G459/MJIq',
            'tc_no' =>     '1234567890',
            'user_check' =>   '1',
        ]);
        $user_super_admin->assignRole($role1);

        //       $user_admin=  User::firstOrCreate([
        //            'name' => 'Admin',
        //            'email' => 'admin@crm.com',
        //            'password'=>     Hash::make('123123123'),
        //           'tc_no'=>     '1234567890',
        //            'user_check'=>   '1',
        //        ]);
        //        $user_admin->assignRole($role2);
        //        $user_editor= User::firstOrCreate([
        //            'name' => 'teacher',
        //            'email' => 'teacher@crm.com ',
        //            'password'=>     Hash::make('123123123'),
        //            'tc_no'=>     '1234567890',
        //            'user_check'=>   '1',
        //        ]);
        //        $user_editor->assignRole($role3);
        $user_creator = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@crm.com ',
            'password' =>   '$10$PoMw9xKf1GEgIy9L3Xvzaevs.3fpMAjZ0yuYEqVy2B4wMU5xhFewK',
            'tc_no' =>     '1234567890',
            'user_check' =>   '1',
        ]);
        $user_creator->assignRole($role3);
        $user_user = User::firstOrCreate([
            'name' => 'user',
            'email' => 'user@crm.com ',
            'password' =>    '$10$PoMw9xKf1GEgIy9L3Xvzaevs.3fpMAjZ0yuYEqVy2B4wMU5xhFewK',
            'tc_no' =>     '1234567890',
            'user_check' =>   '1',
        ]);
        $user_user->assignRole($role4);
    }
}
