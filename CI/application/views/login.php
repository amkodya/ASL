<?php session_start();
// Ashley M. Kodya
// Server Side Languages
// November 2015
// CRUD
// login.php

//check if user logged in
if(isset( $_SESSION['id'] )) {
    echo "Session status: user is already logged in<br> ";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MySQL & PHP - Ashley K.</title>

</head>
<body>
<?php

//setup DB username and password
$user = 'root';
$pass = 'root';
$salt = 'SuperSaltHash';

//establish PDO and DSN connection to database
$dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass);

//test if 1st form has the empty fields;
//if not, grab the username & password & bind to DB parameters
if ($_POST['username'] != null && $_POST['password'] != null) {

    //grab form input
    $usernameInput = $_POST['username'];
    $passwordInput = md5($_POST['password'] . $salt);

    //preapre the statement; find the record that matches the username and password
    $sth = $dbh->prepare('select id, username, password, profile from login where username = :username and password = :password');
    $sth->bindParam(':username', $usernameInput);
    $sth->bindParam(':password', $passwordInput);
    $sth->execute();
    $result = $sth->fetchAll();

    //if the result of the 1st array item contains a 'id',
    // lets the user know they have successfully logged in
    if (isset($result[0]['id'])) {


        //being session processor
        // grab results of earlier slect statement
        $user_id = $result[0]['id'];
        $avatarfile = $result[0]['profile'];



        //set the session user_id variable and others
        $_SESSION['id'] = $user_id;
        $_SESSION['username'] = $usernameInput;
        $_SESSION['password'] = $passwordInput;
        $_SESSION['profile'] = $avatarfile;
        echo 'Session Check: You are now logged in<br /><br />';

        //end session processor


        echo "Congratulations! You have successfully logged in. Enjoy :)<br/>";
        echo "<a href='logout.php'>Logout</a>&nbsp;|&nbsp;";
        echo "<a href='Main.php'>Dashboard</a>&nbsp;&nbsp;<br><br>";


        //use userid to look up username and profile photo
    /*    foreach ($result as $row) {

            //prepare bind execute and grab results to echo $row['userid']
            $sth = $dbh->prepare('select username, profile from login where id = :id');
            $sth->bindParam(':id', $row['id']);
            $sth->execute();
            $results = $sth->fetchAll();

            //optional analysis:
            // print_r($result[0]['username']);

            //store each row found in the $results
            echo "<p>";
            $userid = $row['id'];
            foreach ($result as $row) {
                $photo = $row['profile'];
                $username = $row['username'];
            };

            //echo put the profie photo and give user an option to logout
            if (!empty($photo)) {
                echo "<img src=\"uploads/" . $photo . "\" width=\"200\" class=\"right userPhoto\"/><br>";
            } else {
                echo "AVATAR STATUS: You did not provide an avatar photo during sign-up.";
            }

            echo "</p>";
            echo "<ul class=\"right userSection\">
            <li>Your User ID is: " . $userid . "</li>
            <li>Your username is: " . $username . "</li>
            </ul>";

        } //close out first for loop */

    } else {
        //else let user know that their login failed
        echo "So Sorry - Your Login Failed! <br>The Username or Password is incorrect. Please try again!<br>";
        echo "<a href='../index.php'>Try again?</a><br><br>";
    } //close out outer parent "if statement

}

?>




</body>
</html>