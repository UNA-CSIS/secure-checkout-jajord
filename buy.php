<!DOCTYPE html>
<html lang="en">
    <?php
    require 'CardType.php'; # this was gonna be a class but i gave up
    require 'ITEMS.php';
    require 'TAX_RATES.php';
    require 'authorizeplusredirect.php';
    $user_card = htmlspecialchars($_POST['userCard']);
    $subtotal = $_SESSION['subtotal'];
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>checking ya out...</title>
    </head>
    <body>
        <p> subtotal: $<?php echo $subtotal ?> <br>

            <?php
            $CARDS = [# [0]: prefix | [1]: length
                "MasterCard" => [[51, 55], 16],
                "VISA" => [4, [13, 16]],
                "AMEX" => [[34, 37], 15]
            ];
            $worked = false;
            foreach ($CARDS as $name => $cardtype) {
                if (verify_card($user_card, $cardtype[0], $cardtype[1])) {
                    #calc total
                    $total = $subtotal * (1 + $TAX_RATE);
                    echo "your total sales tax is: $"
                    . $total - $subtotal . "<br>";
                    echo "are you sure you want to pay: $$total via $name? "
                    . "<form action='end.php' method='POST'>"
                    . "<input type=submit value=yes>"
                    . "</form>";
                    $worked = true;
                    break;
                }
            }

            if (!$worked) { ?>
                Your card info could not be verified, please try again.
                <br><br><a href="checkout.php">Go Back to Checkout</a>
      <?php } ?>
            <br>
            <a href="." >Go Back to Cart</a>
        </p>
    </body>
</html>
