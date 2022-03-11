<?php

use Controllers\DownloadController;
use Controllers\UserController;

// require_once("vendor/autoload.php");

header("Content-Description: File Transfer");
header("Content-Type: application/zip");
header("Content-Disposition: attachment; filename=\"" . basename("../product/$result") . "\"");
