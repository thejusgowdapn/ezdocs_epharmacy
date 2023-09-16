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
<link rel="stylesheet" href="welcome.css" class="css">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <script src="bootstrap/js/bootstrap.min.js" ></script>

  <title>admindashboard</title>

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
            <li style= "background-color: #594f8d;"><a href="allusers.php" style= " text-decoration: none;"> <i class="fas fa-users"></i>All Users</a></li>
            <li><a href="admin.php" style= " text-decoration: none;"> <i class="fas fa-capsules"></i>Medicine List</a></li>
            <li><a href="addmedicine.php" style= " text-decoration: none;"> <i class="fas fa-prescription-bottle-alt"></i>Add Medicine</a></li>
            <li><a href="adminorders.php" style= " text-decoration: none;"> <i class="fas fa-shopping-cart"></i>All Orders</a></li>
            <li><a href="delivered.php" style= " text-decoration: none;"><i class="fas fa-truck"></i>Delivired orders</a></li>
            <li><a href="admintickets.php" style= " text-decoration: none;"> <i class="fas fa-ticket-alt"></i>Tickets</a></li>
            <li><a href="adminsolvedtickets.php" style= " text-decoration: none;"><i class="far fa-check-circle"></i>  Sloved Tickets</a></li>
            
            <li><a href="logout.php" style= " text-decoration: none;"><!--<i class="fas fa-sign-out-alt"></i> --> Logout</a></li>
        </ul>  
        <!-- <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </div>
    <div class="main_content">
<!-- 
    <?php  
// include 'header.php';
?> -->

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
              <label for="title">Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" >
            </div>
            <div class="form-group">
              <label for="title">Email</label>
              <input type="email" class="form-control" id="emailEdit" name="emailEdit">
            </div>
            <div class="form-group">
              <label for="title">user name</label>
              <input type="text" class="form-control" id="usernameEdit" name="usernameEdit" >
            </div>
            <div class="form-group">
              <label for="title">password</label>
              <input type="password" class="form-control" id="passwordEdit" name="passwordEdit" >
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
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
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
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">username</th>
          <th scope="col">password</th>
          
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `register`";
          $result = mysqli_query($conn, $sql);
          $slno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $slno = $slno + 1;
            echo "<tr>
            <th scope='row'>". $slno . "</th>
            <td>". $row['name'] . "</td>
            <td>". $row['email'] . "</td>
            <td>". $row['username'] . "</td>
            <td>". $row['password'] . "</td>
            
            <td> <button class='edit btn btn-sm btn-success' id=".$row['slno'].">Edit</button> <button class='delete btn btn-sm btn-danger' id=d".$row['slno'].">Delete</button>  </td>
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
  <script>
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

  </div>
  </div>
  <?php  
include 'footer.php';
?>
</body>

</html>
