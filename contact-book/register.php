<?php
include_once 'db.php';


if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];

    $u_data = mysqli_query($conn, "select * from register where id=$id");
    $u_data = mysqli_fetch_assoc($u_data);
  


}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['con_no'];

    if (isset($_GET['u_id'])) {
        mysqli_query($conn, "update register set name='$name',email='$email',password='$password',gender='$gender',contact_no='$contact_no' where id='$id' ");
        header('location:manageAccount.php');


    } else {
        mysqli_query($conn, "insert into register(name,email,password,gender,contact_no) values('$name','$email','$password','$gender','$contact_no');");
    }
    header('location:login.php');


}

// header('location:login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



    <link rel="stylesheet" href="assets/register.css">
    <link rel="stylesheet" href="CSS/allmin/all.min.css">

</head>

<body>

    <div class="mt-5">
        <div class="form-container m-auto">
            <p class="title">Register Account</p>
            <form class="form" method="post">
                <input type="text" class="input" placeholder="Name" name="name" required
                    value="<?php echo @$u_data['name']; ?>">
                <input type="email" class="input" placeholder="Email" name="email" required
                    value="<?php echo @$u_data['email']; ?>">
                <input type="password" class="input" placeholder="Password" name="password" required
                    value="<?php echo @$u_data['password']; ?>">

                <table>
                    <tr>
                        <th>Gender : </th>
                        <td>
                            <input type="radio" value="Male" name="gender" style="margin-right: 5px;" <?php if (@$u_data['gender'] == 'Male') {
                                echo "checked";
                            } ?>>Male
                            <input type="radio" value="Female" name="gender" style="margin-right: 5px;" <?php if (@$u_data['gender'] == 'Female') {
                                echo "checked";
                            } ?>>Female
                        </td>
                    </tr>
                </table>
                <input type="number" class="input" placeholder="Contact No." name="con_no"
                    value="<?php echo @$u_data['contact_no']; ?>">
               


                <button class="form-btn" type="submit" name="submit">Log in</button>
            </form>

        </div>
    </div>
</body>

</html>