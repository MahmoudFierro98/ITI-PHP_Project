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
    $result = UserController::login($request);

    if ($result === 'success')
        header("Location: http://localhost:8000/");
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
        <input type="checkbox" name="remember" checked />Remember Me
        <input type="submit" name="submit" value="Login">
    </form>
    <?php echo $result ?>
    <a href="http://localhost:8000/register">Register</a>
</body>

</html>