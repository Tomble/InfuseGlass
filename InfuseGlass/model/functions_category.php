<?php
//create a function to retrieve all categories
	function get_categories()
	{
		global $conn;
		//query the database to select all data from the category table
		$sql = 'SELECT * FROM category;';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result_category = $statement->fetchAll();
		$statement->closeCursor();
		return $result_category;
	}

	//create a function to retrieve a single category
	function get_category()
	{
		global $conn;
		//retrieve the categoryID from the URL
		$categoryID = $_GET['CategoryID'];
		$sql = 'SELECT * FROM category WHERE CategoryID = :categoryID';		
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':categoryID', $categoryID);
		$statement->execute();
		//use the fetch() method to retrieve a single row
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	}
	
?>