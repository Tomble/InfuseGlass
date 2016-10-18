<?PHP
//Retrieve header
require('../view/header.php');
//Retrieve functions_products
require('../model/functions_products.php');

require("../model/functions_category.php");

	//call the get_products() function
	$result = get_products_by_category();

	//call the get_category() function
	$result_cat_name = get_category();
	
?>
<!-- /div to close header from header.php include -->
</div>
    <div class="snapper">
		<?PHP require("categories.php");?>

		<div class="title">
        	<h2><?PHP echo $result_cat_name['CategoryLabel']; ?></h2>
        </div>
        <div id="products">
            <?php foreach($result as $row):?>
			<div class="product">
				<form method="post" action="../controller/add_to_cart.php">
					<?php
						//if the productPhoto field in the database is NULL or empty
						if((is_null($row['productPhoto'])) || (empty($row['productPhoto'])))
						{
							//display the default photo
							echo "<p><img src='images/default.jpg' width=200 height=200 alt='default photo' /></p>"; 
						}
						else
						{
							//display the product photo
							echo "<p><img src='images/" . ($row['productPhoto']) . "'" . ' width=350 height=300 alt="product photo"'  . "/></p>";
						}
					?>
				<div class="product_info">
					<h3 class="productName">
					<?php echo $row['productName']; ?>
					</h3>
					
					<p><?php echo $row['productDescription']; ?>
					</p>
					
					<div class="productPrice">
					<p><strong><?php echo "$" . (number_format($row['prodcutPrice'])); ?> each</strong>
					</p>
					</div>
					
					<div class="productAddCart">
					<select name="add_to_cart_qty" id="cartQTY">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
					<?php echo '<input type="hidden" name="item_id" value="' . $row['productID'] . '">'; ?>
					<input type="submit" id="addcart" name="add_to_cart" value="add to cart">
				</div>
					
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>