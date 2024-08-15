
<?php 

// select ,delete


include('config.php');

if(isset($_GET['del_id'])){
    $del = "delete from userdata where Id=".$_GET['del_id'];
    mysqli_query($conn,$del);
}

$select = "select * from userdata";
$res = mysqli_query($conn,$select);

?>
<table border=1>
    <?php while($row = mysqli_fetch_assoc($res)) { ?>
    <tr>
        <td><?php echo $row['Id']?></td>
        <td><?php echo $row['Name']?></td>
        <td><?php echo $row['Email']?></td>
        <td><?php echo $row['Password']?></td>
        <td><?php echo $row['radio']?></td>
        <td><?php echo $row['language']?></td>
        <td><a href="select.php?del_id=<?php echo $row['Id'];?>">Delete</a></td>
        <td><a href="crud.php?upd_id=<?php echo $row['Id'];?>">Update</a></td>
    </tr>

<?php } ?>
</table>


<?php

// insert update
    include("config.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $radio = $_POST['radio'];
        $language = $_POST['language'];
        if(isset($_GET['upd_id'])){
            $query = "update userdata set name='$name' where Id=".$_GET['upd_id'];
        }
        else{
            $query = "insert into userdata(name,email,password,radio,language ) values ('$name','$email','$password','$radio','$language')";
        }
        mysqli_query($conn,$query);
        header('Location:select.php');// ek var updqate thay pchi select.php ma move thaay
    }

?>