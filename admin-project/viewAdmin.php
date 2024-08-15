<?php
include ('config.php');
include ('dashboard.php');
// session_start();
if (!isset($_SESSION["id"])) {
    header('Location:index.php');
}
if (isset($_GET['search'])) {
    $name = $_GET['search'];
    $select = "select id,name,email,password,contact,branch.bname,role.rname,image from admin INNER JOIN role ON admin.id = role.r_id INNER JOIN branch ON admin.id = branch.b_id where admin.name like '%$name%'";
} else {
    // $select = "select id,name,email,password,contact,branch.bname,role.rname,image from admin INNER JOIN role ON admin.id = role.r_id INNER JOIN branch ON admin.id = branch.b_id";
    $select = "select admin.id,admin.name,admin.email,admin.contact,admin.password,branch.bname,role.rname,admin.image FROM admin 
    INNER JOIN branch ON branch.b_id = admin.b_id 
    INNER JOIN role ON role.r_id = admin.r_id;";
}
$res = mysqli_query($conn, $select);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .flex {
            justify-content: center;
            margin: 30px 10px 0px 310px;
            box-shadow: 0px 0px 20px gray;
            border-radius: .25rem;
            padding: 5px 10px;
        }

        form.frm {
            padding: 20px 0px 0px 10px;
        }
        thead{
            border-bottom: 1px solid gray;
        }
    </style>

</head>

<body>

    <div class="flex">
        <!-- <form action="" method="get" class="frm">
            <input type="text" name="search" id="">
            <input type="submit" value="sumbit" style="margin-bottom:30px;">
        </form> -->

        <table class="table table-striped table-hover table-sm">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Password</th>
                <th>Branch</th>
                <th>Role</th>
                <th>Image</th>
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
                    <?php echo $row['email'] ?>
                </td>
                <td>
                    <?php echo $row['contact'] ?>
                </td>
                <td>
                    <?php echo $row['password'] ?>
                </td>
                <td>
                    <?php echo $row['bname'] ?>
                </td>
                <td>
                    <?php echo $row['rname'] ?>
                </td>
                <td><img src="images/<?php echo $row['image'] ?>" alt="not found" height="50px" width="50px"
                        style="border-radius: 50%;"></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>