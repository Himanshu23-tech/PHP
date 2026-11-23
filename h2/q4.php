
<?php 
include 'db.php';

if($_SERVER["REQUEST_METHOD"]==='POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $job_title = $_POST['job_title'];

    if(empty($name) || empty($email) || empty($password) ||
       empty($cpassword) || empty($job_title)){

        echo "<script>alert('All fields are required');</script>";

    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        echo "<script>alert('Invalid email format');</script>";

    }
    elseif($password != $cpassword){

        echo "<script>alert('Password does not match');</script>";

    }
    else{
        
        $sql = $conn->prepare("insert into employee_registration(name,email,password,job_title) values(?,?,?,?)");

        $sql->bind_param('ssss',$name,$email,$password,$job_title);

        if($sql->execute()){
            echo "<script>alert('Registration successful');</script>";
            echo "<script>window.onload = function(){ document.querySelector('form').reset(); }</script>";
        }
        else{
            if($sql->errno == 1062){
                echo "<script>alert('Email already exists');</script>";
            }
            else{
                echo "<script>alert('Error');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

    <h2>Employee Registration Form</h2>

    <form method="POST">

    Full Name :
    <input type="text" name="name" required><br><br>

    Email :
    <input type="text" name="email" required><br><br>

    Password :
    <input type="password" name="password" required><br><br>

    Confirm Password :
    <input type="password" name="cpassword" required><br><br>

    Job Title :
    <input type="text" name="job_title" required><br><br>

    <input type="submit" value="Register">

    </form>

</body>
</html>
