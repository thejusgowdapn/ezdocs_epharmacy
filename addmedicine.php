<?php 
session_start();
if(!isset($_SESSION['adminname'])){
  header('location: login.php');
}


$update = false;
include 'dbconnect.php';

// include '../includes/connect.php';

if(isset($_POST['submit'])){
$productname = $_POST['productname'];
$productprice = $_POST['productprice'];
$productquantity = "1";
$image = $_FILES['image'];
$productcode = $_POST['productcode'];
$category = $_POST['category'];

$file = $image['name'];
$filepath = $image['tmp_name'];
$fileerror = $image['error'];

if($fileerror == 0){
  $destfile ='upload/'.$file;
  move_uploaded_file($filepath,$destfile);
   $des = '/ezdocs/'.$destfile;

   $insertsql ="INSERT INTO `product` ( `product_name`,`product_price`,`product_qty`,`product_image`,`product_code`,`category`) 
   VALUES ( '$productname', '$productprice', '$productquantity', '$des', '$productcode', '$category')";

$query = mysqli_query($conn,$insertsql);
if($query){
  
  header("Location: addmedicine.php");
}
else{
  
}


  }
  else{
    
  }




}
else{

  
}








?>




<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <script src="bootstrap/js/bootstrap.min.js" ></script>

  <title>admindashboard</title>
  <link rel="stylesheet" href="addmedicine.css">


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

</head>

<body>

<!-- <header>
        <img src="" alt="">
        <nav>
            <ul class="nav_links">
                <li><a href="admin.php">Medicines</a></li>
                <li><a href="#">All Users</a></li>
                <li><a href="#">Tickets</a></li>
                <li><a href="#">All orders</a></li>
            </ul>
        </nav>
        <a class="cta" href="logout.php"><button>logout</button></a>
    </header> -->
    <div class="wrapper">
    <div class="sidebar">
        <h2>Welcome</h2>
        <h2>Admin</h2>
        <!-- -->
        <ul>
            <li><a href="allusers.php" style= " text-decoration: none;"> <i class="fas fa-users"></i>All Users</a></li>
            <li><a href="admin.php" style= " text-decoration: none;"> <i class="fas fa-capsules"></i>Medicine List</a></li>
            <li style= "background-color: #594f8d;"><a href="addmedicine.php" style= " text-decoration: none;"> <i class="fas fa-prescription-bottle-alt"></i>Add Medicine</a></li>
            <li><a href="adminorders.php" style= " text-decoration: none;"> <i class="fas fa-shopping-cart"></i>All Orders</a></li>
            <li><a href="delivered.php" style= " text-decoration: none;"><i class="fas fa-truck"></i>Delivired orders</a></li>
            <li><a href="admintickets.php" style= " text-decoration: none;"> <i class="fas fa-ticket-alt"></i>Tickets</a></li>
            <li><a href="adminsolvedtickets.php" style= " text-decoration: none;"><i class="far fa-check-circle"></i>  Sloved Tickets</a></li>
            
            <li><a href="logout.php" style= " text-decoration: none;"><!--<i class="fas fa-sign-out-alt"></i>  --> Logout</a></li>
        </ul> 
        <!-- <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </div>
    <div class="main_content">

  


    <div class= heading>
    <h1 class="mt-5 text-center">ADD MEDICINE</h1>
    
    </div>




    <form class="mx-5 w-50 h-25 p-3" action="addmedicine.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1"><h5>Product Name</h5></label>
    <input type="text" class="form-control" id="productname" name="productname" placeholder="Enter Product Name" autocomplete="off" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><h5>Product Price</h5></label>
    <input type="number" class="form-control" id="productprice" name="productprice" placeholder="ENter product price " min="0" required>
  </div>

  
  <div class="form-group">
    <label for="exampleFormControlFile1"><h5>Upload image</h5></label>
    <input type="file" class="form-control-file" id="image" name="image" required>
  </div>

  
  <div class="form-group">
    <label for="exampleInputEmail1"><h5>Product code</h5></label>
    <input type="text" class="form-control" id="productcode" name="productcode"  placeholder="Enter Product code" required>
    
  </div>

<div class="form-group">
<label for="image"><h5>Select Category<h5></label>
  <select class="form-control" id="category" name="category" required>
  <option value="eye">Eye</option>
  <option value="lungs">Lungs</option>
  <option value="hair">Hair</option>
  <option value="neuro">Neuro</option>
  <option value="cardiac">Cardiac</option>
  <option value="diabets">Diabets</option>

</select>
</div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
   


   </div>
<?php  
include 'footer.php';
?>
</body>

</html>