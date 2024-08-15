<?php
include('config.php');
    if(isset($_POST['submit'])) {                // Onclick
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(isset($_GET['upd_id'])){
            $query = "update userdata set name='$name' where Id=".$_GET['upd_id']; 
        }
        else{
            $query = "insert into userdata(name,email,password) values ('$name','$email','$password')";

        }
        mysqli_query($conn,$query);

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .form input {
            padding: 7px;
            margin-bottom: 5px;
            border-radius: 5px;
            border: 1px solid black;
            display: flex;
            margin-left: 5px;
            width: 90%;
            background-color: rgb(246, 255, 168);
        }

        .form {
            margin-top: 20px;
            border: 2px gray solid;
        }
        .main{
            text-align: center;
            margin: auto;
            width: 30%;
        }
        p{
            color: gray;
            text-align: left;
            margin-left: 5px;
        }
        .form .btn{
            width: 40%;
        }
    </style>
</head>

<body>


    <div class="main">
        <div class="form">

            <h2>CRUD Operation</h2>

            <form>
                <p>Enter Name *</p>
                <input type="text" name="name"><br>
                <p>Enter Email *</p>
                <input type="email" name="email"><br>
                <p>Enter Password</p>
                <input type="password" name="password"><br>
                <input type="submit" name="submit" class="btn">
            </form>
        </div>
    </div>
</body>

</html>