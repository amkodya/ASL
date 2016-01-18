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
if(isset($_SESSION["message"])) {   //checks if session msg is set
    echo ($_SESSION['message']);    //echo session msg if session message is set
    unset($_SESSION['message']);    //unse the message so it will disappear upon refresh/revisit
}

echo "<br /><br /><br />";  //puts space between session message and next content

$user="root";  //sets the username of the server to  variables
$pass="root";   //sets the password of the username to the variables
$dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass); //PDO set into var $dbh - query string links to server and we're given username and pw

if ($_SERVER['REQUEST_METHOD'] =='POST') {  // if the request method is a POST (it is)


        $_SESSION['message'] = "<br /><br /><div id='msg'>Item Added Successfully</div><br />"; //sets session message
        $dbh = new PDO('mysql:host=localhost;dbname=PantryAssistant;port=8889', $user, $pass); //gains access to server + table

        $name = $_POST['name']; //get POST values from form - food name
        $expiration = $_POST['expiration']; //get POST values from form - expiration date
        $price = $_POST['price']; //get post values from form - price for food item
        $cal = $_POST['cal']; //get post values from form - calories of food
        $fats = $_POST['fats']; //get POST values from form - fat content of food
        $protein = $_POST['protein']; //get POST values from form - protein content of food
        $quantity = $_POST['quantity']; //get POST values from form - quantity of food item
        $category = $_POST['category']; //get POST values from form - category of food item

        $stmt = $dbh->prepare("INSERT INTO foods (name, expiration, price, cal, fats, protein, quantity, category) VALUES (:name, :expiration, :price, :cal, :fats, :protein, :quantity, :category);");  //prepare statement calling foods table and setting var for the different columns
        $stmt->bindParam(':name', $name); //sets binding paramater that binds sql data to php data - food name
        $stmt->bindParam(':expiration', $expiration); //sets binding paramater that binds sql data to php data - expiration date of food
        $stmt->bindParam(':price', $price); //sets binding paramater that binds sql data to php data - price of food
        $stmt->bindParam(':cal', $cal); //sets binding paramater that binds sql data to php data - calories of food
        $stmt->bindParam(':fats', $fats); //sets binding paramater that binds sql data to php data - fat content of food
        $stmt->bindParam(':protein', $protein); //sets binding paramater that binds sql data to php data - protein content of food
        $stmt->bindParam(':quantity', $quantity); //sets binding paramater that binds sql data to php data - quantity of food
        $stmt->bindParam(':category', $category); //sets binding paramater that binds sql data to php data - category of food
        $stmt->execute();  //executes the code to transform sql to php
}
?>

<!-- START OF MAIN.PHP HTML -->
<html>
<head>
    <title>Pantry Assistant</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />


   <!-- <script>

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

    </script> --->
</head>
<body>

    <section id="top"> <!-- blue section at the top -->
        <img id="logotopleft" src="../images/pantry_assistant_logo.png"> <!-- link to image of logo -->
        <div id="topright"><p>Hello, <?php echo $_SESSION['username']; ?>! </p><br> <!-- dyanmic info appears at the top - username -->
            <img id="smallpic" src="uploads/<?php echo $_SESSION['profile']; ?>.jpg"><br> <!-- small icon pic -->
            <a href="../index.php">Sign Out</a> <!--option to sign out -->
        </div> <!-- close topright div -->
    </section> <!-- close top section-->

    <section id="mainbutts"> <!--main buttons (add item, make grocery list, nutrition list -->
        <a class="fancybox" href="addfood.php" data-fancybox-width="500" data-fancybox-height="200"> <!-- link to addfood form -->
        <input id="submit" type="submit" name="submit" value="+ add grocery item"></a><br> <!-- submit button -->

        <input id="submit" type="submit" name="submit" value="+ create grocery list"><br> <!-- submit button -->
        <input id="submit" type="submit" name="submit" value="+ add nutrition sheet"><br> <!-- submit button -->
    </section>

    <section id="expire"> <!-- expiring soon box -->
    <h3>These items will be expiring soon</h3>
    </section> <!-- end expiring soon -->

    <section id="maincontent"> <!-- maincontent section - all food items go here -->

    <?php
    $stmt = $dbh->prepare('SELECT * FROM foods order by name ASC;');  // selects all information from foods table in sql server in order of ascending id's
    $stmt->execute();     //execute the previous code that has $stmt variable
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   //the result var is set which is the eviqualent of each line item in the sql server
    //The parameter means it will return an indexed array with each index containing an associative array of each row – do a var_dump($result); to see the array results
    //var_dump($result);
    ?>

    <!-- Start table to list dynamic food items from table-->
    <table><tr id="firstrow"><td>Name</td><td>Exp Date</td><td>Price($)</td><td>Calories(cal)</td><td>Fats(g)</td><td>Protein(g)</td><td>Quantity</td><td></td><td></td></tr>

        <!-- dynamic array that will itirate all sql data -->
        <?php
            foreach  ($result as $row) {  //foreach loop that will itirate through all the results and set them as var row
            echo '<tr><td>' .$row['name']. '</td><td>' .$row['expiration']. '</td><td>' .$row['price']. '</td><td>' .$row['cal']. '</td><td>' .$row['fats']. '</td><td>' .$row['protein']. '</td><td>' .$row['quantity']. '</td><td><a class="effect" href="updatefood.php?id='.$row['foodid'].'"><img class="image" id="icon" src="../images/gear.png" /><img class="image hover" id="icon" src="../images/gearhover.png" /></a></td><td><a class="effect" href="deletefood.php?id='.$row['foodid'].'"><img class="image" id="icon" src="../images/delete.png" /><img class="image hover" id="icon" src="../images/deletehover.png" /></a></td></tr>';
            } //echo out every row until there is no more data
        ?> <!-- close php code  -->

        </table> <!-- close dynamic food section-->

    </section> <!-- close maincontent section-->



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