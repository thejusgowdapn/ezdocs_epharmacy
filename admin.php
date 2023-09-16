<?php  
session_start();
if(!isset($_SESSION['adminname'])){
  header('location: login.php');
}
include 'dbconnect.php';

if(isset($_POST['sub'])){
$id = $_POST['id'];


$sql = "DELETE FROM `product` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);

if($result){
  header("Location: admin.php");
}
else{

}


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
            <li style= "background-color: #594f8d;"><a href="admin.php" style= " text-decoration: none;"> <i class="fas fa-capsules"></i>Medicine List</a></li>
            <li><a href="addmedicine.php" style= " text-decoration: none;"> <i class="fas fa-prescription-bottle-alt"></i>Add Medicine</a></li>
            <li><a href="adminorders.php" style= " text-decoration: none;"> <i class="fas fa-shopping-cart"></i>All Orders</a></li>
            <li><a href="delivered.php" style= " text-decoration: none;"><i class="fas fa-truck"></i>Delivired orders</a></li>
            <li><a href="admintickets.php" style= " text-decoration: none;"> <i class="fas fa-ticket-alt"></i>Tickets</a></li>
            <li><a href="adminsolvedtickets.php" style= " text-decoration: none;"><i class="far fa-check-circle"></i>  Sloved Tickets</a></li>
            
            <li><a href="logout.php" style= " text-decoration: none;"><!-- <i class="fas fa-sign-out-alt"></i> --> Logout</a></li>
        </ul> 
      <<!--   <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </div>
    <div class="main_content">
    








    <h1 class="text-center"> ALl Products  </h1>
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include 'dbconnect.php';
           

        



  			$stmt = $conn->prepare("SELECT * FROM product ");
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-6 col-lg-3  mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['product_image'] ?>" class="card-img-top" height="150">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
              <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>

            </div>
            <div class="card-footer p-1">
              <form action="admin.php" class="form-submit" method="post">
                
                <input type="hidden" class="pid" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                
                <button class="btn btn-danger btn-block addItemBtn" onclick="return confirm('Are you sure want to remove this item?');" name="sub"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>











    </div>

    <?php  
include 'footer.php';
?>
</body>

</html>