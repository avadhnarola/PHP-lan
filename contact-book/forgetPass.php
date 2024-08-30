<?php 

include_once 'db.php';

session_start();

if(isset($_POST['sendOTP'])){
    $email = $_POST['email'];

    $_SESSION['user_email']=$email;

    $data = mysqli_query($conn,"select * from register where email='$email'");
    $cnt = mysqli_num_rows($data);

    if($cnt==1){
        $row= mysqli_fetch_assoc($data);

        $_SESSION['user_id']=$row['id'];
        header('location:mailer/smtp.php');
    }
    else{
        $msg="check your email address";
    }
}
echo @$msg;

?>

<form method="post">
    <table>
        <tr>
            <td>Email : </td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="sendOTP" value="Send OTP">
            </td>
        </tr>
    </table>
</form>