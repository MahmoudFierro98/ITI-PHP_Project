<?php

namespace Controllers;

use Models\User;

class UserController {

    public static function register($request) {
        try {
            if($request['password'] !== $request['password_confirmation'])
                return 'Password confirmation doesn\'t match';

            if(User::where('User_Email', '=', $request['email'])->exists())
                return 'Email already in use.';

            $user = new User();
            $user->User_Email = $request['email'];
            $user->Password = password_hash($request['password'], PASSWORD_BCRYPT);
            $user->save();
            OrderController::create($user->getQueueableId());
            return 'Registration successfull, Please login.';
        } catch (\Throwable $e) {
            return $e;
        }
    }

    public static function login($request) {
        try {
            $user = User::where('User_Email', '=', $request['email'])->get()->first();
            if($user) {
                if(password_verify($request['password'], $user->Password)) {
                    session_start();
                    $_SESSION['logged_in'] = true;
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

    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

}