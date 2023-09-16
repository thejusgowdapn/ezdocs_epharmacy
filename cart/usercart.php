<?php
include '/ezdocs/dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
<link rel="stylesheet" href="cart.css">

</head>
<body class="container">
<h1 id="tit" class="text-center">EYe care MEdicine</h1>

<div class="row">
    
<?php 
$qu = " SELECT `name`, `image`, `price`, `discount`, `category` FROM `itemlist`  order by  id ASC  "; 
$fire = mysqli_query($conn,$qu);
$numb = mysqli_num_rows($fire);

if($numb > 0){
while($product = mysqli_fetch_array($fire)){
    ?>
     
<div class="col-lg-3 col-md-3 col-sm-12">

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

</div>
</body>
</html>