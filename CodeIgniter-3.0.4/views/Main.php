<?php session_start();
/**
 * Created by PhpStorm.
 * User: Ashley Kodya
 * Date: 1/14/16
 * Time: 11:06 AM
 * PROJECT: PANTRY ASSISTANT
 * Main.php
 */
?>

<?
if(isset($_SESSION["message"])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

echo "<br /><br /><br />";

$user="root";  //sets the username of the server to  variables
$pass="root";   //sets the password of the username to the variables
$dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8888', $user, $pass); //PDO set into var $dbh - query string links to server and we're given username and pw

?>

<html>
<head>
    <title>
        Pantry Assistant
    </title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>


<section id="top">
    <img id="logotopleft" src="../images/pantry_assistant_logo.png">
    <div id="topright"><p>Hello, Username!</p><br>
        <img id="smallpic" src="images/profile.jpg"><br>
        <a href="../index.php">Sign Out</a>
    </div>
</section>

<section id="mainbutts">
    <input id="submit" type="submit" name="submit" action="addfood.php" value="+ add grocery item"><br>
    <input id="submit" type="submit" name="submit" value="+ create grocery list"><br>
    <input id="submit" type="submit" name="submit" value="+ add nutrition sheet"><br>
</section>

<section id="expire">
    <h3>These items will be expiring soon</h3>
</section>

<section id="maincontent">
    <?php

    $stmt = $dbh->prepare('SELECT * FROM foods order by name ASC;');  // selects all information from clients table in sql server in order of ascending clientid's
    $stmt->execute();     //execute the previous code that has $stmt variable
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   //the result var is set which is the eviqualent of each line item in the sql server
    //The parameter means it will return an indexed array with each index containing an associative array of each row – do a var_dump($result); to see the array results
    //var_dump($result);

    ?>

    <div><table><tr id="firstrow"><td>Name</td><td>Exp Date</td><td>Price($)</td><td>Calories(cal)</td><td>Fats(g)</td><td>Protein(g)</td><td>Quantity</td><td></td></tr>

        <?php

    foreach  ($result as $row) {  //foreach loop that will itirate through all the results and set them as var row
        echo '<tr><td>' .$row['name']. '</td><td>' .$row['expiration']. '</td><td>' .$row['price']. '</td><td>' .$row['cal']. '</td><td>' .$row['fats']. '</td><td>' .$row['protein']. '</td><td>' .$row['quantity']. '</td><td><a href="updatefood.php?id='.$row['foodid'].'">Update</a><a href="deletefood.php?id='.$row['foodid'].'">Delete</a></td></tr>';
    } //echo out every instance of clientid and also display their name, phone#, email, website and forreach loop will not end unless there is no more data

    ?> <!-- close php code  -->

        </table></div>

</section>



<!--
<div id="bottom">
    <a href="bio.php"><br>What is Pantry Assistant?</a>
</div>
-->
</body>
</html>