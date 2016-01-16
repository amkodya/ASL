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
if ($_POST['password'] != null && $_POST['user'] != null) {

//read in all form field into an "assoc" array and return the array for processing output
function makeArray() {
    $salt = "SuperSaltHash";
    $epass = md5($_POST['password'] . $salt);
    $euser = $_POST['user'];

    return array("USER NAME" => $euser, "Hashed PASSWORD with Dash of Salt" => $epass);
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
    $tmp_file = $_FILES['avatarfile']['tmp_name'];
    //given a string containing the path to a file/directory,
    //the basename function will return the trailing name component.
    $target_file = basename($_FILES['avatarfile']['name']);
    $upload_dir = "uploads";
    //move_uploaded_file will return false if $tmp_file is not a valid upload file
    //or if it cannot be moved for any other reason
    if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
        echo "<br /><br />File Uploaded Successfully<br /><br />";
        echo "<br /><br />Your Avatar Photo: " . $target_file ;
        echo "<br /><br /><img src='" . $upload_dir . "/" . $target_file . "' width='200'/>";
    } else {
        echo "<br /><br />AVATAR: No photo was uploaded.";
    }
    echo "<br /><br /><a href='signup_form.php'>Please try logging in Now!</a>";
    echo "</td></tr></table>";

    // setup DB Username and password

    $user = 'root';
    $pass = 'root';

    //establish PDO and DSN connection to database
    $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8888', $user, $pass);

    $salt = "SuperFIASaltHash";
    $epass = md5($_POST['password'] . $salt);
    $euser = $_POST['user'];

    //prepare statement for INSERT
    $stmt = $dbh->prepare("Insert into login (firstname, lastname, email, dob, zip, username, password, profile) values(:firstname, :lastname, :email, :dob, :zip, :username :password, :profile)");
    $stmt->bindParam(':username', $euser);
    $stmt->bindParam(':password', $epass);
    $stmt->bindParam(':avatar', $target_file);
    $stmt->execute();

} else {
    echo "Sorry, you must submit ALL registration fields to proceed.<br /><br />";
    echo "<a href='signup_form.php'>Try Again?<br><br>";
}
}
?>


</body>
</html>



