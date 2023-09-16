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
            <li><a href="allusers.php"> <!-- <i class="fas fa-home"></i>-->All Users</a></li>
            <li><a href="/ezdocs/admin.php"> <!--  <i class="fas fa-user"></i> -->Medicine List</a></li>
            <li><a href="#"> <!--<i class="fas fa-address-card"></i>-->All Orders</a></li>
            <li><a href="#"><!--<i class="fas fa-project-diagram"></i>-->Delivired orders</a></li>
            <li><a href="#"> <!-- <i class="fas fa-blog"></i> -->Tickets</a></li>
            <li><a href="#"><!-- <i class="fas fa-address-book"></i> -->Sloved Tickets</a></li>
            <li><a href="#"><!-- <i class="fas fa-map-pin"></i> -->mails</a></li>
            <li><a href="logout.php"><!--<i class="fas fa-map-pin"></i> --> Logout</a></li>
        </ul> 
        <!-- <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </div>
    <div class="main_content">


    <!-- end main -->
    </div> 



</div>

    
  
</body>
</html>