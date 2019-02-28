<?php

namespace App\Helpers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Route;
use App\Articles;
use App\Categories;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function get_userinfo( $user_id )
    {
        if( empty( $user_id ) )
            return;
        // $user_infos = User::where('id', $user_id)->first();
        $user_infos = DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.author_ID')
                    ->select('users.*', 'posts.*')
                    ->first();
        if( $user_infos )
            return $user_infos;
        return false;
    }
    /**
     * Return user selected infos
     */
    public static function get_users()
    {
        if( empty( $user_id ) )
            return;
        $users = User::get();
        if( $users )
            return $users;
        return false;
    }
    
    public static function get_categories() {
        $categories = Categories::all();
        if( $categories )
            return $categories;
        return false;
    }
    public static function words($value, $words, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
    public static function Rp_format($amount){ 
        $money = "Rp. " . number_format(intVal($amount), 0, '' , '.');
        return $money;
    }
}