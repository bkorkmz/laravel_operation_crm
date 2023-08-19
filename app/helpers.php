<?php


use Illuminate\Config\Repository;
use Illuminate\Support\Str;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;



if(!function_exists('slug_format')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param $string
     * @param string $sparator
     * @return string
     */
    function slug_format($string, string $sparator = '-'): string

    {
        $base_string = $string;
        $string = preg_replace('/\s+/u', '-', trim($string));
        $string = str_replace('/', '-', $string);
        $string = str_replace('\\', '-', $string);
        $string = str_replace(['ü', 'Ü', 'ş', 'Ş', 'ı', 'İ', 'ç', 'Ç', 'ö', 'Ö', 'ğ', 'Ğ'], ['u', 'U', 's', 'S', 'i', 'I', 'c', 'C', 'o', 'O', 'g', 'G'], $string);
        $string = strtolower($string);

        $slug_string = $string;
        return Str::slug($string, $sparator);
    }
}


if(!function_exists('system_settings')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param $string
     * @return string
     */
    function system_settings($string)
    {
        $system = 'Merhaba Dünya';
        return $system;
    }
}



if(!function_exists('menu')) {
    function menu()
    {

        $MenuJson = file_get_contents(base_path('resources/views/layouts/menu-data/menu.json'));
        $MenuData = json_decode($MenuJson,true);
       
        return $MenuData;
    }

}

if(!function_exists('permissionCheck')) {
 
    function permissionCheck($permission)
    {

        $isSuperAdmin = auth()->check() && auth()->user()->hasRole('super admin');
        if( $isSuperAdmin)
        {
            return true;
        }
        else if(auth()->user()->hasAnyPermission($permission) || $permission == "")
        {
            return true;
        }else{
            return false;
        }
    }

}

