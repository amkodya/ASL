<?php
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/17/16
 * Time: 11:47 AM
 */
$this->load->helper('form'); ?>

<html>
<head>
    <title>Pantry Assistant</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>

<div class="jumbotron" style="background:#56FCE5 !important"> <!-- blue section at the top -->

    <img id="logotopleft" src="../../images/pantry_assistant_logo.png"> <!-- link to image of logo -->

</div> <!-- close top section-->

<div class="form-horizontal" id="addform">

<?php echo form_open('crud/update/'.$name); ?>

<h3>Update Food Information Here:</h3>
<label>Food Name:
    <?php echo form_input('name'); ?>
</label>
<br />
<label>Expiration Date: (DD-MM-YYYY)
    <?php echo form_input('expiration'); ?>
</label>
<br />
<label>Price: ($)
    <?php echo form_input('price'); ?>
</label>
<br />
<label>Cal: (cal)
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
    <?php echo set_value('quantity', '0'); ?>
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

<?php echo form_close(); ?>

</div>