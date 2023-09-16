<?php
$showalert=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]== "POST"){

 
 include 'dbconnect.php';
$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["username"];
$password =$_POST["password"];
$cpassword = $_POST["cpassword"];
//$exicts = false;

$token = bin2hex(random_bytes(15));

//

//
//check whether user is exicts or not
$exictsql = " SELECT * FROM `register` WHERE username ='$username'";
$result = mysqli_query($conn,$exictsql);
$numExistRows = mysqli_num_rows($result);

$exictemail = " SELECT * FROM `register` WHERE email ='$email'";
$emailresult = mysqli_query($conn,$exictemail);
$numExist = mysqli_num_rows($emailresult);


if($numExistRows > 0 )
{
  echo "<script>alert('Username already exists!')</script>";
}
elseif($numExist)
{
    echo "<script>alert('E-mail already exists!')</script>";
}
elseif(($password == $cpassword)){
 $sql ="INSERT INTO `register` ( `name`, `email`, `username`, `password`, `date`, `token`) VALUES ( '$name', '$email', '$username', '$password', current_timestamp(), '$token')";

 $result = mysqli_query($conn , $sql);
 if($result){
   $showalert = true;
 }
}
else{
  $showerror = true;
}




}
?>

<html>
<head>
<title>EzDocS</title>
<link rel="stylesheet" href="register1.css"> 
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body class="back">

<?php

if($showalert){
  echo" '<script>alert('your account has created you can login now')</script>' ";
 
}




if($showerror){
  echo" '<script>alert('password do not match')</script>' ";


}



?>

<!--register -->
    <div class="login">
      <div class="form">
      
        
      
    <form action="/ezdocs/register1.php" class="register" method="post" autocomplete="off">
    <input type="text" name="name" id="name" placeholder="Enter name" required>
    <input type="email" name="email" id="email" placeholder="enter email ">
        <input type="text" placeholder="username" name="username" id="username" required>
        <input type="password" minlength="8" placeholder="password" name="password" id="password" required>
        <input type="password" placeholder="confirm password" name="cpassword" id="cpassword" required>
        
       <!-- <label for="checkbox" id="showpass">show password</label> 
        <p id="show">Show password<p><input type="checkbox" name="checkbox" onclick="myFunction()" id="checkbox">
        <!-- show password -->
                        <!-- <script>
                          function myFunction()
                           {
                              var x = document.getElementById("password");
                              if (x.type === "password") {
                                x.type = "text";
                                } else {
                                 x.type = "password";
                                     }
                              }
                              </script> -->

        <!-- show password -->
        <button type="submit" id="loginbutton" class="submit" placeholder="Register">Register</button>
        <p class="msg">Already register? <a href="/ezdocs/login.php">login</a></p>
        <p class="msg">Back to home page <a href="/ezdocs/index.php">click here!</a></p>
    </form>
    </div>
</div>
<!--register end -->
</body>

</html>