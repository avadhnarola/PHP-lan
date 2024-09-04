<?php

include_once 'db.php';

session_start();

if (isset($_POST['sendOTP'])) {
    $email = $_POST['email'];

    $_SESSION['user_email'] = $email;

    $data = mysqli_query($conn, "select * from register where email='$email'");
    $cnt = mysqli_num_rows($data);

    if ($cnt == 1) {
        $row = mysqli_fetch_assoc($data);

        $_SESSION['user_id'] = $row['id'];
        header('location:mailer/smtp.php');
    } else {
        $msg = "<h3>check your email address</h3>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="assets/reset.css">
</head>

<body>
    <div>
        <?php echo @$msg;?>
    </div>
    <div class="cont">
        <div class="reset-password-container">
            <h2>Forget Password</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit" name="sendOTP">Send OTP</button>
            </form>
        </div>
    </div>
</body>

</html>