<?php
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/24/16
 * Time: 2:05 PM
 */
$this->load->helper('form');
?>
<html>
<head>
    <title>Form Success</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
<div class="alert alert-success" role="alert">
    <h3>Your food was successfully submitted!</h3>

    <a class="alert-link" href="../index.php/crud">Add Another Item? </a>| <!-- submit button -->
    <a class="alert-link" href="../index.php/crud/home">Back to Main Page</a><br> <!-- submit button -->

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>