<?php

use Controllers\UserController;

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
    header("Location: http://localhost:8000/");

$result = '';

if (isset($_POST['submit'])) {
    $request = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'remember' => isset($_POST['remember']) ? true : false
    ];
    $result= UserController::login($request);

    if ($result === 'success')
        header("Location: http://localhost:8000/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XYZ - Login</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    

    <nav class="navbar navbar-expand-lg bg-info text-uppercase fixed-top navbar-shrink" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-light fw-bold" href="#page-top">XYZ Product</a>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-light rounded active" href="http://localhost:8000/register">Register</a></li>
                        
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
                
                    <div class="col-lg-6  ">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">   
                             <label for="email">Email address</label>
                                
                        
                            </div>
                            <!-- Password-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" type="password" id="floatingInput" placeholder="Password" >
                                <label for="password">Password</label>
                            </div>

                            <div class="form-floating mb-3">
                            <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" value="Remember Me" name="remember" checked   aria-label="Checkbox for following text input">  Remember Me
</div>
                            </div>
                            
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                
                                </div>
                            </div>
                            
                            <div class="d-grid"><input  class="btn btn-info btn-xl text-light " type="submit" name="submit" value="Login"></div>
                            
                        </form>
                        <?php 
                            if(isset($_POST['submit'])){ ?>
                            <?php if($result=='Incorrect password.'){ ?>
                                <div class="alert alert-danger">
                                <?php echo $result ?>
                                </div>
                                
                                <?php  } elseif($result=='User doesn\'t exist.'){ ?>
                                
                                <div class="alert alert-danger">
                                <?php echo $result ?>
                                </div>

                            <?php }

                
            }?>
            
        
                    </div>
                </div>
                
    
</body>

</html>