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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XYZ - Download</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .download {
            margin-top: 10%;
            margin-left: 40%;
            width: 600px;
            height: 100px;
        }

        .downbutton {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 36px;
            margin-left:25%;
        }

        p {
            font-family: "Times New Roman", Times, serif;
            font-size: 40px;
        }
        .texterror{
            font-family: "Times New Roman", Times, serif;
            font-size: 40px;
            color: red;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-info text-uppercase fixed-top navbar-shrink" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-light fw-bold" href="#page-top">XYZ Product</a>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item mx-0 mx-lg-1">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <button type="submit" name="logout" class="btn btn-primary">Logout</button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="download">
        <p>Now you can buy our product, all you need is to download it from here.</p>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <button type="submit" class="downbutton" name="download">Download</button>
        </form>
        <div class="texterror"><?= $error ?></div>
    </div>
    <!-- <?php //echo $error ?> -->
    <!-- <form method="POST" action="<?php //echo $_SERVER['PHP_SELF'] ?>">
        <button type="submit" name="logout">Logout</button>
    </form> -->
</body>

</html>