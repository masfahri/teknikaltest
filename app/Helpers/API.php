<?php
namespace App\Helpers;

class API
{

    public static function GetToken()
    {
        $user = \Auth::user();
        return $user->createToken('MyApp')->accessToken;
    }

}
?>