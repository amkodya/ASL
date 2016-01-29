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

    <a href="../index.php/crud/home"><img id="logotopleft" src="../images/pantry_assistant_logo.png"></a> <!-- link to image of logo -->
    <div id="topright">

        <?php if (isset($user)): foreach ($user as $u): ?>

            <p>Hello,  <?php echo $u['username'];?> ! </p> <!-- dyanmic info appears at the top - username -->



        <?php endforeach; else: ?>

            <h2>No posts found</h2>

        <?php endif; ?>

        <img id="smallpic"><br> <!-- small icon pic -->
        <a href="../index.php">Sign Out</a> <!--option to sign out -->
    </div> <!-- close topright div -->
</div> <!-- close top section-->



<section id="mainbuttons"> <!--main buttons (add item, make grocery list, nutrition list -->

    <a href="../index.php/crud/grocery"><button type="button" class="btn btn-warning btn-lg btn-block">+ create grocery list</button></a><br> <!-- submit button -->
    <a href="../index.php/crud/nutrition"><button type="button" class="btn btn-warning btn-lg btn-block">+ add nutrition sheet</button></a><br> <!-- submit button -->
</section>



<section class="well well-lg"> <!-- expiring soon box -->
    <h4><b>These items are expired</b></h4>

    <table id="expired">

        <?php if (isset($foods)):
            foreach ($foods as $f):
                $date = date("Y-m-d");
                if($f['expiration'] <= $date):?>

            <tr><td><?php echo $f['name'];?></td><td><?php echo $f['expiration']; ?></td></tr> <!-- dyanmic info appears at the top - username -->

            <?php endif; ?>

        <?php endforeach; else: ?>

            <h2>No posts found</h2>

        <?php endif; ?>

    </table> <!-- close dynamic food section-->
</section> <!-- end expiring soon -->


<div class="form-horizontal" id="addform">

    <?php $this->load->helper('form'); ?>
    <?php echo form_open('crud'); ?>

    <h3>Enter Food Information Here:</h3>
    <label>Food Name:
        <?php echo form_input('name'); ?>
    </label>
    <br />
    <label>Expiration Date: (YYYY-MM-DD)
        <?php echo form_input('expiration'); ?>
    </label>
    <br />
    <label>Price: ($)
        <?php echo form_input('price'); ?>
    </label>
    <br />
    <label>Cal: (g)
        <?php echo form_input('cals'); ?>
    </label>
    <br />
    <label>Fats: (g)
        <?php echo form_input('fats'); ?>
    </label>
    <br />
    <label>Protein: (g)
        <?php echo form_input('protein'); ?>
    </label>
    <br />
    <label>Quantity:
        <?php echo form_input('quantity'); ?>
    </label>
    <br />
    <label>Category:
        <?php echo form_input('category'); ?>
    </label>
    <br />
    <!-- submit button  -->
    <div id="submit">
        <?php echo form_submit('submit', 'Submit'); ?>
    </div>
    <?php echo form_close(); ?><br><br><br>
    <br />

</div>


<section class="container" id="maincontent"> <!-- maincontent section - all food items go here -->

    <!--
    <ul class="nav nav-pills nav-stacked nav-warning"">
        <li role="presentation" class="active"><h3>Pick a Category</h3></li>
        <li role="presentation"><a href="#">fruits</a></li>
        <li role="presentation"><a href="#">vegetables</a></li>
        <li role="presentation"><a href="#">pantry</a></li>
        <li role="presentation"><a href="#">refrigerator</a></li>
        <li role="presentation"><a href="#">freezer</a></li>
        <li role="presentation"><a href="#">misc</a></li>
    </ul> -->

    <div class="container">
        <!-- Start table to list dynamic food items from table-->
        <table class="table table-hover" id="maintab"><tr id="firstrow"><td>Name</td><td>Exp Date</td><td>Price($)</td><td>Calories(cal)</td><td>Fats(g)</td><td>Protein(g)</td><td>Quantity</td><td></td><td></td></tr>

        <!-- dynamic array that will itirate all sql data
          foreach  ($result as $row) {  //foreach loop that will itirate through all the results and set them as var row
             } //echo out every row until there is no more data -->

        <?php if (isset($foods)): foreach ($foods as $f): ?>

        <tr><td><?php echo $f['name']; ?></td>
        <td><?php echo $f['expiration']; ?></td>
        <td><?php echo $f['price']; ?></td>
        <td><?php echo $f['cal']; ?></td>
        <td><?php echo $f['fats']; ?></td>
        <td><?php echo $f['protein']; ?></td>
        <td><?php echo $f['quantity']; ?></td>
        <td><a class="glyphicon glyphicon-cog" href="../index.php/crud/update"></a></td>
            <td><a class="glyphicon glyphicon-trash" href="../index.php/crud/delete"></a></td></tr>

        <?php endforeach; else: ?>

        <h2>No posts found</h2>

        <?php endif; ?>

        </table> <!-- close dynamic food section-->

    </div>

</section> <!-- close maincontent section-->
<br />


<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


</body>
</html>