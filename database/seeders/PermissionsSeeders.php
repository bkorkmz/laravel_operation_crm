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

        Permissions::firstOrCreate(['name' => 'view_dashboard_users', 'guard_name' => 'web']);

        Permissions::firstOrCreate(['name' => 'view_all_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_menu_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_trashed_users', 'guard_name' => 'web']);

        Permissions::firstOrCreate(['name' => 'view_my_profile_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_my_profile_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'update_my_profile_users', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'bloke_my_profile_users', 'guard_name' => 'web']);

        ///Roles Permissions
        Permissions::firstOrCreate(['name' => 'view_menu_roles', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_roles', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_roles', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_roles', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_roles', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_roles', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_roles', 'guard_name' => 'web']);
        ///Product Permissions
        Permissions::firstOrCreate(['name' => 'view_menu_product', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_product', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_product', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_product', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_product', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_product', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_product', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_trashed_product', 'guard_name' => 'web']);
        //Post module
        Permissions::firstOrCreate(['name' => 'view_menu_post', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_post', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_post', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_post', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_post', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_post', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_post', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_news_ajans_post', 'guard_name' => 'web']);
        
        //post Category
        Permissions::firstOrCreate(['name' => 'view_menu_category', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_category', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_category', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_category', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_category', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_category', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_category', 'guard_name' => 'web']);
        //post photo gallery
        Permissions::firstOrCreate(['name' => 'view_menu_photogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_photogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_photogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_photogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_photogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_photogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_photogallery', 'guard_name' => 'web']);
        //post video gallery
        Permissions::firstOrCreate(['name' => 'view_menu_videogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_videogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_videogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'add_videogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_videogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_videogallery', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'restore_videogallery', 'guard_name' => 'web']);
        //post comment
        Permissions::firstOrCreate(['name' => 'view_menu_comment', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_comment', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_comment', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'read_comment', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_comment', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'publish_comment', 'guard_name' => 'web']);
        
        Permissions::firstOrCreate(['name' => 'message_information_comment', 'guard_name' => 'web']);

        //settings
        Permissions::firstOrCreate(['name' => 'view_menu_settings', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_settings', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_settings', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'create_settings', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_settings', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'update_settings', 'guard_name' => 'web']);
        //article
        Permissions::firstOrCreate(['name' => 'view_menu_article', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_article', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_all_article', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'create_article', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_article', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'update_article', 'guard_name' => 'web']);
        //Tems
        Permissions::firstOrCreate(['name' => 'view_menu_teams', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_teams', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'create_teams', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_teams', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'update_teams', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_teams', 'guard_name' => 'web']);
       //Slider - Portfolio
        Permissions::firstOrCreate(['name' => 'view_menu_slider', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_slider', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'create_slider', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_slider', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'update_slider', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_slider', 'guard_name' => 'web']);
       //Services
        Permissions::firstOrCreate(['name' => 'view_menu_services', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_services', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'create_services', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_services', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'update_services', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_services', 'guard_name' => 'web']);

        
        //QuesionBank
        Permissions::firstOrCreate(['name' => 'view_menu_questionbank', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'view_questionbank', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'create_questionbank', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_questionbank', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'update_questionbank', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'trash_questionbank', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'return_trash_questionbank', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_questionbank', 'guard_name' => 'web']);

        //Question
        Permissions::firstOrCreate(['name' => 'view_question', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'create_question', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'edit_question', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'show_question', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'update_question', 'guard_name' => 'web']);
        Permissions::firstOrCreate(['name' => 'delete_question', 'guard_name' => 'web']);


        //        $super_admin = Role::whereName('Super admin')->first();
        $all_permission = Permissions::all();
        $super_admin =  Role::whereName('Super admin')->first();
        $super_admin->givePermissionTo($all_permission);


        $teachepermission = [
            'view_all_users',
            'add_users',
            'edit_users',
            'delete_users',
            'restore_users',
            'view_users',
            'view_menu_users',
            'view_trashed_users',
            // 'view_menu_post',
            // 'view_all_post',
            // 'view_post',
            // 'add_post',
            // 'edit_post',
            // 'delete_post',
            // 'restore_post',
            'view_menu_category',
            'view_category',
            'view_all_category',
            'add_category',
            'edit_category',
            'delete_category',
            'restore_category',
            'view_menu_settings',
            'view_settings',
            'view_all_settings',
            'create_settings',
            'edit_settings',
            'update_settings',
            'view_menu_teams',
            'view_teams',
            'create_teams',
            'edit_teams',
            'update_teams',
            'delete_teams',
            'view_menu_article',
            'view_article',
            'view_all_article',
            'create_article',
            'edit_article',
            'update_article',
            'view_menu_slider',
            'view_slider',
            'create_slider',
            'edit_slider',
            'update_slider',
            'delete_slider',
            "view_menu_services",
            "view_services",
            "create_services",
            "edit_services",
            "update_services",
            "delete_services",
            "message_information_comment",


        ];

        $teacher = Role::whereName('admin')->first();
        $teacher->givePermissionTo([$teachepermission]);
    }
}
