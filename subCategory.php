<?php
require_once 'db_pdo.php';
if (isset($_GET['itemId'])) {
    $id = $_GET['itemId'];
} else {
    $id = 0;
}
$DB = new db_pdo();

$sql = "select * from product_item where find_in_set('$id',sub_product_id) <> 0";
$products = $DB->querySelectParam($sql, array($id));
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        <script src="https://kit.fontawesome.com/21208763c4.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Expanded:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/HeaderFooterStyle.css">
        <link rel="stylesheet" href="css/homeStyle.css">
    </head>

    <body>

        <?php include './header.php'; ?>
        <div<?php if (!empty($name)) echo " class='display-none';"; ?>>
            <h1 class="headingProduct headingProductMain" ><?php echo $id ?></h1>
            <div class=" headingProductMain">
                <?php foreach ($products as $key => $value) { ?>
                    <div class="product">
                        <?php if ($products > 0) { ?>
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($value['item_image']) . '" height="200" width="190"/>'; ?>
                            <br/><br/> 
                            <a class="name" href="productDetails.php?itemId=<?php echo $value['product_item_id']; ?>"><?php echo $value['item_name']; ?></a>
                            <br/> <br/>   
                            <p class="description">Item # <?php echo $value['product_item_id']; ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include './footer.php'; ?>
        <br/><br/><br/><br/><br/><br/><br/>  
    </body>
</html>