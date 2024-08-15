<?php
include ('config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $marks = $_POST['marks'];
    print_r($_FILES);
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/$image");


    if (isset($_GET['u_id'])) {
        $query = "update studentdata set sname = '$name' , grade = '$grade' , marks = '$marks' where id=" . $_GET['u_id'];
        // mysqli_query($conn,$update);
    } else {

        $query = "insert into studentdata (sname,grade,marks,image) values ('$name','$grade','$marks','$image')";
    }

    mysqli_query($conn, $query);
    header('location:view.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Beiruti:wght@200..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playwrite+AU+QLD:wght@100..400&display=swap"
        rel="stylesheet">

    <style>
        h1 {
            font-family: "Nunito", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        .main {
            box-shadow: 0px 0px 20px gray;
        }

        .form-control {
            outline: none;
        }

        .form-control:active {
            outline: none;
            box-shadow: 0px;
            background-color: #fff;
            outline: 0;
        }
    </style>

</head>



<body>
    <section>
        <div class="form-container container mt-4 main">
            <div class="logo-container">
                <h3>Stundent Details</h3>
            </div>

            <form class="form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Name</label>
                    <input type="text" id="email" name="name" placeholder="Enter name" required>
                    <label for="grade">Grade</label>
                    <select name="grade" id="grade" class="form-control" required>
                        <option value="">Select a Grade</option>
                        <option value="grade1">Grade 1</option>
                        <option value="grade2">Grade 2</option>
                        <option value="grade3">Grade 3</option>
                        <option value="grade4">Grade 4</option>
                        <option value="grade 5">Grade 5</option>
                    </select>
                    <label>Marks</label>
                    <input type="number" name="marks" placeholder="Enter marks" required>
                </div>
                <input type="file" name="image" class="mt-3">

                <input type="submit" name="submit" class="form-submit-btn" id="submit">
            </form>
        </div>
        <div class="container" style="margin-top: 20px;">
            <a href="select.php" class="btn btn-secondary">View Data</a>
        </div>
    </section>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

</html>