<?php
function sanatise_input($input_string) {
	$input_string = trim($input_string);
	$input_string = htmlspecialchars($input_string, ENT_IGNORE, 'utf-8');
	$input_string = strip_tags($input_string);
	$input_string = stripslashes($input_string);
	return $input_string;
}

?>