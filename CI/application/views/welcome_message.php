<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>

<div id="top"></div>
<img id="logomain" src="images/pantry_assistant_logo.png">

<div id="loginform">
	<?php echo validation_errors(); ?>

	<?php echo form_open('loginform'); ?>

	<input class="form-control" type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="enter username"><br>
	<input  class="form-control"type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="enter password"><br>
	<button class="btn btn-warning" id="submit" type="submit">login</button>

	<a id="signuplink" href="index.php/signupform/index">Don't have an account? Sign up now</a>
</form>
</div>

<div id="bottom">
	<a href="application/views/Bio.php"><br>What is Pantry Assistant?</a>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</body>
</html>