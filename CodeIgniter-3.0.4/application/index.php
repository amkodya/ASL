<?php
/**
 * Created by PhpStorm.
 * User: Ashley Kodya
 * Advanced Server Side Languages - January 2016
 * Date: 1/13/16
 * Time: 7:38 PM
 * PROJECT: PANTRY ASSISTANT
 * index.php
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

    <div id="top"></div>
    <img id="logomain" src="../images/pantry_assistant_logo.png">

    <form id="loginform">
        <input type="text" name="username" placeholder="enter username"><br><br>
        <input type="password" name="password" placeholder="enter password"><br><br>
        <input id="submit" type="submit" name="submit" value="submit">
        <a href="controllers/Signup.php">Don't have an account? Sign up now</a>
    </form>

    <div id="bottom">
        <a href="../views/Bio.php"><br>What is Pantry Assistant?</a>
    </div>
</body>
</html>
