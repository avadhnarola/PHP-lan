<?php
    include('config.php');
    if(isset($_GET['d_id'])){
        $del = "delete from userdata where Id=".$_GET['d_id'];
        mysqli_query($conn,$del);
    }
    $sel = "select * from userdata";
    $responce = mysqli_query($conn,$sel);
    // $data = mysqli_fetch_all($responce);
    // echo '<pre>';
    // print_r($data);
?>
<table border='1'>
<?php while($row = mysqli_fetch_assoc($responce)){ ?>
    <tr>
        <td><?php echo $row['Id']?></td>
        <td><?php echo $row['Name']?></td>
        <td><?php echo $row['Email']?></td>
        <td><?php echo $row['Password']?></td>
        <td><?php echo $row['radio']?></td>
        <td><?php echo $row['language']?></td>
        <td><a href="select.php?d_id=<?php echo $row['Id'];?>">delete</td>
        <td><a href="crud.php?u_id=<?php echo $row['Id'];?>">update</td>

    </tr>
<?php } ?>
</table>


