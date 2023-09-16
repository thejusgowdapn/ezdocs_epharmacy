<?php 
$login=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'dbconnect.php';

    $adminname = $_POST["adminid"];
     $adminpassword =$_POST["adminpassword"];


     $sql = "Select * from admin where adminname= '$adminname' AND adminpassword = '$adminpassword'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num == 1){
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['adminname'] = $adminname;
    header("location: admin.php");
}
else{
    $showerror= true;
}
}
   ?>

}







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register1.css">
    <title>Adminlogin</title>
</head>
<body>

<?php    

if($login){
    echo" '<script>alert('your are loggedin')</script>' ";
  
  }
  if($showerror){
    echo" '<script>alert('admin name or password is invalid')</script>' ";
  
  }
  



?>
    
<div class="login">

        <div class="form">
        <label id="adminlabel" > ADMIN LOGIN </label>
        <br>
        <br>
        <br>
    <form action="/ezdocs/adminlogin.php" class="register" method="post" autocomplete="off">
           <div class="icon">
               
        <input type="text" placeholder="Enter Admin id" name="adminid" id="username" required>
         
        </div>
        <input type="password" placeholder="password" name="adminpassword" id="password" required>
        
        
      

        
        <button type="submit" id="loginbutton" class="submit" placeholder="Login">LOGIN</button>
        <p class="msg">Back to home page <a href="/ezdocs/index.php">Home</a></p>


</body>
</html>