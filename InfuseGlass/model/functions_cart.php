<?PHP
//Cart functions - MODEL

//Function to add an item to cart with quantity
function add_to_cart($item, $qty) {
	// check to see if the item is already here if true increment qty
	if(isset($_SESSION['cart'])) {
		// check for the existence of the item:
		$found = false;
		$loop = 0;
		foreach($_SESSION['cart'] as $item_list) {
			if($item_list[0] == $item) {
				$_SESSION['cart'][$loop][1] = $_SESSION['cart'][$loop][1] + $qty;
				$found = true;
				break;
			}
			$loop++;
		}
		if($found == false) {
			$_SESSION['cart'][] = array($item, $qty);
		}
	} else {
		$_SESSION['cart'][0] = array($item, $qty);
	}
   header('location: ../view/checkout.php');
//print_r($_SESSION['cart']);
}

function change_qty($item, $qty) {
	$found = false;
	$loop = 0;
	foreach($_SESSION['cart'] as $item_list) {
		if($item_list[0] == $item) {
			$_SESSION['cart'][$loop][1] = $qty;
			$found = true;
			break;
		}
		$loop++;
	}
    header('location: ../view/checkout.php');
}

//Empty
function empty_cart() {
  	unset($_SESSION['cart']);
    header('location: ../view/home.php');
}
//Delete
function del_from_cart($item) {
	$loop = 0;
	$found = false;
	foreach($_SESSION['cart'] as $item_list) {
   	// Search in array for item, then set it's qty to 0;
		if($item_list[0] == $item) {
			$_SESSION['cart'][$loop][1] = 0;
			$found = true;
			break;
		}
		$loop++;
	}
    header('location: ../view/checkout.php');
}
//Show Cart
function show_cart() {
   	// iterate through each item and print it to the screen (SELECT on product table may be necessary)
	foreach($_SESSION['cart'] as $item) {
		if($item[1] > 0) {
			echo '<form method="post" action="student_cart.php">';

			echo get_product_detail($item[0]);
	
			echo '<select name="cart_qty" onChange="this.form.submit();">';
			for($i = 0;$i<100;$i++) {
				if($i == $item[1]) {
					echo '<option value="' . $i . '" selected>' . $i . '</option>';
				} else {
					echo '<option value="' . $i . '">' . $i . '</option>';
				}
			}
			echo '</select>';
			echo '<input type="hidden" name="item_id" value="' . $item[0] . '">';
			echo '</form>';
			
			echo '<form method="post" action="student_cart.php">';
			echo '<input type="hidden" name="item_id" value="' . $item[0] . '">';
			echo '<input type="submit" name="delete_from_cart" value="delete">';
			echo '</form>';
		}
	}
 	echo '<p><a href="../controller/empty_cart.php?empty=true">Empty Cart</a></p>';
}
//Get product details
function get_product_detail($prod_id) {
	global $conn;
	// SELECT all items available to add to cart and have an 'add to cart' button
	$sql = "SELECT productName from prodcuts WHERE productID = " . $prod_id;
	$prod_conn = $conn->prepare($sql);
   	$prod_conn->execute();
  	$result = $prod_conn->fetch();

	return $result['productName'];
}
?>