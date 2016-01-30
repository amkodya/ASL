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
$this->load->library('upload');
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

    <a href="crud/home"><img id="logotopleft" src="../images/pantry_assistant_logo.png"></a> <!-- link to image of logo -->
    <div id="topright">

        <?php if (isset($user)): foreach ($user as $u): ?>

        <p>Hello,  <?php echo $u['username'];?> ! </p> <!-- dyanmic info appears at the top - username -->



        <?php endforeach; else: ?>

            <h2>No posts found</h2>

        <?php endif; ?>

        <a href=""<img id="smallpic"><br> <!-- small icon pic -->
        <a href="../index.php">Sign Out</a> <!--option to sign out -->
    </div> <!-- close topright div -->
</div> <!-- close top section-->



<section id="mainbuttons"> <!--main buttons (add item, make grocery list, nutrition list -->

    <a href="../index.php/crud/grocery"><button type="button" class="btn btn-warning btn-lg btn-block">+ create grocery list</button></a><br> <!-- submit button -->
    <button type="button" href="addfood.php" class="btn btn-warning btn-lg btn-block">+ add nutrition sheet</button><br> <!-- submit button -->
</section>



<section class="well well-lg"> <!-- expiring soon box -->
    <h3>These items will be expiring soon</h3>

    <table colspan="3">

    </table> <!-- close dynamic food section-->
</section> <!-- end expiring soon -->
