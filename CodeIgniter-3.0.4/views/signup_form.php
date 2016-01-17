<?php
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/15/16
 * Time: 7:07 PM
 */
?>

<?
if(isset($_SESSION["message"])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

echo "<br /><br /><br />";

if (isset($_POST['submit'])) {

$user="root";  //sets the username of the server to  variables
$pass="root";   //sets the password of the username to the variables
$dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8888', $user, $pass); //PDO set into var $dbh - query string links to server and we're given username and pw

if ($_SERVER['REQUEST_METHOD'] =='POST') {  // if the request method is a POST (it is)

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "<br /><br /><div id='msg'>The E-mail address you entered is invalid!</div><br />";
    } else {

        $_SESSION['message'] = "<br /><br /><div id='msg'>Registration Successful</div><br />";

        $dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8888', $user, $pass);
        #client name, phone number, email, website

        //process avatar photo for upload
        $tmp_file = $_FILES['profile']['tmp_name'];
//given a string containing the path to a file/directory,
//the basename function will return the trailing name component.
        $target_file = basename($_FILES['profile']['name']);
        $upload_dir = "uploads";
//move_uploaded_file will return false if $tmp_file is not a valid upload file
//or if it cannot be moved for any other reason



        $firstname = $_POST['firstname']; //get POST values from form - client's name
        $lastname = $_POST['lastname']; //get POST values from form - client's name
        $email = $_POST['email']; //get POST values from form - client's name
        $dob = $_POST['dob']; //get POST values from form - client's name
        $zip = $_POST['zip']; //get post values from form - client's phone number
        $username = $_POST['username']; //get post values from form - clients email address
        $password = $_POST['password']; //get post values from form - clients email address


        $stmt = $dbh->prepare("INSERT INTO login (firstname, lastname, email, dob, zip, username, password) VALUES (:firstname, :lastname, :email, :dob, :zip, :username :password);");  //prepare statement calling clients table and setting var for the different columns
        $stmt->bindParam(':firstname', $firstname); //sets binding paramater that binds sql data to php data - client's name
        $stmt->bindParam(':lastname', $lastname); //sets binding paramater that binds sql data to php data - client's phone number
        $stmt->bindParam(':email', $email); //sets binding paramater that binds sql data to php data - client's name
        $stmt->bindParam(':dob', $dob); //sets binding paramater that binds sql data to php data - client's phone number
        $stmt->bindParam(':zip', $zip); //sets binding paramater that binds sql data to php data - clients email address
        $stmt->bindParam(':username', $username); //sets binding paramater that binds sql data to php data - clients website
        $stmt->bindParam(':password', $password); //sets binding paramater that binds sql data to php data - clients website
        $stmt->bindParam(':profile', $target_file); //sets binding paramater that binds sql data to php data - clients website
        $stmt->execute();  //executes the code to transform sql to php


//echo "<br /><br /><a href='database_form.php'>Please try logging in Now!</a>";
//echo "</td></tr></table>";
        }
    } else {

    echo "Sorry, you must submit ALL registration field to proceed.<br /><br />";
    echo "<a href='signup_form.php'>Try Again?<br><br>";
}
}
?>


<html>
<head>
    <title>
Pantry Assistant
</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.css" type="text/css" rel="stylesheet" />

</head>
<body>


<div id="top"><img id="logotopleft" src="../images/pantry_assistant_logo.png"></div>


<form action="signup_form.php" id="signupform" method="post" novalidate="" enctype="multipart/form-data">

    <h2>Register for a PANTRY ASSISTANT account:</h2><br>

    <div id="field1-container" class="field f_100">
        <label>
            First Name
        </label>
        <input type="text" name="firstname" id="firstname" required="required">
    </div>


    <div id="field2-container" class="field f_100">
        <label>
            Last Name
        </label>
        <input type="text" name="lastname" id="lastname" required="required">
    </div>


    <div id="field9-container" class="field f_100">
        <label>
            Email Address
        </label>
        <input type="email" name="email" id="email" required="required">
    </div>


    <div id="field10-container" class="field f_100">
        <label>
            Date
        </label>
        <input type="date" id="dob" maxlength="524288" name="dob"
               required="" size="20" tabindex="0" title="">
    </div>


    <div id="field12-container" class="field f_100">
        <label>
            Zip Code
        </label>
        <input type="number" name="zip" id="zip" required="required">
    </div>


    <div id="field3-container" class="field f_100">
        <label>
            Create Username
        </label>
        <input type="text" name="username" id="username" required="required">
    </div>


    <div id="field13-container" class="field f_100">
        <label>
            Create Password
        </label>
        <input type="password" name="password" id="password" required="required">
    </div>


    <div id="field14-container" class="field f_100">
        <label>
            Confirm Password
        </label>
        <input type="password" name="confpassword" id="confpassword" required="required">
    </div>


    <div id="field15-container" class="field f_100">
        <label>
            Upload Profile Picture
        </label>
        <input type="file" name="profile" id="profile" required="required">
    </div>

    <br><br>

    <div id="form-submit" class="field f_100 clearfix submit">

    <a href="#" data-featherlight="#mylightbox"><input id="submit" type="submit" name="submit" value="submit"></a>

        <div id='mylightbox'>Registration Successful!<br><a href='Main.php'>Go to your homepage!</a></div>

    </div>






</form>

<script src="//code.jquery.com/jquery-latest.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
