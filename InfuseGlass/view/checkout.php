<?PHP

if(isset($_POST['delete_from_cart'])) {
	del_from_cart($_POST['item_id']);
}

if(isset($_POST['add_to_cart'])) {
	add_to_cart($_POST['item_id'], $_POST['add_to_cart_qty']);
}

if(isset($_POST['cart_qty'])) {
	change_qty($_POST['item_id'], $_POST['cart_qty']);
}

if(isset($_GET['empty'])) {
	empty_cart();
}

//Retrieve header
require('../view/header.php');
//Retrieve functions_cart
require('../model/functions_cart.php');
require('../model/library.php');

?>

<!-- /div to close header from header.php include-->
</div> 
    <div id="wrapper">
        <div id="prodcuts" class="container">
            <div class="title">
                <h2>Welcome to your Checkout</h2>
            </div>
		<section id="cart">
		<div id="invoice">
        	<table id="cart_table">
            <thead>
                <tr>
                    <th class="product-remove">
                        &nbsp;
                    </th>
                    <th class="product-thumbnail">
                        &nbsp;
                    </th>
              
                    <th class="product-name">
                        Product Name
                    </th>
                    <th class="product-price">
                        Price
                    </th>
                    <th class="product-quantity">
                        Quantity
                    </th>
                    <th class="product-subtotal">
                        Total
                    </th>
                    <th class="update">
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cart_total = 0;
                // iterate through each item and print it to the screen (SELECT on product table may be necessary)
                foreach($_SESSION['cart'] as $item) {
                    if($item[1] > 0) {
                        $sql = "SELECT * FROM products WHERE productID = " . $item[0] . "";
                        $res = do_sql($sql);
                        $row = $res->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <td>
                        <form action="../controller/del_from_cart.php" method="post">
                        <input type="hidden" name="productID" value="<?php echo $item[0]?>">
                        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this product?')" class="remove">
                            <i class="fa fa-times"></i>
                        </button>
                        </form>
                    </td>
                    <td>
                        <?php
                        //if the photo field in the database is NULL or empty
                        if((is_null($row['productPhoto'])) || (empty($row['productPhoto'])))
                        {
                            //display the default photo
                            echo "<img height='50px' src='img/products/default.png'>";
                        }
                        else
                        {
                            //display the product photo
                            echo "<img height='50px' src='images/" . ($row['productPhoto']) . "'>";
                        }
                        ?>
                    </td>
                    <td><?php echo $row['productName'] ?></td>
                    <td><?php echo '$' . $row['prodcutPrice'] ?></td>
                    <td>
				
                    <form enctype="multipart/form-data" action="../controller/update_cart_price.php" method="post" class="cart">
                        <input type="hidden" name="productID" value="<?php echo $item[0]; ?>">
                        <select name="qty">
                            <?php
                                for($i = 1;$i<=10;$i++) {
                                    if($i == $item[1]) {
                                        echo '<option value="' . $i . '" selected>' . $i . '</option>';
                                    } else {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </td>
                    <td><?php $subtotal = $row['prodcutPrice'] * $item[1];
                        echo '$' . number_format($subtotal, 2, '.', ','); ?></td>
                    <td><button type="submit"name="update" id="update">Update</button></td>
                    </form>
                </tr>
                <?php
                        $cart_total += $subtotal;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <aside id="cart_options">
        <table id="order_info">
            <thead>
                <tr>
                    <th>Your Order</td>
                    <th>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Subtotal</td>
                    <td><?php echo '$' . number_format($cart_total, 2, '.', ','); ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><?php echo '$' . number_format($cart_total, 2, '.', ','); ?></td>
                </tr>
            </tbody>
        </table>
        <form action="../controller/empty_cart.php">
        <button name="empty" class="cart_option_a">Empty Cart</button>
        </form>
        <a href="ajax.php" name="continue" class="cart_option_a" id="continue_shop">Continue Shopping</a>
    </aside>
</section>
			
        </div>
    </div>
<div class="PHPlog">
	<?PHP 
	echo 'Usertype: ' . $_SESSION['usertype']; 
	echo '<br/>';
	echo 'Session ID: ' .session_id();
	echo '<br/>';
	//echo var_dump($_SESSION);
	?>
	</div>
</body>
</html>