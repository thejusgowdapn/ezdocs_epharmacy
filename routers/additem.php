<?php
include '/ezdocs/dbconnect.php';


if(isset($_POST['submit'])){
$productname = $_POST['productname'];
$productrrice = $_POST['productprice'];
$quantity = "1";
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$productcode = $_POST['productcode'];
$category = $_POST['category'];

$sql = "INSERT INTO product (product_name,product_price,product_qty,product_image,product_code,category)
 VALUES ('$productname', $productrrice,'$quantity','$image','$productcode','$category')";
$conn->query($sql);
header("location: ../addmedicine.php");


}
else{
    echo " not connected";

}

// $name = $_POST['name'];
// $price = $_POST['price'];
// $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
// $sql = "INSERT INTO items (name, price,image) VALUES ('$name', $price,'$image')";
// $con->query($sql);
// header("location: ../admin-page.php");
?>