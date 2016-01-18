<?php
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
//if the form is not set - do nothing
if (isset($_POST['submit'])) {

    //check to see if username, password, avatr is null
    if ($_POST['password'] != null && $_POST['username'] != null) {

        //read in all form field into an "assoc" array and return the array for processing output
        function makeArray() {
            $salt = "SuperSaltHash";
            $epass = md5($_POST['password'] . $salt);
            $euser = $_POST['username'];
            $firstname = $_POST['firstname']; //get POST values from form - client's name
            $lastname = $_POST['lastname']; //get POST values from form - client's name
            $email = $_POST['email']; //get POST values from form - client's name
            $dob = $_POST['dob']; //get POST values from form - client's name
            $zip = $_POST['zip']; //get post values from form - client's phone number


            return array("FIRST NAME" => $firstname, "LAST NAME" => $lastname, "EMAIL" => $email, "DOB" => $dob, "ZIP" => $zip, "USER NAME" => $euser, "Hashed PASSWORD with Dash of Salt" => $epass);
        }

        echo "<h2>CONGRATULATIONS!</h2>Your membership account sign-up was successful!";
        echo "<table width=100% align=left border=0><tr><td>";

        // convert array into variable
        $data = makeArray();



        //foreach for displaying array contetns created in makeArray function
        foreach ($data as $attribute => $data) {
            echo "<p align=left><font color = #ff4136>{$attribute}</font>: {$data}";
        }

        //process avatar photo for upload
        $tmp_file = $_FILES['profile']['tmp_name'];
        //given a string containing the path to a file/directory,
        //the basename function will return the trailing name component.
        $target_file = basename($_FILES['profile']['name']);
        $upload_dir = "uploads";
        //move_uploaded_file will return false if $tmp_file is not a valid upload file
        //or if it cannot be moved for any other reason
        if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
            echo "<br /><br />File Uploaded Successfully<br /><br />";
            echo "<br /><br />Registration successful!<br /><br />";

            // setup DB Username and password

            $user = 'root';
            $pass = 'root';

            //establish PDO and DSN connection to database
            $dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass);

            $salt = "SuperSaltHash";
            $epass = md5($_POST['password'] . $salt);
            $euser = $_POST['username'];
            $firstname = $_POST['firstname']; //get POST values from form - client's name
            $lastname = $_POST['lastname']; //get POST values from form - client's name
            $email = $_POST['email']; //get POST values from form - client's name
            $dob = $_POST['dob']; //get POST values from form - client's name
            $zip = $_POST['zip']; //get post values from form - client's phone number

            //prepare statement for INSERT
            $stmt = $dbh->prepare("INSERT INTO login (firstname, lastname, email, dob, zip, username, password, profile) VALUES (:firstname, :lastname, :email, :dob, :zip, :username :password, :profile);");
            $stmt->bindParam(':firstname', $firstname); //sets binding paramater that binds sql data to php data - client's name
            $stmt->bindParam(':lastname', $lastname); //sets binding paramater that binds sql data to php data - client's phone number
            $stmt->bindParam(':email', $email); //sets binding paramater that binds sql data to php data - client's name
            $stmt->bindParam(':dob', $dob); //sets binding paramater that binds sql data to php data - client's phone number
            $stmt->bindParam(':zip', $zip); //sets binding paramater that binds sql data to php data - clients email address
            $stmt->bindParam(':username', $euser);
            $stmt->bindParam(':password', $epass);
            $stmt->bindParam(':profile', $target_file);
            $stmt->execute();

        } else {
            echo "<br /><br />AVATAR: No photo was uploaded. Please Try Again!";
        }
        echo "<br /><br /><a href='../index.php'>Please try logging in Now!</a>";
        echo "</td></tr></table>";



    } else {
        echo "Sorry, you must submit ALL registration field to proceed.<br /><br />";
        echo "<a href='../index.php'>Try Again?<br><br>";
    }
}
?>


</body>
</html>


