<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Created by PhpStorm.
 * User: Ashley Kodya
 * Advanced Server Side Languages - January 2016
 * Date: 1/13/16
 * Time: 7:38 PM
 * PROJECT: PANTRY ASSISTANT
 * signup_view.php
 */

?> <!-- close PHP code -->
<html>
<head>
    <title>
        Pantry Assistant
    </title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron" style="background:#56FCE5 !important"><a href="../index.php"><img id="logotopleft" src="../../images/pantry_assistant_logo.png"></a></div>
<?php
// Display any form validation error messages
echo validation_errors();
// Using the form helper to help create the start of the form code
echo form_open("SignupForm");
?>
<form class="form-horizontal" id="signupform" action="signup_view.php" method="post" enctype="multipart/form-data">
<div class="container">
    <h2>Register for a PANTRY ASSISTANT account:</h2><br>

    <div class="form-group">
        <label>
                First Name
        </label>
        <input class="form-control" name="firstname" required>
    </div>
    <div class="form-group">
        <label>
                Last Name
        </label>
        <input class="form-control" type="text" name="lastname" required>
    </div>
    <div class="form-group">
        <label>
                Email Address
        </label>
        <input class="form-control" type="email" name="email" required>
    </div>
    <div class="form-group">
        <label>
                Birth Date
        </label>
        <input  class="form-control"type="date" name="dob" required>
    </div>
    <div class="form-group">
        <label>
                Zip Code
        </label>
        <input class="form-control" type="number" name="zip" required>
    </div>
    <div class="form-group">
        <label>
                Create Username
        </label>
        <input class="form-control" type="text" name="username" required>
    </div>
    <div class="form-group">
        <label>
                Create Password
        </label>
        <input class="form-control" type="password" name="password" required>
    </div>
    <div class="form-group">
        <label>
                Confirm Password
        </label>
        <input class="form-control" type="password" name="confpassword" required>
    </div>
    <div class="form-group">
        <label>
                Upload Profile Picture
        </label>
        <input class="form-control" type="file" name="profile" required>
    </div>
    <div id="form-submit">
        <button id="submit" type="submit" name="submit" value="submit" class="btn btn-warning">Submit</button>
        <!-- <div id='mylightbox'>Registration Successful!<br><a href='Main.php'>Go to your homepage!</a></div> -->
    </div>
</div>
</form>

<!-- <div id="bottom">
    <a href="application/views/Bio.php"><br>What is Pantry Assistant?</a>
    <!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
-->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


</body>
</html>


