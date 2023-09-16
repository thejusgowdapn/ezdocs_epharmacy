<?php

session_start();

//if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']  !=true){
    //header("location : login.php");
  //  exit;

//}

if(!isset($_SESSION['username'])){
    header('location: login.php');
}

include '/ezdocs/dbconnect.php';

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
    <link rel="stylesheet" href="eye.css" class="css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
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
   background-color: #f3f5f9;
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
           
        <li style= "background-color: #594f8d;"><a href="/ezdocs/welcome.php" style= " text-decoration: none;"><i class="fas fa-plus-square"></i>Medicine</a></li>
           <li><a href="cart.php" style= " text-decoration: none;"><i class="fas fa-cart-plus"></i> My cart</a></li>
           <li><a href="/ezdocs/myorders.php" style= " text-decoration: none;"><i class="fas fa-cart-arrow-down"></i>MY orders</a></li>
           <li><a href="/ezdocs/createtickets.php" style= " text-decoration: none;"><i class="fas fa-paper-plane"></i>Create Ticket</a></li>
           <li><a href="/ezdocs/solvedtickets.php" style= " text-decoration: none;"><i class="fas fa-check"></i>My Ticket</a></li>
           <li><a href="/ezdocs/faq.php" style= " text-decoration: none;"><i class="fas fa-question"></i>FAQ?</a></li>
           <li><a href="/ezdocs/mydetails.php" style= " text-decoration: none;"><i class="fas fa-home"></i>My Details</a></li>
           <li><a href="/ezdocs/logout.php" style= " text-decoration: none;"><!--<i class="fas fa-sign-out-alt"> --> Logout</a></li>
       </ul>  
        <!-- <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </div> -->
    <div class="main_content">


    <h1 id="tit" class="text-center">EYe care MEdicine</h1>

<div class="row">
    
<?php 
$qu = " SELECT `name`, `image`, `price`, `discount`, `category` FROM `itemlist`  order by  id ASC  "; 
$fire = mysqli_query($conn,$qu);
$numb = mysqli_num_rows($fire);

if($numb > 0){
while($product = mysqli_fetch_array($fire)){
    ?>
     
<div class="col-lg-2 col-md-6 col-sm-12  my-3">

<form action="" class="border">
<div class="card"> 
<h6 class="card-title bg-info text-white">  <?php echo $product['name']; ?> </h6>
<div class="card-body">
<img src="<?php echo $product['image']; ?>" alt="why not d" class="img-fluid mb-2">
<h6> &#8377; <?php echo $product['price']; ?> 
<span>(<?php echo $product['discount']; ?>% off)</span> </h6>

<input type="text" name="" id="" class="form-control" placeholder="quantity">

</div>

<div class="btn-group d-flex">
<button class="btn btn-success flex-fill">Add to cart
</button><button class="btn btn-warning flex-fill text-white">Buy now </button>
</div>
</div>
</form>


</div>


<?php 
}

}


?>




    <!-- end main -->
    </div> 



</div>

    
  
</body>
</html>