<?php
include ('config.php');
include ('dashboard.php');
// session_start();
if (!isset($_SESSION["id"])) {
    header('Location:index.php');
}


if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sel = "select * from branch where bname like '%$search%'";
} else {
    $sel = "select * from branch";
}

$res = mysqli_query($conn, $sel);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        thead th {
            border-bottom: 1px solid black;
        }

        .flex {
            margin: 30px 300px 0px 310px;
            box-shadow: 0px 0px 10px gray;
            border-radius: .25rem;
            padding: 5px 10px;
            width: 30%;
        }
        form.frm {
            padding: 20px 0px 0px 10px;
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
                <tr>
                    <th>BranchId</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <td><?php echo $row['b_id'] ?></td>
                        <td><?php echo $row['bname'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>