<?php 
include 'db.php';

if($_SERVER["REQUEST_METHOD"]==='POST'){
    $id = $_POST['id'];
    $salary = $_POST['salary'];

    $sql = $conn->prepare("update employees set salary=? where id=?");
    $sql->bind_param('di',$salary,$id);

    if($sql->execute()){
        echo "Data updated";
    }else{
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

    <form method="POST">

    Employee ID :
    <input type="text" name="id"><br><br>

    New Salary :
    <input type="text" name="salary"><br><br>

    <input type="submit">

    </form>

</body>
</html>