<!DOCTYPE html>
<html lang="en">
    <?php
    require 'authorizeplusredirect.php';
# if there was a real backend it would signal all the stuff here
    $subtotal = $_SESSION['subtotal'];
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Done!</title>
    </head>
    <body>
        <h3>Thank you for your purchase!</h3>

        <p <?php echo ($subtotal != 0) ? 'hidden' : '' ?>>
            Of nothing! We're gonna charge your card anyway though. 
            Thanks for wasting everyone's time!
        </p>
        <a href="."> Go Back </a>
    </body>
</html>