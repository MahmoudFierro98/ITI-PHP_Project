<?php

use Controllers\DownloadController;
use Controllers\UserController;

$error = '';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] === false)
    header("Location: http://localhost:8000/login");

if (isset($_POST['logout'])) {
    UserController::logout();
    header('Location: http://localhost:8000/login');
}

if (isset($_POST['download'])) {
    $result = DownloadController::checkAndGetLink();
    if ($result === 'download limit reached') {
        $error = $result;
    } else {
        DownloadController::downloadAndChangeFileName();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XYZ - Download</title>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <button type="submit" name="download">Download</button>
    </form>
    <?php echo $error ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>

</html>