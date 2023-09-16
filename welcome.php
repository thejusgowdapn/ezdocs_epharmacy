
<?php
session_start();

//if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']  !=true){
    //header("location : login.php");
  //  exit;

//}

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
    <link rel="stylesheet" href="welcome.css" class="css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <script src="bootstrap/js/bootstrap.min.js" ></script>

    <title>welcome - <?php  $_SESSION['username'] ?></title>

<style>
.type{
text-align : center;
color:purple;


}

.container{
margin-left:30px;

}



</style>

</head>
<body>
    <!-- welcome - <?php// echo $_SESSION['username'] ?> -->
    <div class="wrapper">
    <div class="sidebar">
        <h2>Welcome</h2>
        <h2><?php echo $_SESSION['username'] ?></h2>
        <ul>
           
            <li style= "background-color: #594f8d;"><a href="welcome.php" style= " text-decoration: none;"><i class="fas fa-plus-square"></i>Medicine</a></li>
            <li><a href="cart/cart.php" style= " text-decoration: none;"><i class="fas fa-cart-plus"></i>My cart</a></li>
            <li><a href="myorders.php" style= " text-decoration: none;"><i class="fas fa-cart-arrow-down"></i>MY orders</a></li>
            <li><a href="createtickets.php" style= " text-decoration: none;"><i class="fas fa-paper-plane"></i>Create Ticket</a></li>
            <li><a href="solvedtickets.php" style= " text-decoration: none;"><i class="fas fa-check"></i>My Tickets</a></li>
            <li><a href="faq.php" style= " text-decoration: none;"><i class="fas fa-question"></i> FAQ?</a></li>
            <li><a href="mydetails.php" style= " text-decoration: none;"><i class="fas fa-home"></i>My Details</a></li>
            <li><a href="logout.php" style= " text-decoration: none;"> <!--<i class="fas fa-sign-out-alt"> --> Logout</a></li>
        </ul> 
        <!-- <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </div>
    <div class="main_content">
        <!-- <div class="header">Welcome!! Have a nice day.</div>  
        <div class="info">
          <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
          <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
          <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
      </div> -->
     
<div class="container">

<div class="type"> <h1> Medicine category    </h1>   </div>
 <main class="grid ">
    <article>
     <!-- eye -->
     <img src="images/eye.jpg" alt="">
     <!-- <h3>EYE</h3> -->
     <br>
      <a href="cart/index.php"><button> click here  </button> </a>
    </article>

    <article>
     <!-- hair-->
     <img src="images/hair.jpg" alt="">
     <!-- <h3>HAIR</h3> -->
     <br>
      <a href="cart/hair.php"> <button>click here</button> </a> 
    </article>

    <article>
     <!-- lungs -->
     <img src="images/lungs.jpg" alt="">
     <!-- <h3>Lungs</h3> -->
     <br>
     <a href="cart/lungs.php"> <button>click here</button> </a> 
    </article>

    <article>
     <!-- eye -->
     <img src="images/neuro.jpg" alt="">
     <!-- <h3>Neuro</h3> -->
     <br>
     <a href="cart/neuro.php">  <button>click here</button> </a> 
    </article>

    <!-- <article> -->
     <!-- eye -->
     <!-- <img src="images/ortho.jpg" alt=""> -->
     <!-- <h3>Ortho</h3> -->
     <!-- <br>
     <a> <button>click here</button> </a> 
    </article> -->

    

 
    <article>
     <!-- eye -->
     <img src="images/cardiac.jpg" alt="">
     <!--<h3>STOMACH</h3> -->
      <br>
     <a href="cart/cardiac.php"> <button>click here</button> </a> 
    </article>

    <article>
     <!-- eye -->
     <img src="images/diabetes.jpg" alt="">
     <!-- <h3>STOMACH</h3> -->
     <br>
     <a href="cart/diabets.php">  <button>click here</button> </a> 
    </article>

    
    

 </main>

</div>





   <!-- main content end div -->
    </div> 



</div>

<?php  
include 'footer.php';
?> 
  
</body>
</html>