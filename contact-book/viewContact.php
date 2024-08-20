<?php

include_once 'db.php';
include_once 'index.php';

if (!isset($_SESSION['id'])) {
    header('location:login.php');
}

$cur_user = $_SESSION['id'];
$user_email = $_SESSION['email'];
echo $cur_user;


if (isset($_GET['d_id'])) {

    $id = $_GET['d_id'];
    mysqli_query($conn, "delete from contact where id=$id");
    header('viewContact.php');
}

$res = mysqli_query($conn, "select id,name,contact_no FROM contact where user_id='$cur_user'");

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

        <!-- <div class="flex">
        <form action="" method="get" class="frm">
            <input type="text" name="search" id="">
            <input type="submit" value="sumbit" style="margin-bottom:30px;">
        </form> -->


        <table class="table table-sm">
            <thead class="header">
                <th>ID</th>
                <th>Name</th>
                <th>Contact No</th>
                <th colspan="2">Action</th>
            </thead>

            <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td>
                        <?php echo $row['id'] ?>
                    </td>
                    <td>
                        <?php echo $row['name'] ?>
                    </td>
                    <td>
                        <?php echo $row['contact_no'] ?>
                    </td>
                    <td><a href="contact.php?u_id=<?php echo $row['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                    </td>
                    <td><a href="viewContact.php?d_id=<?php echo $row['id']; ?>"><i class="fa-regular fa-trash-can"></i></a>
                    </td>

                </tr>
            <?php } ?>
        </table>
    </div>
    </div>

</body>

</html>