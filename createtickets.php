<?php 
session_start();
include 'dbconnect.php';

if(!isset($_SESSION['username'])){
  header('location: login.php');
}

if(isset($_POST['submit'])){
$sub = $_POST['subject'];
$text = $_POST['text'];
$type = $_POST['type'];
$username = $_SESSION['username'];
$status = "In pending ";
$replay = "In pending";

$sql ="INSERT INTO `tickets` ( `username`, `subject`, `description`, `type`, `date`,`status`,`replay`)
         VALUES ( '$username', '$sub', '$text', '$type', current_timestamp(), '$status','$replay' )";

 $result = mysqli_query($conn , $sql);
 if($result){
  echo "<script>alert('your Ticket is submitted')</script>";
  
header("Location: createtickets.php");
 }

header("Location: createtickets.php");


}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>welcome - <?php  $_SESSION['username'] ?></title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--  bootstrap  end -->
    <link rel="stylesheet" href="mydetails.css" class="css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="fontawesome/js/fontawesome.min.js">
    <script src="bootstrap/js/bootstrap.min.js" ></script>

<!-- style css -->
<style>
 @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: white;
}

.wrapper{
  display: flex;
  position: relative;
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background: #4b4276;
  padding: 30px 0px;
  position: fixed;
}

.wrapper .sidebar h2{
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
}    

.wrapper .sidebar ul li a{
  color: #bdb8d7;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #594f8d;
}
    
.wrapper .sidebar ul li:hover a{
  color: #fff;
  border : none;
  
}
 
.wrapper .sidebar .social_media{
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.wrapper .sidebar .social_media a{
  display: block;
  width: 40px;
  background: #594f8d;
  height: 40px;
  line-height: 45px;
  text-align: center;
  margin: 0 5px;
  color: #bdb8d7;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}

.wrapper .main_content .header{
  padding: 20px;
  background: #fff;
  color: #717171;
  border-bottom: 1px solid #e0e4e8;
}

.wrapper .main_content .info{
  margin: 20px;
  color: #717171;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
}

.form{
  width:100%;
}

.card{
  {
  margin: 70px;
  display: grid;
  grid-template-columns: repeat(1,1fr);
  grid-gap: 30px;
  align-items: center;
}



}
</style>
<!-- css end -->

</head>
<body>
    <!-- welcome - <?php// echo $_SESSION['username'] ?> -->
    <div class="wrapper">
    <div class="sidebar">
        <h2>Welcome</h2>
        <h2><?php echo $_SESSION['username'] ?></h2>
        <ul>
           
           <li ><a href="welcome.php" style= " text-decoration: none;" ><i class="fas fa-plus-square"></i>Medicine</a></li>
           <li><a href="cart/cart.php" style= " text-decoration: none;"><i class="fas fa-cart-plus"></i>My cart</a></li>
           <li ><a href="myorders.php" style= " text-decoration: none;"><i class="fas fa-cart-arrow-down"></i>MY orders</a></li>
           <li style= "background-color: #594f8d;"><a href="createtickets.php" style= " text-decoration: none;"><i class="fas fa-paper-plane"></i>Create Ticket</a></li>
           <li><a href="solvedtickets.php" style= " text-decoration: none;"><i class="fas fa-check"></i>My Tickets</a></li>
           <li><a href="faq.php" style= " text-decoration: none;"><i class="fas fa-question"></i> FAQ?</a></li>
           <li><a href="mydetails.php" style= " text-decoration: none;"><i class="fas fa-home"></i>My Details</a></li>
           <li><a href="logout.php" style= " text-decoration: none;"><!--<i class="fas fa-sign-out-alt">--> Logout</a></li>
       </ul>  
    
    </div> 
   
   <div class="main_content">
   <div class="ml-5">
<br>
<h3 style="margintop:30px;">Tickets</h3>
<hr>
<h3>If you're experiencing any issues, contact us by opening a ticket.</h3>
<hr>
<br>
</div>

<form class="ml-4 h-99 w-75 px-2 py-2" action="createtickets.php" method="post" style="box-shadow: 2px 2px 26px 0px rgba(0,0,0,0.3);">
  <div class="form-group">
  <h2 class="text-info">OPEN Ticket</h2>
  <hr>
    <label for="exampleFormControlInput1" class="display-6"><h3>Subject:</h3></label>
    <input type="text" class="form-control" name="subject" id="exampleFormControlInput1" placeholder="Enter Subject" required autocomplete="off">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1"><h3>Description</h3></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="text" required></textarea>
  </div>

  <div class="form-group w-50">
    <label for="exampleFormControlSelect1"><h3>Type</h3></label>
    <select class="form-control" id="exampleFormControlSelect1" name="type" required>
    <option value="" selected disabled>-SELECT TYPE-</option>
      <option>support</option>
      <option>payment</option>
      <option>complaint</option>
      <option>others</option>
      
    </select>
  </div>
  <br>
  <button type="submit" class="btn btn-danger btn-lg  " name="submit" onclick="return confirm('click yes to submit');">Submit</button>
  
</form>





</div>

    </body>
</html>