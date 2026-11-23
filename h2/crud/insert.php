<?php 
include 'db.php';

if($_SERVER["REQUEST_METHOD"]==='POST'){
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = $conn->prepare("insert into employees(name,position,salary) values(?,?,?)");
    $sql->bind_param('ssd',$name,$position,$salary);

    if($sql->execute()){
        echo "Data inserted";
    }else{
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

    <form method="POST">

    Employee Name :
    <input type="text" name="name"><br><br>

    Job Title :
    <input type="text" name="position"><br><br>

    Salary :
    <input type="text" name="salary"><br><br>

    <input type="submit">

    </form>

</body>
</html>