<?php
require_once 'db_pdo.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

if (isset($_GET['name'])) {
    $name = $_GET['name'];
} else {
    $name = '';
}
if (isset($_GET['flag'])) {
    $data = $_GET['flag'];
} else {
    $data = '';
}
$DB = new db_pdo();
$sql = "SELECT * FROM sub_product_category where sub_product_id=$id";
$products = $DB->querySelect($sql);
if (strcmp($data, "bagsData") == 0) {
    $sql = "select * from product_item where find_in_set('$id',product_item.sub_product_id) <> 0";
    $products = $DB->querySelect($sql);
}

if (empty($products)) {
    $sql = "select sub_product.sub_product_name, product_item.* from product_item "
            . "INNER JOIN sub_product ON product_item.sub_product_id=sub_product.sub_product_id "
            . "where find_in_set('$id',product_item.sub_product_id) <> 0";
    $products = $DB->querySelectParam($sql, array($id));
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
        <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Expanded:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/HeaderFooterStyle.css">
        <link rel="stylesheet" href="css/homeStyle.css">
        <link rel="stylesheet" href="css/fixed.css">
    </head>

    <body>
        <div class="allProducts container">
            <?php include './header.php'; ?>
            <div<?php if (!empty($name)) echo " class='display-none';"; ?>>
                <?php if(empty($data)){?>
                    <h1 class="headingProduct headingProductMain" ><?php echo $products[0]['sub_product_name'] ?></h1>
                <?php }else{ ?>
                    <h1 class="headingProduct headingProductMain" ><?php echo $id ?></h1>
                <?php } ?>
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
        </div>
        <div<?php if (empty($name)) echo " class='display-none';"; ?>>
            <div class="remainingProducts">
                <h1 class="headingProduct headingProductMain" ><?php echo $name ?></h1>
                <div class=" headingProductMain">
                    <?php foreach ($products as $key => $value) { ?>
                        <div class="product">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($value['category_image']) . '" height="200" width="190"/>'; ?>
                            <br/><br/> 
                            <?php if (empty($products[0]['sub_category_names'])) { ?>
                                <a class="name" href="subCategory.php?itemId=<?php echo $value['category_name']; ?>"><?php echo $value['category_name']; ?></a>
                            <?php } else { ?>
                                <a class="name" href="subSubCategory.php?itemId=<?php echo $value['category_name']; ?>"><?php echo $value['category_name']; ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </br></br></br></br></br>
        <?php include './footer.php'; ?>
        <br/><br/><br/><br/><br/><br/><br/>  
    </body>
</html>