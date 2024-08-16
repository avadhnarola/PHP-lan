<?php

include_once('config.php');


if (isset($_GET['u_id'])) {

    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from admin where id=$id");
    $u_data = mysqli_fetch_assoc($u_data);
    $arr_hobby = explode(",", $u_data['hobby']);
}

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $hobby = implode(",", $_POST['hobby']);
    $city = $_POST['city'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"images/$image");

    // echo '<pre>';
    // print_r($image);die();


    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update admin set name='$name' , email='$email' , password='$password' , gender='$gender' , hobby='$hobby' , city='$city' , img='$image' where id=$id");
    } else {
        mysqli_query($conn, "insert into admin(name,email,password,gender,hobby,city,img) VALUES ('$name','$email','$password','$gender','$hobby','$city','$image')");
        header('location:crud.php');
    }
    header('location:crud-view.php');
}

?>



<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name : </td>
            <td><input type="text" name="name" value="<?php echo @$u_data['name']; ?>"></td>
        </tr>
        <tr>
            <td>Email : </td>
            <td><input type="email" name="email" value="<?php echo @$u_data['email']; ?>"></td>
        </tr>
        <tr>
            <td>Password : </td>
            <td><input type="password" name="password" value="<?php echo @$u_data['password']; ?>"></td>
        </tr>
        <tr>
            <td>Gender : </td>
            <td>
                <input type="radio" name="gender" value="Male" <?php if (@$u_data['gender'] == "Male") {
                    echo "checked";
                } ?>>Male
                <input type="radio" name="gender" value="Female" <?php if (@$u_data['gender'] == "Female") {
                    echo "checked";
                } ?>>Female
            </td>
        </tr>
        <tr>
            <td>Hobbies : </td>
            <td>
                <input type="checkbox" name="hobby[]" value="Cricket" <?php if (isset($_GET['u_id'])) {
                    if (in_array("Cricket", @$arr_hobby)) {
                        echo "Checked";
                    }
                } ?>>Cricket
                <input type="checkbox" name="hobby[]" value="Hockey" <?php if (isset($_GET['u_id'])) {
                    if (in_array("Hockey", @$arr_hobby)) {
                        echo "Checked";
                    }
                } ?>>Hokey
                <input type="checkbox" name="hobby[]" value="Singing" <?php if (isset($_GET['u_id'])) {
                    if (in_array("Singing", @$arr_hobby)) {
                        echo "checked";
                    }
                } ?>>Singing
                <input type="checkbox" name="hobby[]" value="Reading" <?php if (isset($_GET['u_id'])) {
                    if (in_array("Reading", @$arr_hobby)) {
                        echo "checked";
                    }
                } ?>>Reading
            </td>
        </tr>
        <tr>
            <td>City : </td>
            <td>
                <select name="city" id="">
                    <option value="" disabled selected>-- select city --</option>
                    <option value="Surat" <?php if (@$u_data['city'] == "Surat") {
                        echo "Selected";
                    } ?>>Surat</option>

                    <option value="Navasari" <?php if (@$u_data['city'] == "Navasari") {
                        echo "Selected";
                    } ?>>Navasari
                    </option>
                    <option value="Botad" <?php if (@$u_data['city'] == "Botad") {
                        echo "Selected";
                    } ?>>Botad</option>
                    <option value="Vadodara" <?php if (@$u_data['city'] == "Vadodara") {
                        echo "Selected";
                    } ?>>Vadodara
                    </option>
                    <option value="Rajkot" <?php if (@$u_data['city'] == "Rajkot") {
                        echo "Selected";
                    } ?>>Rajkot</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Image : </td>
            <td><input type="file" name="image" multiple></td>
        </tr>
        <td></td>
        <td>
            <input type="submit" name="submit">
        </td>
        </tr>
    </table>
</form>