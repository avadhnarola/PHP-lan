<?php
include ('config.php');
include ('dashboard.php');
// session_start();
if (!isset($_SESSION["id"])) {
    header('Location:index.php');
}
if (isset($_GET['search'])) {
    $name = $_GET['search'];
    $select = "select inquiry.id,inquiry.name,inquiry.email,inquiry.contact,inquiry.added_by,branch.bname,course.cname,reference.type  from inquiry 
    INNER JOIN branch ON branch.b_id = inquiry.id 
    INNER JOIN course ON course.id = branch.b_id 
    INNER JOIN reference ON reference.id = course.id
    WHERE inquiry.name like '%$name%'";
} else {
    // $select = "select id,name,email,contact,added_by,branch.bname,intrested_course.name,reference.type from inquiry INNER JOIN branch ON branch.b_id = inquiry.branch INNER JOIN course ON course.id = inquiry.intrested_course INNER JOIN reference ON reference.id = inquiry.reference";
    $select = "select inquiry.id,inquiry.name,inquiry.email,inquiry.contact,inquiry.added_by,branch.bname,course.cname,reference.type  from inquiry 
    INNER JOIN branch ON branch.b_id = inquiry.id 
    INNER JOIN course ON course.id = branch.b_id 
    INNER JOIN reference ON reference.id = course.id";
    // $select = "select * from inquiry";
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

        thead {
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
                <th>Added By</th>
                <th>Branch</th>
                <th>Intrested Course</th>
                <th>Reference</th>
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
                        <?php echo $row['added_by'] ?>
                    </td>
                    <td>
                        <?php echo $row['bname'] ?>
                    </td>
                    <td>
                        <?php echo $row['cname'] ?>
                    </td>
                    <td>
                        <?php echo $row['type'] ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
    
    </html>

