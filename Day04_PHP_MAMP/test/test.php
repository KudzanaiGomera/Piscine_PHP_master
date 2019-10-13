<?php
if(isset($_POST['name'], $_POST['password'])) {
	$name = htmlentinties($_POST['name'], ENT_QUOTES, 'UFT-8');
	$password= (int)$POST['password'];

	echo "You are {$name} and you are {$age} years old,";
}
?>

<form action= "test.php"method= "get">
	<input type= "text" name= "name" placeholder= "Username">
	<input type= "text" name= "password" placeholder= "Password">
	<input type= "submit">
</form>
