<?php

namespace Models;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
    function __construct()
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            'driver' => _DRIVER_,
            'host' => _HOST_,
            'database' => _DATABASE_,
            'username' => _USERNAME_,
            'password' => _PASSWORD_,
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}