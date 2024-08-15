<?php
include ('config.php');

if (isset($_POST['submit'])) {
    $dname = $_POST['dname'];

        $select = "select * from dept where dname='$dname'";
        $res = mysqli_query($conn,$select);
        if(mysqli_num_rows($res)==0){
            $query = "insert into dept(dname) values('$dname')";
            mysqli_query($conn, $query);
        }
        else{
            echo "already exist";
        }
        // header('Location:join-staff-form.php');
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

        .form .inp {
            padding: 7px;
            margin-bottom: 5px;
            border-radius: 20px;
            border: 1px solid black;
            display: flex;
            margin-left: 5px;
            width: 90%;

        }

        .form {
            margin-top: 20px;
            border: 2px gray solid;
            border-radius: 10px;
            background-color: rgb(0, 0, 0, 0.1);

        }

        .main {
            text-align: center;
            margin: auto;
            width: 30%;
        }

        p {
            color: gray;
            text-align: left;
            margin-left: 15px;
            text-transform: uppercase;
            font-weight: 600;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form .btn {
            width: 40%;
            margin: auto;
            margin-bottom: 10px;
        }

        .form .btn:hover {
            background-color: rgb(0, 0, 0);
            transition: all ease-in-out 0.3s;
            color: rgb(255, 255, 255);
        }

        .rad {
            width: 50%;
        }

        #box {
            float: left;
            margin-left: 5px;
        }

        label {
            color: rgb(126, 124, 124);
            float: inline-start;
            margin-left: 5px;
        }

        #lang {
            padding: 5px;
            margin: 2px 0px 5px -5px;
        }
    </style>
</head>

<body>
    <div>
        <a href="join-select.php">select</a>
    </div>
    <div>
        <a href="join-staff-form.php">Staff</a>
    </div>
    <div class="main">
        <div class="form">

            <h2 style="margin-top: 20px;">Department Details</h2>

            <form method="post">
                <p>Enter Department Name *</p>
                <input type="text" name="dname" class="inp"><br>
                <input type="submit" name="submit" class="btn inp">
            </form>
        </div>
    </div>
</body>

</html>