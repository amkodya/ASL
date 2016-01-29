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

    <?php if (isset($foods)): foreach ($foods as $f): ?>

<?php echo form_open('crud/update/'.$f['name']); ?>

<h3>Update Food Information Here:</h3>
<h2><label>Food Name:
    <?php echo $f['name'];?>
</label></h2>
<br />
<label>Expiration Date: (YYYY-MM-DD)
    <?php echo form_input('expiration', $f['expiration']); ?>
</label>
<br />
<label>Price: ($)
    <?php echo form_input('price', $f['price']); ?>
</label>
<br />
<label>Cal: (cal)
    <?php echo form_input('cal', $f['cal']); ?>
</label>
<br />
<label>Fats: (g)
    <?php echo form_input('fats', $f['fats']); ?>
</label>
<br />
<label>Protein: (g)
    <?php echo form_input('protein', $f['protein']); ?>
</label>
<br />
<label>Quantity:
    <?php echo form_input('quantity', $f['quantity']); ?>
</label>
<br />
<label>Category:
    <?php echo form_input('category', $f['category']); ?>
</label>
<br />
<!-- submit button  -->
<div id="submit">
    <?php echo form_submit('submit', 'Submit'); ?>
</div>

<?php echo form_close();
        break; ?>

    <?php endforeach; else: ?>

        <h2>No posts found</h2>

    <?php endif; ?>

</div>