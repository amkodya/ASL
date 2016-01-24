<?php
/**
 * Created by PhpStorm.
 * User: electrikoala
 * Date: 1/23/16
 * Time: 11:47 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


    <title>Pantry Assistant</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
    <div class="content">
        <h1><?php echo $title; ?></h1>
<?php echo $message; ?>
<form method="post" action="<?php echo $action; ?>">
    <div class="data">
        <table>
            <tr>
                <td width="30%">ID</td>
                <td><input type="text" name="id" disabled="disable" class="text" value="<?php echo $this->validation->id; ?>"/></td>
                <input type="hidden" name="id" value="<?php echo $this->validation->id; ?>"/>
            </tr>
            <tr>
                <td valign="top">Name<span style="color:red;">*</span></td>
                <td><input type="text" name="name" class="text" value="<?php echo $this->validation->name; ?>"/>
                    <?php echo $this->validation->name_error; ?></td>
            </tr>
            <tr>
                <td valign="top">Expiration<span style="color:red;">*</span></td>
                <td><input type="text" name="expiration" class="text" value="<?php echo $this->validation->expiration; ?>"/>
                    <?php echo $this->validation->expiration_error; ?></td>
            </tr>
            <tr>
                <td valign="top">Price<span style="color:red;">*</span></td>
                <td><input type="text" name="price" class="text" value="<?php echo $this->validation->price; ?>"/>
                    <?php echo $this->validation->price_error; ?></td>
            </tr>
            <tr>
                <td valign="top">Cals<span style="color:red;">*</span></td>
                <td><input type="text" name="cals" class="text" value="<?php echo $this->validation->cals; ?>"/>
                    <?php echo $this->validation->cal_error; ?></td>
            </tr>
            <tr>
                <td valign="top">Protein<span style="color:red;">*</span></td>
                <td><input type="text" name="protein" class="text" value="<?php echo $this->validation->protein; ?>"/>
                    <?php echo $this->validation->protein_error; ?></td>
            </tr>
            <tr>
                <td valign="top">Quantity<span style="color:red;">*</span></td>
                <td><input type="text" name="quantity" class="text" value="<?php echo $this->validation->quantity; ?>"/>
                    <?php echo $this->validation->quantity_error; ?></td>
            </tr>
            <tr>
                <td valign="top">Category<span style="color:red;">*</span></td>
                <td><input type="text" name="category" class="text" value="<?php echo $this->validation->category; ?>"/>
                    <?php echo $this->validation->category_error; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Save"/></td>
            </tr>
        </table>
    </div>
</form>
<br />
<?php echo $link_back; ?>
</div>
</body>
</html>