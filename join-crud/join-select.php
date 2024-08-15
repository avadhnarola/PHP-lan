<?php
  include('config.php');

  $sel = "select id,name,jdate,salary,dept.dname,countries from staff INNER JOIN dept ON staff.dept_id = dept.dept_id;";
  $responce = mysqli_query($conn,$sel);
  // $result = mysqli_fetch_all($responce);
  // echo '<pre>';
  // print_r($result);

?>


<table border = "1">
    <thead>
        <td>ID</td>
        <td>Name</td>
        <td>Jdate</td>
        <td>Salary</td>
        <td>Dname</td>
        <td>Countries</td>
    </thead>
    <?php while($row = mysqli_fetch_assoc($responce)){?>

        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['jdate']?></td>
            <td><?php echo $row['salary']?></td>
            <td><?php echo $row['dname']?></td>
            <td><?php echo $row['countries']?></td>
        </tr>

<?php } ?>
</table>