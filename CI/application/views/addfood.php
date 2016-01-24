<?php session_start();
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/16/16
 * Time: 10:11 PM
 */


$user="root";  //sets the username of the server to  variables
$pass="root";   //sets the password of the username to the variables
$dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass); //PDO set into var $dbh - query string links to server and we're given username and pw

if ($_SERVER['REQUEST_METHOD'] =='POST') {  // if the request method is a POST (it is)


$_SESSION['message'] = "<br /><br /><div id='msg'>Item Added Successfully</div><br />";
$dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass);
#client name, phone number, email, website

$name = $_POST['name']; //get POST values from form - client's name
$expiration = $_POST['expiration']; //get POST values from form - client's name
$price = $_POST['price']; //get post values from form - clients email address
$cal = $_POST['cal']; //get post values from form - clients website
$fats = $_POST['fats']; //get POST values from form - client's name
$protein = $_POST['protein']; //get POST values from form - client's name
$quantity = $_POST['quantity']; //get POST values from form - client's name
$category = $_POST['category']; //get POST values from form - client's name

$stmt = $dbh->prepare("INSERT INTO foods (name, expiration, price, cal, fats, protein, quantity, category) VALUES (:name, :expiration, :price, :cal, :fats, :protein, :quantity, :category);");  //prepare statement calling clients table and setting var for the different columns
$stmt->bindParam(':name', $name); //sets binding paramater that binds sql data to php data - client's name
$stmt->bindParam(':expiration', $expiration); //sets binding paramater that binds sql data to php data - client's phone number
$stmt->bindParam(':price', $price); //sets binding paramater that binds sql data to php data - clients email address
$stmt->bindParam(':cal', $cal); //sets binding paramater that binds sql data to php data - clients website
$stmt->bindParam(':fats', $fats); //sets binding paramater that binds sql data to php data - clients website
$stmt->bindParam(':protein', $protein); //sets binding paramater that binds sql data to php data - clients website
$stmt->bindParam(':quantity', $quantity); //sets binding paramater that binds sql data to php data - clients website
$stmt->bindParam(':category', $category); //sets binding paramater that binds sql data to php data - clients website
$stmt->execute();  //executes the code to transform sql to php
    header('Location: homepage.php'); //redirect us back to the index page
    die(); //used to exit the script - end of code

}
?>

<html>
<head>



</head>
<body>

<div id="test">

<form id="signupform" enctype="multipart/form-data" action="addfood.php" method="post">  <!-- form that will post to fruits.php -->

    <h3>Enter Food Information Here:</h3>
    <label>Food Name:
        <input type="text" name="name" required/> <!-- client name input - it is required -->
    </label>
    <br/><br/><br/>
    <label>Expiration Date:
        <input type="date" name="expiration" required/> <!-- client phone input - it is required -->
    </label>
    <br/><br/><br/>
    <label>Price:
        <input type="text" name="price" required/> <!-- client email input - it is required -->
    </label>
    <br/><br/><br/>
    <label>Cal:
        <input type="text" name="cal" required/> <!-- client website input - it is required -->
    </label>
    <br/><br/><br/>
    <label>Fats:
        <input type="text" name="fats" required/> <!-- client website input - it is required -->
    </label>
    <br/><br/><br/>
    <label>Protein:
        <input type="text" name="protein" required/> <!-- client website input - it is required -->
    </label>
    <br/><br/><br/>
    <label>Quantity:
        <input type="text" name="quantity" required/> <!-- client website input - it is required -->
    </label>
    <br/><br/><br/>
    <label>Category:
        <input type="text" name="category" required/> <!-- client website input - it is required -->
    </label>
    <br/><br/><br/>
    <input id="submit" type="submit" name="submit" value="Submit" /> <!-- submit button  -->
</form>

    </div>




</body>
</html>





