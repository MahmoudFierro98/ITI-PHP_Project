<?php

namespace Controllers;

use Models\Order;

class OrderController {

    public static function create($user_id) {
        $order = new Order();
        $order->User_ID = $user_id;
        $order->Download_Count = 0;
        $order->Product_ID = 1;
        $order->save();
    }
}