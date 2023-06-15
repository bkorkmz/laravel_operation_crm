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

        Permissions::firstOrCreate(['name' => 'view_all_users','guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_menu_users', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_trashed_users', 'guard_name' => 'web']);


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
        Permissions::firstOrCreate(['name' => 'view_trashed_product', 'guard_name' => 'web' ]);

        //Post module
        Permissions::firstOrCreate(['name' => 'view_menu_post', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_all_post', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_post', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'add_post', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'edit_post', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'delete_post', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'restore_post', 'guard_name' => 'web' ]);
        //post Category
        Permissions::firstOrCreate(['name' => 'view_menu_category', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_category', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_all_category', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'add_category', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'edit_category', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'delete_category', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'restore_category', 'guard_name' => 'web' ]);
 //post photo gallery
        Permissions::firstOrCreate(['name' => 'view_menu_photogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_photogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_all_photogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'add_photogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'edit_photogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'delete_photogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'restore_photogallery', 'guard_name' => 'web' ]);
 //post video gallery
        Permissions::firstOrCreate(['name' => 'view_menu_videogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_videogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_all_videogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'add_videogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'edit_videogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'delete_videogallery', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'restore_videogallery', 'guard_name' => 'web' ]);
 //post comment
        Permissions::firstOrCreate(['name' => 'view_menu_comment', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_comment', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_all_comment', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'read_comment', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'delete_comment', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'publish_comment', 'guard_name' => 'web' ]);
 //settings
        Permissions::firstOrCreate(['name' => 'view_menu_settings', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_settings', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'view_all_settings', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'create_settings', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'edit_settings', 'guard_name' => 'web' ]);
        Permissions::firstOrCreate(['name' => 'update_settings', 'guard_name' => 'web' ]);

        
        
        
        
        

//        $role = Role::whereName('Super admin')->first();
        $role = Permissions::all();
        Role::whereName('Super admin')->first()->givePermissionTo($role);

    }

}
