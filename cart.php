<!DOCTYPE html>
<?php

$status = '';
/*if (isset($_POST['action']) && $_POST['action'] == 'remove') {
    if (!empty($_SESSION['shopping_cart'])) {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if ($_POST['itemId'] == $key) {
                unset($_SESSION['shopping_cart'][$key]);
                $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
            }
            if (empty($_SESSION['shopping_cart'])) {
                unset($_SESSION['shopping_cart']);
            }
        }
    }
}*/

if (isset($_POST['action']) && $_POST['action'] == 'remove') {
    if (!empty($_SESSION['shopping_cart'])) {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            echo $_POST['itemId'];
            echo $value['itemId'];
            if ($_POST['itemId'] == $value['itemId']) {
                unset($_SESSION['shopping_cart'][$key]);
                $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
            }
            if (empty($_SESSION['shopping_cart'])) {
                unset($_SESSION['shopping_cart']);
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'change') {
    foreach ($_SESSION['shopping_cart'] as &$value) {
        if ($value['itemId'] === $_POST['itemId']) {
            $value['quantity'] = $_POST['quantity'];
            break; // Stop the loop after we've found the product
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>

    <!-- Link the stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/contact.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/HeaderFooterStyle.css">
    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="css/fixed.css">
</head>

<body>
    <!-- Display a navigation bar -->
    <?php include './header.php'; ?>


    <div class="cart">
        <?php
if (isset($_SESSION['shopping_cart'])) {
    $total_price = 0; ?>
        <table class="table">
            <tbody>
                <tr>
                    <td></td>
                    <td style="color:white">ITEM NAME</td>
                    <td style="color:white">QUANTITY</td>
                    <td style="color:white">UNIT PRICE</td>
                    <td style="color:white">ITEMS TOTAL</td>
                </tr>
                <?php
foreach ($_SESSION['shopping_cart'] as $product) {
        ?>
                <tr>
                    <td style="color:white">
                        <?php echo '<img title="Click to Enlarge !!!" data-darkbox src="data:image/jpeg;base64,'
                        .base64_encode($product['image']).'" height="200" width="200"/>'; ?>

                    </td>
                    <td style="color:white"><?php echo $product['name']; ?><br />
                        <form method='post' action=''>
                            <input type='hidden' name='itemId'
                                value="<?php echo $product['itemId']; ?>" />
                            <input type='hidden' name='action' value="remove" />
                            <button type='submit' class='remove'>Remove Item</button>
                        </form>
                    </td>
                    <td style="color:white">
                        <form method='post' action=''>
                            <input type='hidden' name='itemId'
                                value="<?php echo $product['itemId']; ?>" />
                            <input type='hidden' name='action' value="change" />
                            <select name='quantity' class='quantity' onChange="this.form.submit()">
                                <option <?php if ($product['quantity'] == 1) {
                            echo 'selected';
                        } ?>
                                    value="1">1
                                </option>
                                <option <?php if ($product['quantity'] == 2) {
                            echo 'selected';
                        } ?>
                                    value="2">2
                                </option>
                                <option <?php if ($product['quantity'] == 3) {
                            echo 'selected';
                        } ?>
                                    value="3">3
                                </option>
                                <option <?php if ($product['quantity'] == 4) {
                            echo 'selected';
                        } ?>
                                    value="4">4
                                </option>
                                <option <?php if ($product['quantity'] == 5) {
                            echo 'selected';
                        } ?>
                                    value="5">5
                                </option>
                            </select>
                        </form>
                    </td>
                    <td style="color:white"><?php echo '$'.$product['price']; ?>
                    </td>
                    <td style="color:white"><?php echo '$'.$product['price'] * $product['quantity']; ?>
                    </td>
                </tr>
                <?php
$total_price += ($product['price'] * $product['quantity']);
    } ?>
                <tr>
                    <td colspan="5" align="right" style="color:white">
                        <strong>TOTAL: <?php echo '$'.$total_price; ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
} else {
        echo '<h3>Your cart is empty!</h3>';
    }
?>
        <div id="payment-box">

            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type='hidden' name='business' value='sb-gdxzw5467765@business.example.com'> <input type='hidden'
                    name='item_name' value='Camera'> <input type='hidden' name='item_number' value='CAM#N1'> <input
                    type='hidden' name='amount' value=<?php echo $total_price; ?>>
                <input type='hidden' name='no_shipping' value='1'>
                <input type='hidden' name='currency_code' value='USD'> <input type='hidden' name='notify_url'
                    value='http://sitename/paypal-payment-gateway-integration-in-php/notify.php'>
                <input type='hidden' name='cancel_return'
                    value='http://sitename/paypal-payment-gateway-integration-in-php/cancel.php'>
                <input type='hidden' name='return'
                    value='http://sitename/paypal-payment-gateway-integration-in-php/return.php'>
                <input type="hidden" name="cmd" value="_xclick"> <input type="submit" name="pay_now" id="pay_now"
                    Value="Pay Now">
            </form>
        </div>


    </div>

    <div style="clear:both;"></div>

    <div class="message_box" style="margin:10px 0px;">
        <?php echo $status; ?>
    </div>
    <?php include './footer.php'; ?>
    <br /><br /><br /><br /><br /><br /><br />
</body>

</html>