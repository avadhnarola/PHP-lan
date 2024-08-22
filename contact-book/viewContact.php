<?php

include_once 'db.php';
include_once 'index.php';

if (!isset($_SESSION['id'])) {
    header('location:login.php');
}

$cur_user = $_SESSION['id'];
$user_email = $_SESSION['email'];


if (isset($_GET['d_id'])) {

    $id = $_GET['d_id'];
    mysqli_query($conn, "delete from contact where id=$id");
    header('viewContact.php');
}



$limit = 6;
$total_data = mysqli_query($conn, "select * from contact where user_id='$cur_user' limit 0,52");
$total_record = mysqli_num_rows($total_data);
// echo $total_record;

$t_page = ceil($total_record / $limit);
// echo $t_page;


if (isset($_GET['page_no'])) {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$start = ($page_no - 1) * $limit; // (1-1)*6==0 first page,,,,,,(2-1)*6==6 ,,,,second page

$res = mysqli_query($conn, "select id,name,contact_no FROM contact where user_id='$cur_user' limit $start,$limit");

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

        <h6> Added By : <?php echo $user_email; ?></h6>

        <table class="table">
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



        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($page_no > 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="viewContact.php?page_no=<?php echo $page_no - 1; ?>"
                            aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>
               
                <?php for ($i = 1; $i <= $t_page; $i++) { ?>
                    <li class="page-item"><a class="page-link"
                            href="viewContact.php?page_no=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>

                <?php if ($page_no < $t_page) { ?>
                <li class="page-item">
                        <a class="page-link" href="viewContact.php?page_no=<?php echo $page_no + 1; ?>">
                            <span>&raquo;</span>
                        </a>
                        
                        
                    </li>
                    <?php } ?>
            </ul>
        </nav>
    </div>
    </div>

</body>

</html>