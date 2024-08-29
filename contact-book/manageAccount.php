<?php

include_once 'db.php';
include_once 'index.php';
// include_once 'side.php';

if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
$user_email = $_SESSION['email'];
$res = mysqli_query($conn, "select  id,name,email,password,gender,contact_no from register where email='$user_email'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact</title>
    <link rel="stylesheet" href="assets/view.css">
</head>

<body>



    <div class="main">

        <table class="table">
            <thead class="header">
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Contact No</th>
           
                <th colspan="2">Action</th>
            </thead>

            <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td>
                        <?php echo $row['name'] ?>
                    </td>
                    <td>
                        <?php echo $row['email'] ?>
                    </td>
                    <td>
                        <?php echo $row['password'] ?>
                    </td>
                    <td>
                        <?php echo $row['gender'] ?>
                    </td>
                    <td>
                        <?php echo $row['contact_no'] ?>
                    </td>
                   
                    <td><a href="register.php?u_id=<?php echo $row['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                    </td>

                </tr>
            <?php } ?>
        </table>
    </div>
    </div>

</body>

</html>