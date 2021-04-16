<?php
 include './header.php';
$status = '';
require_once 'db_pdo.php';
if (isset($_GET['itemId'])) {
    $itemId = $_GET['itemId'];
} else {
    $itemId = 0;
}
$DB = new db_pdo();
//$sql = "select * from product_item where find_in_set('$itemId',sub_product_id) <> 0";
$sql = "SELECT * FROM product_item WHERE product_item_id ='$itemId'";
$productData = $DB->querySelectParam($sql, [$itemId]);

/* add to cart*/
if (isset($_POST['code']) && $_POST['code'] != '') {
    $name = $productData[0]['item_name'];
    $itemId = $productData[0]['product_item_id'];
    $price = $productData[0]['Price'];
    $image = $productData[0]['item_image'];

    $cartArray = [
    $itemId => [
    'name' => $name,
    'itemId' => $itemId,
    'price' => $price,
    'quantity' => 1,
    'image' => $image, ],
];

    if (empty($_SESSION['shopping_cart'])) {
        $_SESSION['shopping_cart'] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
    } else {
        $array_keys = array_keys($_SESSION['shopping_cart']);
        if (in_array($itemId, $array_keys)) {
            $status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";
        } else {
            $_SESSION['shopping_cart'] = array_merge(
    $_SESSION['shopping_cart'],
    $cartArray
    );
            $status = "<div class='box'>Product is added to your cart!</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <script src="https://kit.fontawesome.com/21208763c4.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Expanded:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/HeaderFooterStyle.css">
    <link rel="stylesheet" href="css/homeStyle.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var $darkbox = $("<div/>", {
                id: "darkbox"
            }).on("click", function() {
                $(this).removeClass("on");
            }).appendTo("body");
            $('img[data-darkbox]').css({
                cursor: "pointer"
            }).on("click", function() {
                var o = this.getBoundingClientRect();
                $darkbox.css({
                    transition: "0s",
                    backgroundImage: "url(" + this.src + ")",
                    left: o.left,
                    top: o.top,
                    height: this.height,
                    width: this.width
                });
                setTimeout(function() {
                    $darkbox.css({
                        transition: ".8s"
                    }).addClass("on");
                }, 5);
            });

        })
    </script>


</head>

<body>


    <div id="dataTable">
        <div>
            <h1 class="headingProduct">( <?php echo $productData[0]['product_item_id']; ?>
                ) <?php echo $productData[0]['item_name']; ?>
            </h1>
        </div>
        <span class="divLeft">
            <table>
                <tr>
                    <?php if (!empty($productData[0]['Compatible Envelopes'])) { ?>
                    <td>
                        <p>Compatible Envelopes:
                    </td>
                    <td><?php echo $productData[0]['Compatible Envelopes']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Size'])) { ?>
                    <td>
                        <p>Size:
                    </td>
                    <td><?php echo $productData[0]['Size']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Background'])) { ?>
                    <td>
                        <p>Background(s):
                    </td>
                    <td><?php echo $productData[0]['Background']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['consecutive_numbering'])) { ?>
                    <td>
                        <p>Consecutive Numbering:
                    </td>
                    <td><?php echo $productData[0]['consecutive_numbering']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Imprint'])) { ?>
                    <td>
                        <p>Imprint:
                    </td>
                    <td><?php echo $productData[0]['Imprint']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Miscellaneous'])) { ?>
                    <td>
                        <p>Miscellaneous:
                    </td>
                    <td> <?php echo $productData[0]['Miscellaneous']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Colours'])) { ?>
                    <td>
                        <p>Colours:
                    </td>
                    <td> <?php echo $productData[0]['Colours']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Compatibility'])) { ?>
                    <td>
                        <p>Compatibility:
                    </td>
                    <td> <?php echo $productData[0]['Compatibility']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['description'])) { ?>
                    <td>
                        <p>Description:
                    </td>
                    <td> <?php echo $productData[0]['description']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Quantity'])) { ?>
                    <td>
                        <p>Quantity:
                    </td>
                    <td> <?php echo $productData[0]['Quantity']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Stock'])) { ?>
                    <td>
                        <p>Stock:
                    </td>
                    <td> <?php echo $productData[0]['Stock']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (!empty($productData[0]['Price'])) { ?>
                    <td>
                        <p>Price CA$:
                    </td>
                    <td> <?php echo $productData[0]['Price']; ?>
                    </td>
                    </p>
                    <?php } ?>
                </tr>
                <!--COMMENT--   <a class="name"
                    href="cart2.php?itemId=<?php echo $productData[0]['product_item_id']; ?>">Add
                To Cart</a>
                <a class="name" href="payment2.php">Pay Now</a> -->
                <form method='post' action=''>
                    <input type='hidden' name='code' value=".$productData[0]['product_item_id']." />

                    <button type='submit' class='buy'>Buy Now</button>
                </form>

            </table>

        </span>
        <span>
            <?php echo '<img title="Click to Enlarge !!!" data-darkbox src="data:image/jpeg;base64,'.base64_encode($productData[0]['item_image']).'" height="200" width="200"/>'; ?>
        </span>
    </div>
    </br></br></br></br></br>
    <?php include './footer.php'; ?>
    <br /><br /><br /><br /><br /><br /><br />
</body>

</html>