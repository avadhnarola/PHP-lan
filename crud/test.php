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


    if (isset($_GET['u_id'])) {

        mysqli_query($conn,"update admin set name='$name' , email='$email' , password='$password' , gender='$gender' , hobby='$hobby' , city='$city' where id=$id");
    } else {
        mysqli_query($conn, "insert into admin(name,email,password,gender,hobby,city) VALUES ('$name','$email','$password','$gender','$hobby','$city')");
    }
    header('location:test-view.php');
}

?>



<form action="" method="post">
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
                <input type="radio" name="gender" value="Male" <?php if(@$u_data['gender'] == "Male"){
                    echo "checked";
                } ?>>Male
                <input type="radio" name="gender" value="Female" <?php if(@$u_data['gender'] == "Female"){
                    echo "checked";
                } ?>>Female
            </td>
        </tr>
        <tr>
            <td>Hobbies : </td>
            <td>
                <input type="checkbox" name="hobby[]" value="Cricket" <?php if(isset($_GET['u_id'])){
                    if(in_array("Cricket",@$arr_hobby)){
                        echo "Checked";
                    }
                } ?> >Cricket
                <input type="checkbox" name="hobby[]" value="Hockey" <?php if(isset($_GET['u_id'])){
                    if(in_array("Hockey",@$arr_hobby)){
                        echo "Checked";
                    }
                } ?>>Hokey
                <input type="checkbox" name="hobby[]" value="Singing" <?php if(isset($_GET['u_id'])){
                    if(in_array("Singing",@$arr_hobby)){
                        echo "checked";
                    }
                } ?>>Singing
                <input type="checkbox" name="hobby[]" value="Reading" <?php if(isset($_GET['u_id'])){
                    if(in_array("Reading",@$arr_hobby)){
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
                    <option value="Surat">Surat</option>
                    <option value="Navasari">Navasari</option>
                    <option value="Botad">Botad</option>
                    <option value="Vadodara">Vadodara</option>
                    <option value="Rajkot">Rajkot</option>
                </select>
            </td>
        </tr>
        <td></td>
        <td>
            <input type="submit" name="submit">
        </td>
        </tr>
    </table>
</form>