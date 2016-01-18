<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>


<div id="top"></div>
<img id="logomain" src="images/pantry_assistant_logo.png">

<form id="loginform" action="views/login.php" method="POST" enctype="multipart/form-data">
	<input type="text" name="username" placeholder="enter username"><br><br>
	<input type="password" name="password" placeholder="enter password"><br><br>
	<input id="submit" type="submit" name="submit" value="submit">

	<a href="views/signup_form.php">Don't have an account? Sign up now</a>
</form>

<div id="bottom">
	<a href="views/Bio.php"><br>What is Pantry Assistant?</a>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>



</body>
</html>