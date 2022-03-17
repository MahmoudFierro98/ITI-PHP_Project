<?php

use Controllers\UserController;


if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
    header("Location: http://localhost:8000/");

$result = [];


if (isset($_POST['submit'])) {
    $request = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'password_confirmation' => $_POST['password_confirmation'],
        'credit_card' => $_POST['credit_card'],
    ];
    $result = UserController::register($request);

    $credit_card = $_POST['credit_card'];
    $pattern = "^\d{16}$^";
    if (!preg_match($pattern, $credit_card))
        $credit_card_result = 'Error! please Enter 16 positive digits in credit-card';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XYZ - Register</title>
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body >
    
      <nav class="navbar navbar-expand-lg bg-info text-uppercase fixed-top navbar-shrink" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-light fw-bold" href="#page-top">XYZ Product</a>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-light rounded active" href="http://localhost:8000/login">Login</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav> 
        <div class="container px-4 px-lg-5">
        
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider">
                        <p class="text-muted mb-5"></p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-end mb-5">
                
                    <div class="col-lg-6">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control"  type="text" name="email" id="floatingInput" placeholder="name@example.com">
                                <label for="email">Email address</label>
                                
                        
                            </div>
                            <!-- Password-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" type="password" id="floatingInput" placeholder="password">
                                <label for="phone">Password</label>
                            </div>
                         <!-- Password-->
                          <div class="form-floating mb-3">
                                <input class="form-control" name="password_confirmation" type="password"  id="floatingInput" placeholder="password">
                                <label for="phone">Confirm Password</label>
                            </div>
                             <!-- Credit card-->
                             <div class="form-floating mb-3">
                                <input class="form-control"  type="text" name="credit_card" id="floatingInput" placeholder="credit-card">
                                <label for="phone">Credit card</label>
                            </div>
                             <!-- Credit card Expiration -->
                            <div class="form-floating mb-3">
                                <input class="form-control"  type="month" name="expiration" min="2022-03" id="floatingInput" placeholder="expirationDate">
                               
                            </div>
                            
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    
                                </div>
                            </div>
                            <div class="d-grid"><input  class="btn btn-info btn-xl text-light " type="submit" name="submit" value="Register"></div>
                            
                        </form>
                         <?php 
                            if(isset($_POST['submit'])){ ?>
                            <?php if(empty($result)){ ?>
                                <div class="alert alert-success">
                                Registration successfull, Please login
                                </div>
                                
                            <?php  }else{
                                foreach($result as $error){ ?>
                                <div class="alert alert-danger">
                                <?php echo $error ?>
                                </div>

                                 <?php }

                
                                }?>
                                <?php if (isset($credit_card_result)){ ?>
                        <div class="alert alert-danger"> <?php echo $credit_card_result;} ?>
                            
                            <br />
                        </div>
                            <?php } ?>
        
                    </div>
                </div>
               
            </div>

</body>

</html>