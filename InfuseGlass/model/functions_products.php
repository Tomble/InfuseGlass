<?php
	//create a function to retrieve all products
	function get_products()
	{
		global $conn;
		//query the database to select all data from the product table
		$sql = 'SELECT * FROM products ORDER BY productID ASC;';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}
	//create a function to retrieve all products in a specific category
	function get_products_by_category()
	{
		global $conn;
		//retrieve the categoryID from the URL
		$categoryID = $_GET['CategoryID'];
		//query the database to select all data from the product table
		$sql = 'SELECT * FROM products WHERE CategoryID = :categoryID ORDER BY productName';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':categoryID', $categoryID);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}


/*
	function add_to_cart($item, $qty) 
	{
// check to see if the item is already here if true increment qty
		if(isset($_SESSION['cart'])){
		//check existence of item
		$found = false;
		$loop = 0;
			foreach($_SESSION['cart'] as $item_list) {
				if($item_list[0] == $item) {
					$_SESSION['cart'] [$loop] [1]++;
					$found = truel
					break;
				}
				$loop++
			}
			
		}
		
		$_SESSION['cart'] = array($item, $qty);

	}

	function del_from_cart($item) {
		$loop = 0;
		$found = false;
		foreach($_SESSION['cart'] as $item_list {
// Search in array for item, then set it's qty to 0;
			if($item_list[0] == $item {
				$_SESSION['cart'][$loop][1] = 0;
				$found = true;
				break;
			}
			$loop++
		}
	}

	function change_item_qty_in_cart($item, $qty) {
	// Search in array for item then change it's qty

	}

	function buy_now() {
	// iterate through each item in cart and INSERT into invoice_items table (after creating invoice ID)

	}

	function show_cart() 
	{
// iterate through each item and print it to the screen (SELECT on product table may be necessary)
		foreach($_SESSION['cart'] as $item) {
			if($item[1] > 0) {
				echo $item[0] , ' ' , $item[1];
				echo '<a href="view/checkout.php?">'
			}
		}
	
	function empty_cart() 
		{
		unset($_SESSION['cart']);
		}
		*/
?>