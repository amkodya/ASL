<?php session_start();
/**
 * Created by PhpStorm.
 * User: Ashley M. Kodya
 * Date: 1/17/16
 * Time: 11:48 AM
 */

$_SESSION['message'] = "<div id='msg'>Your delete was successful!</div>";

$user = "root"; //sets the username of the server to  variables
$pass = "root";   //sets the password of the username to the variables
$dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass); //PDO set into var $dbh - query string links to server and we're given username and pw
$foodid = $_GET['id']; //var clientid is set to the information from form where clientid is the name
$stmt = $dbh->prepare('DELETE FROM foods where foodid = :foodid'); //prepare statement to delete line from clients table that was clicked in the table
$stmt->bindParam(':foodid', $foodid);   //binds the data from clientid in clients table to $clientid var
$stmt->execute(); //execute the stmt variable that was set by prev lines of code - will bind data from sql to php
header('Location: homepage.php'); //redirect us back to the index page
die(); //used to exit the script - end of code

?> <!-- close php -->
