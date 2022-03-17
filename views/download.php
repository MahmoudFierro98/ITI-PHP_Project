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
    
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-info text-uppercase fixed-top navbar-shrink" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-light fw-bold" href="#page-top">XYZ Product</a>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item mx-0 mx-lg-1">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <button type="submit" name="logout" class="btn btn" style="color: #FFFFFF;;">LOGOUT</button>
                        </form>
                    </li>
                    </ul>
            </div>
        </div>
    </nav>
 
    <div class="badge  text-wrap text-dark" style="margin-top: 10%;
    margin-left: 40%;
    margin-top:15%;
    width: 600px;
    height: 100px;
    font-size:30px;
    font-color:black;">
     Now you can buy our product,
      all you need is to download it from here.
</div>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<button type="submit" class="btn btn-success btn-lg" style="margin-top:0%;margin-left:55%;width:15%;" name="download">Download</button>
</form>
<?php if(isset($error)) { ?>
                                
        <div class="alert-danger" style="margin-top:2%;margin-left:55%;width:15%;">
       <?php echo $error ?>
            </div>
            <?php } ?>
            

</body>

</html>