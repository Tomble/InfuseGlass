<?php
//Call the get_category() function
$result_category = get_categories();

?>
    <div class="categories">
        	<h2>Sort-By Categories</h2>
		<div id="cat_but">
        <?php foreach($result_category as $row): ?>
        <a href = "products_category.php?CategoryID=<?php echo $row['CategoryID'];?>"><?php echo $row['CategoryLabel']?></a>
        <?php endforeach; ?>
		<a href="products.php" class="fa fa-shopping-cart fa-4x"> </a>
		</div>
    </div>