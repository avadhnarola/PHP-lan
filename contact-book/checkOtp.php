<?php

include_once 'db.php';
session_start();

// echo $_SESSION['OTP'];
if (isset($_POST['otp'])) {
    $otp = $_POST['en-otp'];
    $s_otp = $_SESSION['OTP'];

    if ($otp == $s_otp) {
        header('location:reset.php');
    } else {
        $msg = "Your OTP is invalid";
    }
}
echo @$msg;
?>

<link rel="stylesheet" href="assets/otp.css">

<form action="" method="post">
    <div class="otp-container">
        <h2>OTP Verification</h2>
        <form action="#" method="post">
            <div class="otp-inputs">
                <input type="text" maxlength="6" class="otp-input" name="en-otp" required placeholder="6-Digit Code">
            </div>
            <button type="submit" name="otp">Verify</button>
        </form>
    </div>
</form>