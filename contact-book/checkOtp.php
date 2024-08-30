<?php

include_once 'db.php';
session_start();

// echo $_SESSION['OTP'];
if (isset($_POST['otp'])) {
    $otp = $_POST['otp1'];
    $s_otp = $_SESSION['OTP'];

    if ($otp == $s_otp) {
        header('location:reset.php');
    }
    else{
        $msg = "Your OTP is invalid";
    }
}
echo @$msg;
?>

<form method="post">
    <table>
        <tr>
            <td>Enter OTP : </td>
            <td><input type="text" name="otp1"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="otp" value="Check OTP"></td>
        </tr>
    </table>
</form>