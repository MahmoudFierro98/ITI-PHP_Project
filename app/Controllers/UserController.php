<?php

namespace Controllers;

use Models\User;

class UserController
{

    public static function register($request)
    {
        try {

            $error=[];
            
            if (User::where('User_Email', '=', $request['email'])->exists())
                $error[] = 'Email already in use.';
            elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
                $error[] = 'Error! please enter a Valid email address.';
            }

            if ($request['password'] !== $request['password_confirmation']) {
                $error[] = 'Error! Password confirmation doesn\'t match.';
            } else {
                $str = $request['password'];
                $pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,16}$^";
                if (!preg_match($pattern, $str))
                    $error[] = 'Error! Password from 8 to 16 Alphanumeric characters with at least one digit and One Upper case letter';
            }

            if (empty($error)) {
                $user = new User();
                $user->User_Email = $request['email'];
                $user->Password = password_hash($request['password'], PASSWORD_BCRYPT);
                $user->save();
                OrderController::create($user->getQueueableId());
                
            } 
                return $error;
            
        } catch (\Throwable $e) {
            return $e;
        }
    }

    public static function login($request)
    {
        try {
            $user = User::where('User_Email', '=', $request['email'])->get()->first();
            if ($user) {
                if (password_verify($request['password'], $user->Password)) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $user->User_ID;
                    if($request['remember'])
                        TokenController::create($user->User_ID);
                    return 'success';
                } else {
                    return 'Incorrect password.';
                }
            } else {
                return 'User doesn\'t exist.';
            }
        } catch (\Throwable $e) {
            return $e;
        }
    }

    public static function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        TokenController::destroy();
    }
}
