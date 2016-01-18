<?php session_start();
/**
 * Created by PhpStorm.
 * User: Ashley Kodya
 * Advanced Server Side Languages - January 2016
 * Date: 1/13/16
 * Time: 7:38 PM
 * PROJECT: PANTRY ASSISTANT
 * Signup.php
 */
?>
<html>
<head>

</head>
<body>

<?php
if (isset($_POST['submit'])) { //if the form is not set - do nothing

    // check to see if username, password, avatr is null
    if ($_POST['password'] != null && $_POST['username'] != null) { //if username and password are set then do this:

        /* //read in all form field into an "assoc" array and return the array for processing output
         function makeArray() {    // makeArray() function to build array
             $firstname = $_POST['firstname']; //get POST values from form - first name
             $lastname = $_POST['lastname']; //get POST values from form - last name
             $email = $_POST['email']; //get POST values from form - email name
             $dob = $_POST['dob']; //get POST values from form - dob name
             $zip = $_POST['zip']; //get post values from form - zip phone number
             $salt = "SuperSaltHash";  // salt array to make Hashed password
             $username = $_POST['username']; //get POST values from form - username
             $password = md5($_POST['password'] . $salt); //make hashed password


             return array("FIRST NAME" => $firstname, "LAST NAME" => $lastname, "EMAIL" => $email, "DOB" => $dob, "ZIP" => $zip, "USER NAME" => $username, "Hashed PASSWORD" => $password);
         } //array that will show the info user just provided */

        echo "<h2>CONGRATULATIONS!</h2>Your membership account sign-up was successful!";
        echo "<table width=100% align=left border=0><tr><td>";

        // convert array into variable
        // $data = makeArray();


        //foreach for displaying array contetns created in makeArray function
        /* foreach ($data as $attribute => $data) {
            echo "<p align=left><font color = #ff4136>{$attribute}</font>: {$data}";
        } */


        $tmp_file = $_FILES['profile']['tmp_name']; //-- process avatar photo for upload -->
        //given a string containing the path to a file/directory,
        //the basename function will return the trailing name component.
        $target_file = basename($_FILES['profile']['name']);
        $upload_dir = "uploads"; //move_uploaded_file will return false if $tmp_file is not a valid upload file
        //or if it cannot be moved for any other reason

        /* echo "<br /><br />Registration successful!<br /><br />";
            echo "<img src='uploads/" .$target_file. "'>";
            // setup DB Username and password */

        $user = 'root'; // sets username in variable
        $pass = 'root'; // sets pw in variable
        $dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass); //establish PDO and DSN connection to database

        $salt = "SuperSaltHash"; //helps us create salt hash for password
        $firstname = $_POST['firstname']; //get POST values from form - first name
        $lastname = $_POST['lastname']; //get POST values from form - last name
        $email = $_POST['email']; //get POST values from form - email
        $dob = $_POST['dob']; //get POST values from form - dob
        $zip = $_POST['zip']; //get post values from form - zip code
        $username = $_POST['username']; // gets post values for username
        $password = md5($_POST['password'] . $salt); //gets post values for password Hashed

        //prepare statement for INSERT
        $stmt = $dbh->prepare("INSERT INTO login (firstname, lastname, email, dob, zip, username, password, profile) VALUES (:firstname, :lastname, :email, :dob, :zip, :username :password, :profile);");
        $stmt->bindParam(':firstname', $firstname); //sets binding paramater that binds sql data to php data - first name
        $stmt->bindParam(':lastname', $lastname); //sets binding paramater that binds sql data to php data - last name
        $stmt->bindParam(':email', $email); //sets binding paramater that binds sql data to php data - email
        $stmt->bindParam(':dob', $dob); //sets binding paramater that binds sql data to php data - dob
        $stmt->bindParam(':zip', $zip); //sets binding paramater that binds sql data to php data - zip code
        $stmt->bindParam(':username', $username); //sets binding paramater that binds sql data to php data - username
        $stmt->bindParam(':password', $password); //sets binding paramater that binds sql data to php data - password
        $stmt->bindParam(':profile', $target_file);
        $stmt->execute();

        echo "<br /><br /><a href='../index.php'>Please try logging in Now!</a>";


    } else { //if the forms are not complete you will see this:
        echo "Sorry, you must submit ALL registration field to proceed.<br /><br />"; //echo's error msg
        echo "<a href='signup_form.php'>Try Again?<br><br>"; // links back to signup page with error message
    } //closes if statement
}
?> <!-- close PHP code -->


</body>
</html>


