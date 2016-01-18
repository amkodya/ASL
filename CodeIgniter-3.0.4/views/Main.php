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
$dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass); //PDO set into var $dbh - query string links to server and we're given username and pw

if ($_SERVER['REQUEST_METHOD'] =='POST') {  // if the request method is a POST (it is)

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "<br /><br /><div id='msg'>The E-mail address you entered is invalid!</div><br />";
    } else {

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
    }
}
?>

<html>
<head>
    <title>
        Pantry Assistant
    </title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />


    <script>

        $(".fancybox")
            .attr('rel', 'gallery')
            .fancybox({
                type: 'iframe',
                autoSize : false,
                beforeLoad : function() {
                    this.width  = parseInt(this.element.data('fancybox-width'));
                    this.height = parseInt(this.element.data('fancybox-height'));
                }
            });

    </script>
</head>
<body>

<section id="top">
    <img id="logotopleft" src="../images/pantry_assistant_logo.png">
    <div id="topright"><p>Hello, <?php echo $_SESSION['user_name']; ?>! </p><br>
        <img id="smallpic" src="../images/uploads/<?php echo $_SESSION['profile'] ?>.jpg"<br>
        <a href="../index.php">Sign Out</a>
    </div>
</section>

<section id="mainbutts">
    <a class="fancybox" href="addfood.php" data-fancybox-width="500" data-fancybox-height="200">
        <input id="submit" type="submit" name="submit" value="+ add grocery item"></a><br>

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

    <table><tr id="firstrow"><td>Name</td><td>Exp Date</td><td>Price($)</td><td>Calories(cal)</td><td>Fats(g)</td><td>Protein(g)</td><td>Quantity</td><td></td><td></td></tr>

        <?php

    foreach  ($result as $row) {  //foreach loop that will itirate through all the results and set them as var row
        echo '<tr><td>' .$row['name']. '</td><td>' .$row['expiration']. '</td><td>' .$row['price']. '</td><td>' .$row['cal']. '</td><td>' .$row['fats']. '</td><td>' .$row['protein']. '</td><td>' .$row['quantity']. '</td><td><a class="effect" href="updatefood.php?id='.$row['foodid'].'"><img class="image" id="icon" src="../images/gear.png" /><img class="image hover" id="icon" src="../images/gearhover.png" /></a></td><td><a class="effect" href="deletefood.php?id='.$row['foodid'].'"><img class="image" id="icon" src="../images/delete.png" /><img class="image hover" id="icon" src="../images/deletehover.png" /></a></td></tr>';
    } //echo out every instance of clientid and also display their name, phone#, email, website and forreach loop will not end unless there is no more data

    ?> <!-- close php code  -->

        </table>

</section>



<!--
<div id="bottom">
    <a href="bio.php"><br>What is Pantry Assistant?</a>
</div>
-->

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>


</body>
</html>