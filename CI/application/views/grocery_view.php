<?php session_start();
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
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        h1 { padding: .2em; margin: 0; }
        #products { float:left; width: 500px; margin-right: 2em; }
        #cart { width: 200px; float: left; margin-top: 1em; }
        /* style the list to maximize the droppable hitarea */
        #cart ol { margin: 0; padding: 1em 0 1em 3em; }
    </style>
    <script>
        $(function() {
            $( "#catalog" ).accordion();
            $( "#catalog li" ).draggable({
                appendTo: "body",
                helper: "clone"
            });
            $( "#cart ol" ).droppable({
                activeClass: "ui-state-default",
                hoverClass: "ui-state-hover",
                accept: ":not(.ui-sortable-helper)",
                drop: function( event, ui ) {
                    $( this ).find( ".placeholder" ).remove();
                    $( "<li></li>" ).text( ui.draggable.text() ).appendTo( this );
                }
            }).sortable({
                items: "li:not(.placeholder)",
                sort: function() {
                    // gets added unintentionally by droppable interacting with sortable
                    // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
                    $( this ).removeClass( "ui-state-default" );
                }
            });
        });
    </script>
</head>
<body>

<div class="jumbotron" style="background:#56FCE5 !important"> <!-- blue section at the top -->

    <a href="../crud/home"><img id="logotopleft" src="../../images/pantry_assistant_logo.png"></a> <!-- link to image of logo -->
    <div id="topright"><p>Hello, <?php echo $_SESSION['username'] ?> ! </p> <!-- dyanmic info appears at the top - username -->
        <img id="smallpic"><br> <!-- small icon pic -->
        <a href="../../index.php">Sign Out</a> <!--option to sign out -->
    </div> <!-- close topright div -->
</div> <!-- close top section-->

<section id="mainbuttons"> <!--main buttons (add item, make grocery list, nutrition list -->

    <a href="../crud"><button type="button" class="btn btn-warning btn-lg btn-block">+ add grocery item</button></a><br> <!-- submit button -->
    <a href="../crud/grocery"><button type="button" class="btn btn-warning btn-lg btn-block">+ create grocery list</button></a><br> <!-- submit button -->
    <button type="button" href="addfood.php" class="btn btn-warning btn-lg btn-block">+ add nutrition sheet</button><br> <!-- submit button -->
</section>

<section class="well well-lg"> <!-- expiring soon box -->
    <h3>These items will be expiring soon</h3>

    <table colspan="3">

    </table> <!-- close dynamic food section-->
</section> <!-- end expiring soon -->

<section id="maincontent"> <!-- maincontent section - all food items go here -->


<div id="products" class="table table-condensed">
    <h1 class="ui-widget-header">Add To List</h1>
    <div id="catalog">
        <div>
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation">Lolcat Shirt</li>
            </ul>
        </div>
    </div>
</div>

<div id="cart" class="table table-condensed">
    <h1 class="ui-widget-header">Shopping Cart</h1>
    <div class="ui-widget-content">
        <ol>
            <li class="placeholder">Add your items here</li>
        </ol>
    </div>
</div>

</section>

</body>
</html>