<?php
include_once 'db.php';


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['con_no'];
    $save = implode(',', $_POST['save']);
    mysqli_query($conn, "insert into register(name,email,password,gender,contact,saved) values('$name','$email','$password','$gender','$contact_no','$save');");
}

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
                <input type="text" class="input" placeholder="Name" name="name">
                <input type="email" class="input" placeholder="Email" name="email">
                <input type="password" class="input" placeholder="Password" name="password">

                <table>
                    <tr>
                        <th>Gender : </th>
                        <td>
                            <input type="radio" value="Male" name="gender" style="margin-right: 5px;">Male
                            <input type="radio" value="Female" name="gender" style="margin-right: 5px;">Female
                        </td>
                    </tr>
                </table>
                <input type="number" class="input" placeholder="Contact No." name="con_no">
                <table>
                    <tr>
                        <th>Saved : </th>
                        <td>
                            <input type="checkbox" value="gmail" name="save[]" style="margin-right: 5px;">Gmail
                            <input type="checkbox" value="phone" name="save[]" style="margin-right: 5px;">Phone
                            <input type="checkbox" value="phone" name="save[]" style="margin-right: 5px;">SIM
                        </td>
                    </tr>
                </table>


                <button class="form-btn" type="submit" name="submit">Log in</button>
            </form>

        </div>
    </div>
</body>

</html>