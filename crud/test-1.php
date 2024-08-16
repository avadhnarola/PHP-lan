<?php
include_once('config.php');

if (isset($_GET['d_id'])) {

    $id = $_GET['d_id'];
    mysqli_query($conn, "delete from student where id=$id");
    header('location:test-1.php');
}

if (isset($_GET['u_id'])) {

    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from student where id=$id");
    $u_data = mysqli_fetch_assoc($u_data);
    $arr_hobby = explode(",", $u_data['hobby']);
}

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $hobby = implode(",", $_POST['hobby']);
    $city = $_POST['city'];
    $image = $_FILES['image']['name'];

    // echo '<pre>';
    // print_r($image);die();
    $img_string = implode(',',$image);

    foreach ($image as $key => $img_name) {
        $path = "images/".$img_name;
        move_uploaded_file($_FILES['image']['tmp_name'][$key],$path);
    }


    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update student set name='$name',email='$email',password='$password',gender='$gender',hobby='$hobby',city='$city', img='$img_string' where id=$id");

   } else {

        mysqli_query($conn, "insert into student(name,email,password,gender,hobby,city,img) VALUES ('$name','$email','$password','$gender','$hobby','$city','$img_string')");
    }
    header('location:test-1.php');

}



$data = mysqli_query($conn, "select * from student");
?>


<form action="" method="post" enctype="multipart/form-data">
    <table style="margin:auto; border-radius: 5px; height:250px; box-shadow: 0px 0px 20px gray">
        <tr>
            <td>Name : </td>
            <td><input type="text" name="name" value="<?php echo @$u_data['name']; ?> "></td>
        </tr>
        <tr>
            <td>Email : </td>
            <td><input type="email" name="email" value="<?php echo @$u_data['email']; ?> "></td>
        </tr>
        <tr>
            <td>Password : </td>
            <td><input type="password" name="password" value="<?php echo @$u_data['password']; ?>"></td>
        </tr>
        <tr>
            <td>Gender : </td>
            <td><input type="radio" name="gender" value="Male" <?php if (@$u_data['gender'] == "Male") {
                echo "checked";
            } ?>>Male
                <input type="radio" name="gender" value="Female" <?php if (@$u_data['gender'] == "Female") {
                    echo "checked";
                } ?>>Female
            </td>
        </tr>
        <tr>
            <td>Hobby : </td>
            <td><input type="checkbox" name="hobby[]" value="Cricket" <?php if (isset($_GET['u_id'])) {
                if (in_array("Cricket", @$arr_hobby)) {
                    echo "Checked";
                }
            } ?>>Cricket
                <input type="checkbox" name="hobby[]" value="Singing" <?php if (isset($_GET['u_id'])) {
                    if (in_array("Singing", @$arr_hobby)) {
                        echo "Checked";
                    }
                } ?>>Singing
                <input type="checkbox" name="hobby[]" value="Dancing" <?php if (isset($_GET['u_id'])) {
                    if (in_array("Dancing", @$arr_hobby)) {
                        echo "Checked";
                    }
                } ?>>Dancing
                <input type="checkbox" name="hobby[]" value="Reading" <?php if (isset($_GET['u_id'])) {
                    if (in_array("Reading", @$arr_hobby)) {
                        echo "Checked";
                    }
                } ?>>Reading
            </td>
        </tr>

        <tr>
            <td>City : </td>
            <td>
                <select name="city">
                    <option value="" disabled selected>--Select City--</option>
                    <option value="Surat" <?php if (@$_udata['city'] == "Surat") {
                        echo "selected";
                    } ?>>Surat</option>
                    <option value="Bharuch" <?php if (@$u_data['city'] == "Bharuch") {
                        echo "selected";
                    } ?>>Bharuch</option>
                    <option value="Vadodara" <?php if (@$u_data['city'] == "Vadodara") {
                        echo "selected";
                    } ?>>Vadodara
                    </option>
                    <option value="Rajkot" <?php if (@$_u_data['city'] == "Rajkot") {
                        echo "selected";
                    } ?>>Rajkot</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Image : </td>
            <td><input type="file" name="image[]" multiple></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="save">
            </td>
        </tr>
    </table>
</form>

<h2>Student Data</h2>
<table border="">
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Gender</th>
    <th>Hobby</th>
    <th>City</th>
    <th>Image</th>

    <?php while ($row = mysqli_fetch_assoc($data)) { $image = explode(',',$row['img']); ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['hobby'] ?></td>
            <td><?php echo $row['city'] ?></td>
            <td>
                <?php foreach($image as $value) { ?>
                    <img src="images/<?php echo $value ?>" alt="no found" height="50px" width="50px">
                <?php } ?>
            </td>
            <td><a href="test-1.php?d_id=<?php echo $row['id']; ?>">Delete</a></td>
            <td><a href="test-1.php?u_id=<?php echo $row['id']; ?>">Update</a></td>
        </tr>

    <?php } ?>
</table>



