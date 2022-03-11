<?php

use Controllers\UserController;

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
    header("Location: http://localhost:8000/");

$result = '';

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
        $credit_card_result = 'Error! please Enter 16 positive digits';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XYZ - Register</title>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label for="email">Email</label>
        <input type="text" name="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <label for="password">Confirm Password</label>
        <input type="password" name="password_confirmation" required>
        <label for="cc">Credit Card</label>
        <input type="text" name="credit_card" required>
        <label for="expiration">Expiration date:</label>
        <input type="month" name="expiration" min="2022-03" value="" required>
        <input type="submit" name="submit" value="Register">
    </form>
    <?= $result ?>
    <?php if (isset($credit_card_result)) echo $credit_card_result; ?>
    <br />
    <a href="http://localhost:8000/login">Login</a>
</body>

</html>