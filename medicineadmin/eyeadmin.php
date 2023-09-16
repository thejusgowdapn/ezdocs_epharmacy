<?php  
session_start();
if(!isset($_SESSION['adminname'])){
  header('location: login.php');
}

// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;
$delete = false;
$recordinsert = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "ezdocs";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $slno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `register` WHERE `slno` = $slno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
    $slno = $_POST["snoEdit"];
    $name = $_POST["nameEdit"];
    $email = $_POST["emailEdit"];
    $username = $_POST["usernameEdit"];
    $password = $_POST["passwordEdit"];
    

  // Sql query to be executed
  $sql = "UPDATE `register` SET `name` = '$name' , `email` = '$email',`username` = '$username', `password` = '$password' WHERE `register`.`slno` = $slno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $token = bin2hex(random_bytes(15));

  // Sql query to be executed
  $sql ="INSERT INTO `register` ( `name`, `email`, `username`, `password`, `date`, `token`) VALUES ( '$name', '$email', '$username', '$password', current_timestamp(), '$token')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      $recordinsert = true;
  } 
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


 <!-- Edit Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/ezdocs/allusers.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">product Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" >
            </div>
            <div class="form-group">
              <label for="title">product price</label>
              <input type="text" class="form-control" id="emailEdit" name="emailEdit">
            </div>
            <div class="form-group">
              <label for="title">upload image</label>
              <input type="text" class="form-control" id="usernameEdit" name="usernameEdit" >
            </div>
            <div class="form-group">
              <label for="title">product code</label>
              <input type="text" class="form-control" id="passwordEdit" name="passwordEdit" >
            </div>
            
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> user account has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> user details has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($recordinsert){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>NO!</strong> user has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";

  }

  
  ?>

<!-- down edited -->

<!-- 
  <div class="container my-4">
    <h2>Add USERS</h2>
    <form action="/ezdocs/allusers.php" method="POST" autocomplete="off">
      <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
      </div>
      <div class="form-group">
        <label for="title">email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
      </div>
      <div class="form-group">
        <label for="title">username</label>
        <input type="file" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
      </div>
      <div class="form-group">
        <label for="title">password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" required>
      </div>
        
        

      
      <button type="submit" class="btn btn-primary">Add user</button>
    </form>
  </div>   -->
  <!-- up edited -->
  <h1 class="text-primary text-center mt-4" >All Users List</h1>

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">prodyct Image</th>
          <th scope="col">Product code</th>
          <th scope="col">Category</th>
          
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `product`";
          $result = mysqli_query($conn, $sql);
          $slno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $slno = $slno + 1;
            echo "<tr>
            <th scope='row'>". $slno . "</th>
            <td>". $row['product_name'] . "</td>
            <td>". $row['product_price'] . "</td>
            <td>". $row['product_image'] . "</td>
            <td>". $row['product_code'] . "</td>
            <td>". $row['category'] . "</td>
            
            <td>  <button class='delete btn btn-sm btn-danger' id=d".$row['id'].">Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>
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
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script >
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        name= tr.getElementsByTagName("td")[0].innerText;
        email= tr.getElementsByTagName("td")[1].innerText;
        username= tr.getElementsByTagName("td")[2].innerText;
        password= tr.getElementsByTagName("td")[3].innerText;
      
        console.log(name,email,username,password);
        nameEdit.value = name;
        emailEdit.value = email;
        usernameEdit.value = username;
        passwordEdit.value = password;
        
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        //changed here edit to delete
        console.log("delete ");
        slno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/ezdocs/allusers.php?delete=${slno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>

  

    <!-- end main -->
    </div> 



</div>

    
  
</body>
</html>