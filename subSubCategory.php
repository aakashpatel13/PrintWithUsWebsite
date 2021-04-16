<?php
require_once 'db_pdo.php';
if (isset($_GET['itemId'])) {
    $id = $_GET['itemId'];
} else {
    $id = 0;
}
$DB = new db_pdo();
if (strcmp($id, "Euro-Shoppers") == 0) {
    $item = 7;
    $itemCode = 97;
} else if (strcmp($id, "Plastic Bags") == 0) {
    $item = 8;
    $itemCode = 97;
} else if (strcmp($id, "Paper Bags") == 0) {
    $item = 9;
    $itemCode = 97;
}
$sql = "SELECT * FROM sub_sub_product_category where sub_product_category_id=$item";
$products = $DB->querySelect($sql);
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
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($value['sub_sub_product_category_image']) . '" height="200" width="190"/>'; ?>
                            <br/><br/> 
                            <a class="name" href="products.php?flag=bagsData&id=<?php echo $value['sub_sub_product_category_name']; ?>"><?php echo $value['sub_sub_product_category_name']; ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        </div>
        <?php include './footer.php'; ?>
        <br/><br/><br/><br/><br/><br/><br/>  
    </body>
</html>