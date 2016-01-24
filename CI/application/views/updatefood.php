<?php session_start();
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/17/16
 * Time: 11:47 AM
 */

$user = "root"; //sets the username of the server to  variables
$pass = "root";   //sets the password of the username to the variables
$mysql = "mysql:host=localhost;dbname=PantryAssistant;port=8889";
$dbh = new PDO($mysql, $user, $pass);

if(isset($_GET['id'])){
    $foodid = $_GET['id'];     //grab requested client id +record where ID equal
    $stmt = $dbh->prepare('SELECT * FROM foods where foodid = :foodid');     //select all prepopulated all fields for updating
    $stmt->bindParam(":foodid", $foodid);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] =='POST') {  // if the request method is a POST (it is)
    if (isset($_POST['submit'])) {  //validate/filter the URL entered by User - execute update and retun to index.php PAGE


            $user = "root"; //sets the username of the server to  variables
            $pass = "root";   //sets the password of the username to the variables
            $mysql = "mysql:host=localhost;dbname=PantryAssistant;port=8889";
            $dbh = new PDO($mysql, $user, $pass);


            $stmt = $dbh->prepare('SELECT * FROM foods order by foodid ASC;');  // selects all information from clients table in sql server in order of ascending clientid's
            $stmt->execute();     //execute the previous code that has $stmt variable
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   //the result var is set which is the eviqualent of each line item in the sql server

            $_SESSION["message"] = "<br /><br /><br /><div id='msg'>Your update was successful!</div>";
            $foodid = $result[0]['foodid']; //set var to the result array to speicific line itm clientid
            $name = $_POST['name']; //get POST values from form - client's name
            $expiration = $_POST['expiration']; //get POST values from form - client's name
            $price = $_POST['price']; //get post values from form - clients email address
            $cal = $_POST['cal']; //get post values from form - clients website
            $fats = $_POST['fats']; //get POST values from form - client's name
            $protein = $_POST['protein']; //get POST values from form - client's name
            $quantity = $_POST['quantity']; //get POST values from form - client's name
            $category = $_POST['category']; //get POST values from form - client's name

            $stmt = $dbh->prepare("UPDATE foods SET name='".$name."', expiration='".$expiration."', price='".$price."', cal='".$cal."', fats='".$fats."', protein='".$protein."', quantity='".$quantity."', category='".$category."' where foodid='".$foodid."'");
            $stmt->bindParam(':foodid', $foodid);
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

}
?>


<div id="test">

    <form id="signupform" enctype="multipart/form-data" action="updatefood.php" method="post">  <!-- form that will post to fruits.php -->

        <h3>Enter Food Information Here:</h3>
        <label>Food Name:
            <input type="text" name="name" value="<?php echo $result[0]['name']; ?>" required/> <!-- client name input - it is required -->
        </label>
        <br/><br/><br/>
        <label>Expiration Date:
            <input type="date" name="expiration" value="<?php echo $result[0]['expiration']; ?>" required/> <!-- client phone input - it is required -->
        </label>
        <br/><br/><br/>
        <label>Price:
            <input type="text" name="price" value="<?php echo $result[0]['price']; ?>" required/> <!-- client email input - it is required -->
        </label>
        <br/><br/><br/>
        <label>Cal:
            <input type="text" name="cal" value="<?php echo $result[0]['cal']; ?>" required/> <!-- client website input - it is required -->
        </label>
        <br/><br/><br/>
        <label>Fats:
            <input type="text" name="fats" value="<?php echo $result[0]['fats']; ?>" required/> <!-- client website input - it is required -->
        </label>
        <br/><br/><br/>
        <label>Protein:
            <input type="text" name="protein" value="<?php echo $result[0]['protein']; ?>" required/> <!-- client website input - it is required -->
        </label>
        <br/><br/><br/>
        <label>Quantity:
            <input type="number" name="quantity" value="<?php echo $result[0]['quantity']; ?>" required/> <!-- client website input - it is required -->
        </label>
        <br/><br/><br/>
        <label>Category:
            <input type="text" name="category" value="<?php echo $result[0]['category']; ?>" required/> <!-- client website input - it is required -->
        </label>
        <br/><br/><br/>
        <input id="submit" type="submit" name="submit" value="Update" /> <!-- submit button  -->
    </form>

</div>
