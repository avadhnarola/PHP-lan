<?php
include ('config.php');
include ('dashboard.php');

if (!isset($_SESSION["id"])) {
    header('Location:index.php');
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $add = $_SESSION['id'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
    $reference = $_POST['reference'];
    $course = $_POST['course'];

    $query = "insert into inquiry (name,email,contact,added_by,branch,reference,intrested_course) values('$name','$email','$contact','$add','$branch','$reference','$course')";
    mysqli_query($conn, $query);

}


$select = "select * from role";
$res = mysqli_query($conn, $select);

$sel = "select * from branch";
$responce = mysqli_query($conn, $sel);

$ref = "select * from reference";
$refres = mysqli_query($conn, $ref);

$crs = "select * from course";
$crsres = mysqli_query($conn, $crs);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Form</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>

    <link rel="stylesheet" href="assets/css/register.css">


</head>

<body>
    <div class="form-container">
        <p class="title">Inquiry Form</p>
        <div class="inq" style="display:flex; text-align: start;">
            <strong>Inquiry By : </strong>
            <p style="border-bottom: 1px solid gray; width:150px; margin-left:10px;"><?php echo $_SESSION['name'] ?></p>
        </div>
        <form class="form" method="post">
            <input type="text" class="input" placeholder="Name" name="name" required>
            <input type="email" class="input" placeholder="Email" name="email" required>
            <input type="number" class="input" placeholder="Contact No" name="contact" maxlength="10" minlength="10">
            <label for="" class="lable">Branch </label>
            <select name="branch" id="branch">
                <?php while ($row = mysqli_fetch_assoc($responce)) { ?>
                    <option value="<?php echo $row['b_id'] ?> "><?php echo $row['bname'] ?></option>
                <?php } ?>
            </select>
            <label for="" class="lable">Reference</label>
            <select id="reference" name="reference">
                <?php while ($row = mysqli_fetch_assoc($refres)) { ?>
                    <option value=" <?php echo $row['id'] ?>"><?php echo $row['type'] ?></option>
                <?php } ?>
            </select>
            <label for="" class="lable">Intrested Course</label>
            <select id="course" name="course">
                <?php while ($row = mysqli_fetch_assoc($crsres)) { ?>
                    <option value=" <?php echo $row['id'] ?>"><?php echo $row['cname'] ?></option>
                <?php } ?>
            </select>
            <input type="submit" class="form-btn" name="submit" value="Submit">
        </form>


    </div>
    <!-- <script> new MultiSelectTag('branch')</script> -->
</body>

</html>