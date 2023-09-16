<?php
	session_start();
	require 'config.php';
	if(!isset($_SESSION['username'])){
		header('location: login.php');
	}

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;
	  $puname = $_SESSION['username'];

	  $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=? AND username = '{$_SESSION['username']}'  ");
	  $stmt->bind_param('s',$pcode);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_code'] ?? '';

	  if (!$code) {
	    $query = $conn->prepare('INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code,username) VALUES (?,?,?,?,?,?,?)');
	    $query->bind_param('sssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pcode,$puname);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
	 
//  testing code start

// $exictsql = " SELECT product_code FROM cart WHERE username = '{$_SESSION['username']}'  ";
// $result = mysqli_query($conn,$exictsql);
// $numExistRows = mysqli_num_rows($result);
// if($numExistRows > 0 )
// {
// 	echo '<div class="alert alert-danger alert-dismissible mt-2">
// 						  <button type="button" class="close" data-dismiss="alert">&times;</button>
// 					  <strong>Item already added to your cart!</strong>
// 	 					</div>';
// }
// else{

// 	$query = $conn->prepare('INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code,username) VALUES (?,?,?,?,?,?,?)');
// 	     $query->bind_param('sssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pcode,$puname);
// 	    $query->execute();

// 	    echo '<div class="alert alert-success alert-dismissible mt-2">
// 						  <button type="button" class="close" data-dismiss="alert">&times;</button>
// 						  <strong>Item added to your cart!</strong>
// 						</div>';

// }


// testing end 




}



	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $conn->prepare('SELECT * FROM cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $conn->prepare("DELETE FROM cart WHERE id=? AND username = '{$_SESSION['username']}' ");
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare("DELETE FROM cart where  username = '{$_SESSION['username']}' ");
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];
	  $status = "yet to be delevired";
	  
	  $username = $_SESSION['username'];

	  $data = '';

	  $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid,status,username)VALUES(?,?,?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total,$status,$username);
	  $stmt->execute();
	  $stmt2 = $conn->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;
	}
?>
