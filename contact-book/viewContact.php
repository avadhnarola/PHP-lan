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

if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = "";
}


if (isset($_POST['delete_all'])) {
    $del_id = $_POST['delete'];

    foreach ($del_id as $key => $id) {
        // echo $id;die();
        mysqli_query($conn, "delete from contact where id = $id");
    }
    header('location:viewContact.php');
}



$limit = 6;
$total_data = mysqli_query($conn, "select * from contact where user_id='$cur_user' AND name like '%$search%' limit 0,52");
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

$res = mysqli_query($conn, "select id,name,contact_no FROM contact where user_id='$cur_user' AND name like '%$search%' limit $start,$limit");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact</title>
    <link rel="stylesheet" href="assets/view.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <form action="" method="post">
        <div class="main">
            <div class="head">
                <h6>Added By: <?php echo $user_email; ?></h6>
                <button type="submit" name="delete_all" class="button1" id="deleteBtn" style="display:none;">
                    <div class="svg-wrapper-1">
                        <div class="svg-wrapper">
                            <i class="fa-solid fa-trash icon"></i>
                        </div>
                    </div>
                    <span>Delete All</span>
                </button>
            </div>

            <form method="post" id="deleteForm">
                <table class="table">
                    <thead class="header">
                        <tr>
                            <th>Select</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                            <tr>
                                <td><input type="checkbox" name="delete[]" value="<?php echo $row['id']; ?>"></td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['contact_no']; ?></td>
                                <td>
                                    <a href="contact.php?u_id=<?php echo $row['id']; ?>"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="viewContact.php?d_id=<?php echo $row['id']; ?>"><i
                                            class="fa-regular fa-trash-can" style="margin-left:7px;"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>



            </form>
    </form>

    <nav aria-label="Page navigation example page">
        <ul class="pagination mt-5">
            <?php if ($page_no > 1) { ?>
                <li class="page-item">
                    <a class="page-link"
                        href="viewContact.php?page_no=<?php echo $page_no - 1; ?>&search=<?php echo $search; ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php } ?>

            <?php for ($i = 1; $i <= $t_page; $i++) { ?>
                <li class="page-item"><a class="page-link"
                        href="viewContact.php?page_no=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>

            <?php if ($page_no < $t_page) { ?>
                <li class="page-item">
                    <a class="page-link"
                        href="viewContact.php?page_no=<?php echo $page_no + 1; ?>&search=<?php echo $search; ?>">
                        <span>&raquo;</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    </div>


    <script>
        $(document).ready(function () {
            $('input[type="checkbox"]').change(function () {
                if ($('input[type="checkbox"]:checked').length > 0) {
                    $('#deleteBtn').show();
                } else {
                    $('#deleteBtn').hide();
                }
            });
        });
    </script>

</body>

</html>