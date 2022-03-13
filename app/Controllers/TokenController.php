<?php

namespace Controllers;


use Models\Token;


class TokenController
{

    public static function check() {
        if(isset($_COOKIE["remember_me"]) && Token::where('remember_me_token', '=', $_COOKIE["remember_me"])->where('expiration_date', '>', time())->exists()) {
            $token = Token::where('remember_me_token', '=', $_COOKIE["remember_me"])->get()->first();
            $_SESSION['logged_in'] =  true;
            $_SESSION['user_id'] = $token->user_id;
        }
    }


    public static function create($user_id) {
        $tokenString = bin2hex(random_bytes(32));
        $token = new Token();
        $token->remember_me_token = $tokenString;
        $token->user_id = $user_id;
        $token->expiration_date = time() + 86400;
        $token->save();
        setcookie("remember_me", $tokenString, $token->expiration_date, "/");
    }

    public static function destroy() {
        setcookie("remember_me", "", time() - 3600);
    }
    
}
