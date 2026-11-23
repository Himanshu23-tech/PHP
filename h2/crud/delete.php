<?php 
include 'db.php';

if($_SERVER["REQUEST_METHOD"]==='POST'){
    $id = $_POST['id'];

    $sql = $conn->prepare("delete from employees where id=?");
    $sql->bind_param('i',$id);

    if($sql->execute()){
        echo "Data deleted";
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
    <input type="text" name="id">

    <input type="submit">

    </form>

</body>
</html>