<?php 
include 'db.php';

$result = $conn -> query("select * from employees");
?>

<table border="1" cellpadding="20">
    <tr>
       <td>ID</td>
        <td>Name</td>
        <td>Position</td>
        <td>Salary</td>
    </tr>

    <?php while($row = $result -> fetch_assoc()) { ?>
    <tr>
         <td><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['position']?></td>
        <td><?php echo $row['salary']?></td>
    </tr>
    <?php } ?>
</table>
