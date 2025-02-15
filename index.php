<!DOCTYPE html>
<?php
#refresh session if not logged in
session_start();
if (isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == 'true')) {
$username = $_SESSION['username'];
} else {
    session_destroy();
    session_start();
    $_SESSION['logged-in'] = 'false';
}
require "ITEMS.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unnamed E-Commerce Platform</title>
    </head>
    <body>
        <form method="POST" action="checkout.php">
            <?php
            foreach ($ITEMS as $name => $price) {
                #half-assed inline styling because i love bad practices and leaving things unfinished :P
                #note to self: don't copy this, so ugly
                echo ("<div id=$name style='border: solid #6955e3; width: 400px; margin:8px; border-radius:18px;'>"
                . "<img src='$IMAGES[$name]' id='thumb$name' style='border-radius: 13px; width: 391px; margin: 4px '>"
                . "<br>"
                . "<label for='thumb$name'>$DESC[$name]</label>"
                . "<hr>"
                . "<span><strong> price:</strong> $$price</span> <br>"
                . "<label for='qty$name' > how many do you want? </label>"
                . "<input type='number' name='qty$name' id='qty$name' value='0' required style='width:30px'>"
                . "<input type='submit' value='Buy Now&gt;' formaction='checkout.php' style='margin: 2px 2px 5px 5px'>"
                . "</div>");
            }
            ?>
        </form>
    </body>
</html>
