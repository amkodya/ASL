<?php
/**
 * Created by PhpStorm.
 * User: Ashley Kodya
 * Date: 1/14/16
 * Time: 11:06 AM
 * PROJECT: PANTRY ASSISTANT
 * Main.php
 */
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
    <input id="submit" type="submit" name="submit" value="+ add grocery item"><br>
    <input id="submit" type="submit" name="submit" value="+ create grocery list"><br>
    <input id="submit" type="submit" name="submit" value="+ add nutrition sheet"><br>
</section>

<section id="expire">
    <h3>These items will be expiring soon</h3>
</section>



<!--
<div id="bottom">
    <a href="bio.php"><br>What is Pantry Assistant?</a>
</div>
-->
</body>
</html>