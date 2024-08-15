<?php
    include('config.php');
    // include('dashboard.php');

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $branch = $_POST['branch'];
        $data = implode(',',$branch);
        // echo $data;die();
        $role = $_POST['role'];
        $contact = $_POST['contact'];
        
        $query = "insert into admin (name,email,password,b_id,r_id,contact) values('$name','$email','$password','$data','$role','$contact')";
        mysqli_query($conn,$query);
    }

    $select = "select * from role";
    $res = mysqli_query($conn,$select);

    $sel = "select * from branch";
    $responce = mysqli_query($conn,$sel);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>


    <style>
        .form-container {
            width: 350px;
            height: auto;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            box-sizing: border-box;
            padding: 20px 30px;
            margin: auto;
        }

        .title {
            text-align: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            margin: 10px 0 30px 0;
            font-size: 28px;
            font-weight: 800;
        }

        .sub-title {
            margin: 0;
            margin-bottom: 5px;
            font-size: 9px;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }

        .input {
            border-radius: 20px;
            border: 1px solid #c0c0c0;
            outline: 0 !important;
            box-sizing: border-box;
            padding: 12px 15px;
        }

        .input:focus {
            border: 2px solid black;
        }

        .form-btn {
            padding: 10px 15px;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            border-radius: 20px;
            border: 0 !important;
            outline: 0 !important;
            background: teal;
            color: white;
            cursor: pointer;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .form-btn:active {
            box-shadow: none;
        }

        .sign-up-label {
            margin: 0;
            font-size: 10px;
            color: #747474;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        .sign-up-link {
            margin-left: 1px;
            font-size: 11px;
            text-decoration: underline;
            text-decoration-color: teal;
            color: teal;
            cursor: pointer;
            font-weight: 800;
        }

        .buttons-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-top: 20px;
            gap: 15px;
        }
        .lable{
            color: #747474;
            margin-left: 5px;
        }

        .apple-login-button,
        .google-login-button {
            border-radius: 20px;
            box-sizing: border-box;
            padding: 10px 15px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
                rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            font-size: 11px;
            gap: 5px;
        }

        .apple-login-button {
            background-color: #000;
            color: #fff;
            border: 2px solid #000;
        }

        .google-login-button {
            border: 2px solid #747474;
        }

        .apple-icon,
        .google-icon {
            font-size: 18px;
            margin-bottom: 1px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <p class="title">Register</p>
        <form class="form" method="post">
            <input type="text" class="input" placeholder="Name" name="name">
            <input type="email" class="input" placeholder="Email" name="email">
            <input type="password" class="input" placeholder="Password" name="password">
            <label for="" class="lable">Branch </label>
            <select name="branch[]" id="branch" multiple>
                <?php while($row = mysqli_fetch_assoc($responce)) { ?>
                    <option value="<?php echo $row['b_id']?> "><?php echo $row['bname'] ?></option>
                <?php }?>
            </select>
            <label for="" class="lable">Role</label>
            <select id="role" name="role">
                <?php  while($row = mysqli_fetch_assoc($res)){?>
                    <option value=" <?php  echo $row['r_id']?>"><?php  echo $row['rname']?></option>
                <?php } ?>
            </select>
            <input type="number" class="input" placeholder="Contact No" name="contact" maxlength="10" minlength="10">
            <input type="submit" class="form-btn" name="submit" value="Create Account">
        </form>
        <p class="sign-up-label">
            Already have an account?<a href="index.html" class="sign-up-link"> Log in</a>
        </p>

    
    </div>
    <script> new MultiSelectTag('branch')</script>
</body>

</html>