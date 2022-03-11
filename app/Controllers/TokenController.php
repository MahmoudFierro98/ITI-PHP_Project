<?php

namespace Controllers;


use Models\Token;
use Models\User;


class TokenController
{
    public static function CreateToken($id)
    {
        $token = token::where('id', '=', $id)->get()->first();
        $token = new Token();
        $str = rand();
        setcookie("remeber_me", $str, 0);
        $result = sha1($str);
        $token->remeber_me_token = $result;
        /*-if ($token) {
            $result = $token->remeber_me_token;
            setcookie("remeber_me", $result, 600);
        } else {
            $token = new Token();
            $str = rand();
            setcookie("remeber_me", $str, 60);
            $result = sha1($str);
            $token->remeber_me_token = $result;
        }*/
    }

    public static function rememberMe($request)
    {
        try {
            $user = User::where('User_Email', '=', $request['email'])->get()->first();
            if ($user) {
                //$_SESSION['user_id'] = $user->User_ID;
                self::CreateToken($user->User_ID);
            }
        } catch (\Throwable $e) {
            return $e;
        }
    }
}
