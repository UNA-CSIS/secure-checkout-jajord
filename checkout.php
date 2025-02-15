<!DOCTYPE html>
<?php
session_start();
foreach ((array) filter_input_array(INPUT_POST) as $key => $val) {
    # i didn't think this would work but it does?
    if (preg_match('/\Aqty/', $key)) {
        $_SESSION['buying'][$key] = $val;
        $_SESSION['last-page'] = 'checkout.php'; #suboptimal who cares
    }
}
require('authorizeplusredirect.php');
require('ITEMS.php');
require('TAX_RATES.php')
?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checking ya out....</title>
    </head>
    <body>
        <p> 
            your card info will be sent via unsecure channels to our very bad 
            backend. we make absolutely no guarantees as to the quality or
            safety of using our service. 
        </p>
        <hr>
        <p>
            you will buy: 
            <?php
            $subtotal = 0;
            foreach ($ITEMS as $name => $price) {
                $qty = htmlspecialchars($_SESSION['buying']["qty$name"]);
                if ($qty <= 0) {
                    continue;
                } #skip if user doesnt buy any
                echo "<div>"
                . "$qty of item: "
                . "<img src=$IMAGES[$name] alt='$DESC[$name]' style='width: 80px'"
                . "<br></div><br>";
                $subtotal += $qty * $price;
            }
            $_SESSION['subtotal'] = $subtotal; #always verify tho
            $total = $subtotal * (1 + $TAX_RATE);
            echo "subtotal: $$subtotal <br>"
            . "applicable tax rate: " . $TAX_RATE * 100 . "%<br>"
            . "total: $$total";
            ?>
        </p>
        <form method='POST' action='buy.php'>
            <br>
            <label for='userCard'>don't think, put your credit card information here:</label>
            <input type="number" name="userCard" id='userCard' placeholder="card number..." required>
            <br>
            <label for='userCardDate'>Expiration Date:</label>
            <input type="month" name="userCardDate" id='userCardDate' required>
            <input type="Submit" value="BUY NOW!">
        </form>
        <a href="." >Go Back</a>
    </body>