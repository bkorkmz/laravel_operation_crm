<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class LanguageController extends Controller
{
    //
    public function swap($locale)
    {
          // available language in template array
        $availLocale=['en'=>'en','tr'=>'tr'];
        // check for existing language
        if(array_key_exists($locale,$availLocale)){
            session()->put('locale',$locale);
            app()->setLocale($locale);
        }
        if(auth()->user()){
           auth()->user()->update(['locale'=>$locale]);
        }
        return redirect()->back();
    }
}