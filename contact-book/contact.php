<?php
include_once 'db.php';

include_once 'index.php';

session_start();
if(!isset($_SESSION['id'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



    <link rel="stylesheet" href="assets/register.css">
    <link rel="stylesheet" href="CSS/allmin/all.min.css">

</head>

<body>

    <div class="mt-5">
        <div class="form-container m-auto">
            <p class="title">Add Contact</p>
            <form class="form">
                <input type="text" class="input" placeholder="Name">
                <input type="number" class="input" placeholder="Contact No.">
                
                <button class="form-btn" type="submit" name="submit">Add </button>
            </form>

        </div>
    </div>
</body>

</html>