<?php
include ('config.php');
include ('dashboard.php');
if(!isset($_SESSION["id"])){
    header('Location:index.php');
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $branch = $_POST['branch'];
    // $data = implode(',',$branch);
    // echo $data;die();
    $role = $_POST['role'];
    $contact = $_POST['contact'];
    // print_r($_FILES);die();
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/$image");

    $sel = "select * from admin where email='$email'";
    $res = mysqli_query($conn, $sel);
    // print_r($res);die();

    if (mysqli_num_rows($res) == 0) {

        $query = "insert into admin (name,email,password,b_id,r_id,contact,image) values('$name','$email','$password','$branch','$role','$contact','$image')";
        mysqli_query($conn, $query);
    } else {
        echo "⚠️ This email already Exist ⚠️";
    }
}


$select = "select * from role";
$res = mysqli_query($conn, $select);

$sel = "select * from branch";
$responce = mysqli_query($conn, $sel);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>

    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Zain:wght@200;300;400;700;800;900&display=swap"
    rel="stylesheet">


</head>

<body>
    <div class="form-container">
        <p class="title">Register</p>
        <form class="form" method="post" enctype="multipart/form-data">
            <input type="text" class="input" placeholder="Name" name="name" required>
            <input type="email" class="input" placeholder="Email" name="email" required>
            <input type="password" class="input" placeholder="Password" name="password" required>
            <label for="" class="lable">Branch </label>
            <select name="branch" id="branch">
                <?php while ($row = mysqli_fetch_assoc($responce)) { ?>
                    <option value="<?php echo $row['b_id'] ?> "><?php echo $row['bname'] ?></option>
                <?php } ?>
            </select>
            <label for="" class="lable">Role</label>
            <select id="role" name="role">
                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <option value=" <?php echo $row['r_id'] ?>"><?php echo $row['rname'] ?></option>
                <?php } ?>
            </select>
            <input type="number" class="input" placeholder="Contact No" name="contact" maxlength="10" minlength="10">
            <input type="file" name="image" required>
            <input type="submit" class="form-btn" name="submit" value="Create Account">
        </form>
        <p class="sign-up-label">
            Already have an account?<a href="index.php" class="sign-up-link"> Log in</a>
        </p>


    </div>
    <!-- <script> new MultiSelectTag('branch')</script> -->
</body>

</html>