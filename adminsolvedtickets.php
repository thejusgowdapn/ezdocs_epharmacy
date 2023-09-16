<?php  
session_start();
if(!isset($_SESSION['adminname'])){
  header('location: login.php');
}

include 'dbconnect.php';


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

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <title>admindashboard</title>
  <link rel="stylesheet" href="admin.css">

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

.update{

border-radius:10px;
padding: 5px;
background-color:yellow;

}
.update:hover{
  background-color: #f1f1f1;
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
            <li><a href="addmedicine.php" style= " text-decoration: none;"> <i class="fas fa-prescription-bottle-alt"></i>Add Medicine</a></li>
            <li><a href="adminorders.php" style= " text-decoration: none;"> <i class="fas fa-shopping-cart"></i>All Orders</a></li>
            <li><a href="delivered.php" style= " text-decoration: none;"><i class="fas fa-truck"></i>Delivired orders</a></li>
            <li><a href="admintickets.php" style= " text-decoration: none;"> <i class="fas fa-ticket-alt"></i>Tickets</a></li>
            <li style= "background-color: #594f8d;"><a href="adminsolvedtickets.php" style= " text-decoration: none;"><i class="far fa-check-circle"></i>  Sloved Tickets</a></li>
            
            <li><a href="logout.php" style= " text-decoration: none;"><!-- <i class="fas fa-sign-out-alt"></i> --> Logout</a></li>
        </ul> 
      <<!--   <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </div> 
    <div class="main_content">
    





    <h1 class="text-primary text-center mt-4 mb-3" >Solved Tickets</h1>




    <?php 
    
    $sql = "SELECT * FROM `tickets` where status = 'solved'  ";
    $result = mysqli_query($conn, $sql);
    
    
    while($row = mysqli_fetch_assoc($result)){
      
         echo '
        
        <div class="col-lg-12 ml-5 mb-5">
      <div class="card ml-5" style="width: 65rem;
      box-shadow: 2px 2px 26px 0px rgba(0,0,0,0.3);">
<div class="card-header"> 
<strong class="text-primary mr-4">Username:</strong> '.$row['username'].'
</div>
<ul class="list-group list-group-flush">
<li class="list-group-item">  <strong class="text-primary mr-3">Date:</strong> '.$row['date'].'            </li>
<li class="list-group-item"> <strong class="text-primary mr-1">Ticket Id:</strong> '.$row['id'].' </li>
<li class="list-group-item"> <strong class="text-primary mr-4">subject:</strong> '.$row['subject'].' </li>
<li class="list-group-item">  <strong class="text-primary mr-1">Status:</strong> <span class="text-danger">'.$row['status'].'  </span> </li>


</ul>
</div>
</div>  ';      
   
      
      
      
     
  } 
    ?>




<!-- msg start -->

<!-- mesg end -->
      <?php 
    
       










        ?>










    
    </div>

    <?php  
include 'footer.php';
?>
</body>

</html>