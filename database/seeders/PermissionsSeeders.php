<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionsSeeders extends Seeder
{

    public function run()
    {
        Permissions::firstOrCreate([
            'name' => 'view_menu_users',
            'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_users','guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_menu_users', 'guard_name' => 'web' ]);


           ///Roles Permissions

        Permissions::firstOrCreate(['name' => 'view_menu_roles', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_all_roles', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'add_roles', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'edit_roles', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'delete_roles', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'restore_roles', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_roles', 'guard_name' => 'web' ]);
           ///Product Permissions

        Permissions::firstOrCreate(['name' => 'view_menu_product', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_all_product', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'add_product', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'edit_product', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'delete_product', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'restore_product', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_product', 'guard_name' => 'web' ]);

//        $role = Role::whereName('Super admin')->first();
        $role = Permissions::all();
        Role::whereName('Super admin')->first()->givePermissionTo($role);

    }

}
