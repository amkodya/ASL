<?php
/**
 * Created by PhpStorm.
 * User: Ashley Kodya
 * Date: 1/14/16
 * Time: 11:06 AM
 * PROJECT: PANTRY ASSISTANT
 * homepage.php
 */

$this->load->helper('form');
?>

<!-- START OF MAIN.PHP HTML -->
<html>
<head>
    <title>Pantry Assistant</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>

    <div class="jumbotron" style="background:#56FCE5 !important"> <!-- blue section at the top -->

        <img id="logotopleft" src="../images/pantry_assistant_logo.png"> <!-- link to image of logo -->
        <div id="topright"><p>Hello, <?php echo $_SESSION['username']; ?>! </p> <!-- dyanmic info appears at the top - username -->
            <img id="smallpic" src="uploads/<?php echo $_SESSION['profile']; ?>"><br> <!-- small icon pic -->
            <a href="../index.php">Sign Out</a> <!--option to sign out -->
        </div> <!-- close topright div -->
    </div> <!-- close top section-->

    <section id="mainbuttons"> <!--main buttons (add item, make grocery list, nutrition list -->

        <button type="button" href="addfood.php" class="btn btn-warning btn-lg btn-block">+ add grocery item</button><br> <!-- submit button -->
        <button type="button" href="addfood.php" class="btn btn-warning btn-lg btn-block">+ create grocery list</button><br> <!-- submit button -->
        <button type="button" href="addfood.php" class="btn btn-warning btn-lg btn-block">+ add nutrition sheet</button><br> <!-- submit button -->
    </section>

    <section class="well well-lg"> <!-- expiring soon box -->
    <h3>These items will be expiring soon</h3>

        <table colspan="3">

            <!-- dynamic array that will itirate all sql data -->
           <!--

            foreach  ($result as $row) {  //foreach loop that will itirate through all the results and set them as var row
                echo '<tr><td><p style="text-transform:capitalize;">' .$row['name']. '</p></td><td> ...................................... </td><td>' .$row['expiration']. '</td></tr>';
            } //echo out every row until there is no more data
            ?> <!-- close php code  -->

        </table> <!-- close dynamic food section-->
    </section> <!-- end expiring soon -->

    <section id="maincontent"> <!-- maincontent section - all food items go here -->

        <ul class="nav nav-pills nav-stacked nav-warning""><h3>Pick a Category</h3>
            <li role="presentation" class="active"><a href="#">fruits</a></li>
            <li role="presentation"><a href="#">vegetables</a></li>
            <li role="presentation"><a href="#">pantry</a></li>
            <li role="presentation"><a href="#">refrigerator</a></li>
            <li role="presentation"><a href="#">freezer</a></li>
            <li role="presentation"><a href="#">misc</a></li>
        </ul>

    <!-- Start table to list dynamic food items from table-->
    <table class="table table-hover" id="maintab"><tr id="firstrow"><td>Name</td><td>Exp Date</td><td>Price($)</td><td>Calories(cal)</td><td>Fats(g)</td><td>Protein(g)</td><td>Quantity</td><td></td><td></td></tr>

        <!-- dynamic array that will itirate all sql data
          foreach  ($result as $row) {  //foreach loop that will itirate through all the results and set them as var row
             } //echo out every row until there is no more data
        <?php if (isset($foods)): foreach ($foods as $f): ?>

         <?php echo '<tr><td>' .$f['name']. '</td><td>' .$f['expiration']. '</td><td>' .$f['price']. '</td><td>' .$f['cal']. '</td><td>' .$f['fats']. '</td><td>' .$f['protein']. '</td><td>' .$f['quantity']. '</td><td><a class="glyphicon glyphicon-cog" href="updatefood.php?id='.$row['foodid'].'"></a></td><td><a class="glyphicon glyphicon-trash" href="deletefood.php?id='.$row['foodid'].'"></a></td></tr>';
        ?>

        <?php endforeach; else: ?>

            <h2>No posts found</h2>

        <?php endif; ?>

        </table> <!-- close dynamic food section-->

    </section> <!-- close maincontent section-->



<!--
<div id="bottom">
    <a href="bio.php"><br>What is Pantry Assistant?</a>
</div>
-->

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


</body>
</html>