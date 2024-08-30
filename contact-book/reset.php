<?php

include_once 'db.php';
session_start();


if (isset($_POST['reset'])) {
    $newpass = $_POST['new-password'];
    $conpass = $_POST['confirm-password'];
    $email = $_SESSION['user_email'];

    if ($newpass == $conpass) {
        mysqli_query($conn, "update register set password='$newpass' where email='$email'");
        header('location:login.php');
    } else {
        $msg = "Password must be same";
    }
}
echo @$msg;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="assets/reset.css">
</head>

<body>
    <div class="cont">
        <div class="reset-password-container">
            <h2>Reset Password</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" name="new-password" required>
                </div>
                <div class="input-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
                <button type="submit" name="reset">Reset Password</button>
            </form>
        </div>
    </div>
</body>

</html>