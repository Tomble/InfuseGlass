<?php
	function login($username, $password)
	{
		global $conn;
		$sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password', $password);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();	
		return $count;
    }

	function user_message()
	{
		//display a user message if there is an error
		if(isset($_SESSION['error']))
		{ 
			echo '<div class="error">';
			echo '<h2>' . $_SESSION['error'] . '</h2>'; 
			echo '</div>';
			unset($_SESSION['error']);
		}
		//display a user message if action is successful
		elseif(isset($_SESSION['success']))
		{
			echo '<div class="success">';
			echo '<h2>' . $_SESSION['success'] . '</h2>'; 
			echo '</div>';
			unset($_SESSION['success']);
		}
	}
?>