<?php

use Controllers\UserController;
use Controllers\TokenController;

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
    header("Location: http://localhost:8000/");

    $result = '';

if (isset($_POST['submit'])) {
    $request = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];
    $result = UserController::login($request);

    if ($result === 'success') {
        if (empty($_POST['remember'])) {
            TokenController::rememberMe($request);

            var_dump($_POST['remember']);
        }
        header("Location: http://localhost:8000/");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XYZ - Login</title>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <input type="checkbox" name="remember" checked />Remember me
        <input type="submit" name="submit" value="Login">
    </form>
    <?php echo $result ?>
    <a href="http://localhost:8000/register">Register</a>
</body>

</html>