
<?php
$login=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]== "POST"){

 
 include 'dbconnect.php';

$username = $_POST["username"];
$password =$_POST["password"];

// testing
// $testsql = "select * from register where username = $username";
// $testresult = mysqli_query($conn,$testsql);
// while($row = mysqli_fetch_array($testresult)){
//   $name = $row['name'];	
//   $email = $row['email'];
//   $password = $row['password'];

//   }

// testing end

$sql = "Select * from register where username= '$username' AND password = '$password'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num == 1){
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("location: welcome.php");
}
else{
    $showerror= true;
}
}
   ?>


<html>
<head>
<title>login</title>
<link rel="stylesheet" href="register1.css">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e6480825a5.js" crossorigin="anonymous"></script>
</head>
<body >
<?php
if($login){
  echo" '<script>alert('your are loggedin')</script>' ";

}
if($showerror){
  echo" '<script>alert('user name or password is invalid')</script>' ";

}


?>

    <div class="login" id="loginid">

        <div class="form">
        <label id="lolabel" > USER LOGIN </label>
        <br>
        <br>
        <br>
    <form action="/ezdocs/login.php" class="register" method="post" autocomplete="off">
           <div class="icon">
        <input type="text" placeholder="username" name="username" id="username" required>
         
        </div>
        <input type="password" placeholder="password" name="password" id="password" required>
        
        <!-- <label for="checkbox" id="showpass">show password</label>
        <input type="checkbox" name="checkbox" onclick="myFunction()" id="checkbox"> -->
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
        <button type="submit" id="loginbutton" class="submit" placeholder="Login">LOGIN</button>
        <p class="msg">dont have an account? <a href="/ezdocs/register1.php">register</a></p>
        <p class="msg">clik for admin login <a href="/ezdocs/adminlogin.php">Admin</a></p>
    </form>
    </div>
</div>
</body>

</html>