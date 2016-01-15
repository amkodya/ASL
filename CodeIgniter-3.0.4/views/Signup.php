<?php
/**
 * Created by PhpStorm.
 * User: Ashley Kodya
 * Advanced Server Side Languages - January 2016
 * Date: 1/13/16
 * Time: 7:38 PM
 * PROJECT: PANTRY ASSISTANT
 * Signup.php
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

<div id="top"><img id="logotopleft" src="../images/pantry_assistant_logo.png"></div>


<form action="../application/controllers/Form.php" id="signupform" method="post" novalidate="" enctype="multipart/form-data">

    <h2>Register for a PANTRY ASSISTANT account:</h2><br>

        <div id="field1-container" class="field f_100">
            <label>
                First Name
            </label>
            <input type="text" name="firstname" id="firstname" required="required">
        </div>


        <div id="field2-container" class="field f_100">
            <label>
                Last Name
            </label>
            <input type="text" name="lastname" id="lastname" required="required">
        </div>


        <div id="field9-container" class="field f_100">
            <label>
                Email Address
            </label>
            <input type="email" name="email" id="email" required="required">
        </div>


        <div id="field10-container" class="field f_100">
            <label>
                Date
            </label>
            <input type="date" id="dob" maxlength="524288" name="dob"
                   required="" size="20" tabindex="0" title="">
        </div>


        <div id="field12-container" class="field f_100">
            <label>
                Zip Code
            </label>
            <input type="number" name="zip" id="zip" required="required">
        </div>


        <div id="field3-container" class="field f_100">
            <label>
                Create Username
            </label>
            <input type="text" name="username" id="username" required="required">
        </div>


        <div id="field13-container" class="field f_100">
            <label>
                Create Password
            </label>
            <input type="password" name="password" id="password" required="required">
        </div>


        <div id="field14-container" class="field f_100">
            <label>
                Confirm Password
            </label>
            <input type="password" name="password" id="password" required="required">
        </div>


        <div id="field15-container" class="field f_100">
            <label>
                Upload Profile Picture
            </label>
            <input type="file" name="profile" id="profile" required="required">
        </div>

    <br><br>


    <div id="form-submit" class="field f_100 clearfix submit">
        <input id="submit" type="submit" name="submit" value="submit">
        </div>
    </form>


</body>
</html>
