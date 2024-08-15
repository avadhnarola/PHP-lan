<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="CSS/allmin/all.min.css">
</head>

<body>

</body>

</html>

<?php
include_once('config.php');
if(isset($_GET['d_id'])){

    $id = $_GET['d_id'];
    mysqli_query($conn,"delete from admin where id=$id");
    header('test-view.php');
}

$data = mysqli_query($conn, "select * from admin");
?>
<table border="" class="table table-success m-auto mt-3 container" style="width: 70%;">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Hobbies</th>
        <th>City</th>
        <th></th>
        <th></th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['hobby'] ?></td>
            <td><?php echo $row['city'] ?></td>
            <td><a href="test.php?u_id=<?php echo $row['id']; ?>" style="color: green;"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="test-view.php?d_id=<?php echo $row['id']; ?>" style="color: red;"><i class="fa-solid fa-trash-can"></i></a></td>
        </tr>


    <?php } ?>
</table>
<div class="container">
    <a href="test.php" class="btn btn-outline-secondary mt-3">Add Data</a>
</div>