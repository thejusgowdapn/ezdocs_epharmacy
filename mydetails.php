
<?php

session_start();
include 'dbconnect.php';
$updated = false;
$notupdated =false;


if(!isset($_SESSION['username'])){
    header('location: login.php');
}

if(isset($_POST['serialno'])){
$slno = $_POST['serialno'];
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sqlup = "UPDATE `register` SET `name` = '$name', `email` = '$email', `username` = '$username', `password` = '$password' WHERE `register`.`slno` = $slno;";
if($conn -> query($sqlup)=== TRUE){
  $updated = true;
}
else{
  $notupdated = true;
}




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

.form{
  width:100%;
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
           
           <li><a href="welcome.php" style= " text-decoration: none;"><i class="fas fa-plus-square"></i>Medicine</a></li>
           <li><a href="cart/cart.php" style= " text-decoration: none;"><i class="fas fa-cart-plus"></i>My cart</a></li>
           <li><a href="myorders.php" style= " text-decoration: none;"><i class="fas fa-cart-arrow-down"></i>MY orders</a></li>
           <li><a href="createtickets.php" style= " text-decoration: none;"><i class="fas fa-paper-plane"></i>Create ticket</a></li>
           <li><a href="solvedtickets.php" style= " text-decoration: none;"><i class="fas fa-check"></i>My Tickets</a></li>
           <li><a href="faq.php" style= " text-decoration: none;"><i class="fas fa-question"></i> FAQ?</a></li>
           <li style= "background-color: #594f8d;"><a href="mydetails.php" style= " text-decoration: none;"><i class="fas fa-home"></i>My Details</a></li>
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

      <!-- message popup -->
      <?php
  if($updated){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong>  successfully edited your details
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
   ?>
    <?php
  if($notupdated){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>warning!</strong> your details are not updated
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <!-- message end -->

    <div class="heading">
        <h1>My Details</h1>
        <h3>Edit your Details Here</h3>
    </div>
    <!-- php -->
    <?php   
          $username1 = $_SESSION['username'];
       
        
         $query = "SELECT * FROm REgister WHERE username = '{$_SESSION['username']}'";
          $result_1 = mysqli_query($conn,$query);
          while($row = mysqli_fetch_array($result_1)){
            $slno = $row['slno'];
            $name = $row['name'];
            $email = $row['email'];
            $username = $row['username'];
            $password = $row['password'];
          }
    ?>

    <!-- php end -->
    <form action="/ezdocs/mydetails.php" method="post" class="form " style="width:50%;" autocomplete="off">

    <input type="hidden" name="serialno" id="snoEdit" value="<?php echo $slno; ?>">
   
    <div class="form-group">
    <label for="exampleInputname">Name</label>
    <input type="Name" class="form-control" id="exampleInputName" name="name" value="<?php echo $name; ?>" >
    
  </div>
    
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" value="<?php echo $email; ?>">
    
  </div>

  <div class="form-group">
    <label for="exampleInputname">User Name</label>
    <input type="Name" class="form-control" id="exampleInputName" name="username" value="<?php echo $username; ?>">
    
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $password; ?>">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" onclick="myFunction()" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <script>
                          function myFunction()
                           {
                              var x = document.getElementById("exampleInputPassword1");
                              if (x.type === "password") {
                                x.type = "text";
                                } else {
                                 x.type = "password";
                                     }
                              }
                              </script> -->

  <button type="submit" id="but" class="btn btn-primary">Update</button>

      

       </form>
       
       </div>



<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</div>


   
<?php  
include 'footer.php';
?>   
</body>
</html>

