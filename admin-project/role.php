<?php
include ('config.php');
include ('dashboard.php');
// session_start();
if (!isset($_SESSION["id"])) {
    header('Location:index.php');
}


if (isset($_POST['submit'])) {
    $rname = $_POST['rname'];

    $select = "select * from role where rname='$rname'";
    $res = mysqli_query($conn, $select);

    if (mysqli_num_rows($res) == 0) {
        $query = "insert into role (rname)values('$rname')";
        mysqli_query($conn, $query);
    } else {
        echo "Already Exist";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Form</title>
    <link rel="stylesheet" href="assets/css/add-table.css">

</head>

<body>
    <div class="form-container">
        <p class="title">Role Form</p>
        <form class="form" method="post">
            <input type="text" class="input" placeholder="Role Name" name="rname" required>
            <input type="submit" class="form-btn" name="submit">
        </form>
    </div>

</body>

</html>