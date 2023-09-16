<?php 
session_start();
include 'dbconnect.php';

if(!isset($_SESSION['username'])){
  header('location: login.php');
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
    <link rel="stylesheet" href="faq.css" class="css">
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
           <li ><a href="createtickets.php" style= " text-decoration: none;"><i class="fas fa-paper-plane"></i>Create Ticket</a></li>
           <li><a href="solvedtickets.php" style= " text-decoration: none;"><i class="fas fa-check"></i>My Tickets</a></li>
           <li style= "background-color: #594f8d;"><a href="faq.php" style= " text-decoration: none;"><i class="fas fa-question"></i> FAQ?</a></li>
           <li><a href="mydetails.php" style= " text-decoration: none;"><i class="fas fa-home"></i>My Details</a></li>
           <li><a href="logout.php" style= " text-decoration: none;"><!--<i class="fas fa-sign-out-alt">--> Logout</a></li>
       </ul>  
    
    </div> 
   
   <div class="main_content">
 


           <h2 class="text-center text-danger mt-4">Frequently Asked Questions?(FAQs)</h2>
<br>

<div class="acr">
<button class="accordion"><i class="fas fa-arrow-down" style="margin-right:20px;"></i>How to Order Medicine?</button>

<div class="panel">
  <p>1) click on Medicine in side Bar</p>
  <p>2) click on Medicine Category Which you need</p>
  <p>3) Add medicine To your cart</p>
  <p>4) clik on cart and Buy </p>
</div>

<button class="accordion"><i class="fas fa-arrow-down" style="margin-right:20px;"></i>what if i have issue with payment?</button>
<div class="panel">
  <p>1) create Ticket </p>
  <p>2) wait for replay</p>
</div>

<button class="accordion"><i class="fas fa-arrow-down" style="margin-right:20px;"></i>How to Delete my Account</button>
<div class="panel">
  <p>If you want to delete Your account , create Ticket like i want to delete My account</p>
</div>



<button class="accordion"><i class="fas fa-arrow-down" style="margin-right:20px;"></i>How to edit My Detatils?</button>
<div class="panel">
  <p> To edit Your Details click on "My Details" in nav bar. </p>

</div>



</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>








</div>

    </body>
</html>