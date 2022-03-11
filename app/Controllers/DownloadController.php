<?php

namespace Controllers;

use Models\Order;
use Models\Product;

class DownloadController {
    public static function downloadProduct() {
        $order = Order::where('id', '=', $_SESSION['user_id'])->get()->first();
        if($order->Download_count <= 7) {
            $product = Product::where('Product_id', '=', 1)->get()->first();
            $order->Download_count  = $order->Download_count + 1;
            $order->save();
            return $product->download_file_link;
        } else {
            return 'download limit reached';
        }
    }

    public static function changeFileName() {
        $product = Product::where('Product_id', '=', 1)->get()->first();
        $result = $product->download_file_link;
        header("Content-Description: File Transfer");
        header("Content-Type: application/zip");
        header("Content-Disposition: attachment; filename=\"" . basename("product/$result") . "\"");
        readfile("product/$result");
        $newName = uniqid('xyz', true).".zip";
        rename('product/'.$product->download_file_link, "product/$newName");
        Product::where('Product_id', '=', 1)->update(['download_file_link' => $newName]);
    }
}
?>