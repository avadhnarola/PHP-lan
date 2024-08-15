<?php

include ('config.php');
if (isset($_GET['d_id'])) {
    $del = "delete from studentdata where id=" . $_GET['d_id'];
    mysqli_query($conn, $del);
}
$select = "select * from studentdata";
$res = mysqli_query($conn, $select);

// $data = mysqli_fetch_assoc($res);
// echo '<pre>';
// print_r($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/allmin/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Beiruti:wght@200..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playwrite+AU+QLD:wght@100..400&display=swap"
        rel="stylesheet">

    <style>
        .btn {
            padding: 3px;
        }

        h1 {
            font-family: "Nunito", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
        td a .green{
            color:green;
        }
        
        td a .red{
            color:red;
        }

    </style>
</head>

<body>
    <section style="margin: 20px 0;">
        <div class="container">
            <h1 style="text-align: center;margin: 30px;">Student Data</h1>
            <table class="table table-light table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">Profile</th>
                        <th scope="col">Id</th>
                        <th scope="col">Studen Name</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_assoc($res)) { ?>

                        <tr class="trow">
                        <td><img src="images/<?php echo $row['image'] ?>" alt="not found" height="50px" width="50px"
                        style="border-radius: 50%; background-size:cover;"></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['sname']; ?></td>
                            <td><?php echo $row['grade']; ?></td>
                            <td><?php echo $row['marks']; ?></td>
                            <td><a href="index.php?u_id=<?php echo $row['id']; ?>"><i class="fa-regular fa-pen-to-square green"></i></a></td>
                            <td><a href="select.php?d_id=<?php echo $row['id']; ?>"><i class="fa-solid fa-trash-can red"></i></a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <a href="index.php" class="btn btn-secondary" style="width: 60px;">Back</a>
        </div>
    </section>
</body>

</html>