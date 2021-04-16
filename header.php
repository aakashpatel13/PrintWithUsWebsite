<img id="logo" src="images/logo.png" alt="" />
<div class="navbar">
    <?php
    session_start();
        if (empty($_SESSION['User'])) { ?>
    <a href="login.php">Login</a>
    <?php } else { ?>
    <em style="
            color: white;
            font-family: none;
            font-size: 25px;
            margin-left: 30px;
        ">
        Welcome <?php echo $_SESSION['User']; ?></em>
    <a href="logout.php">Logout</a>
    <?php }
    ?>

    <?php

if (!empty($_SESSION['shopping_cart'])) {
    $cart_count = count(array_keys($_SESSION['shopping_cart'])); ?>
    <div class="">
        <a href="cart.php"><img src="images/addtocart.png" width="30" height="30" />Cart<span>
                <?php echo $cart_count; ?></span></a>
    </div>
    <?php
}
?>

    <a href="contact.php">Contact</a>
    <a href="about.php">About</a>
    <a href="index.php">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Products
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <div class="row">
                <div class="column">
                    <h3>Business Forms</h3>
                    <a href="products.php?id=13">Laser Forms</a>
                    <a href="products.php?id=14">Invoices</a>
                    <a href="products.php?id=15">Sales Forms</a>
                    <a href="products.php?id=16">Receipt Books</a>
                    <a href="products.php?id=17">Gift Certificates</a>
                    <a href="products.php?id=18">Purchase Orders</a>
                    <a href="products.php?id=19">Work Orders</a>
                    <a href="products.php?id=20">Proposals</a>
                    <a href="products.php?id=21">Time Tickets</a>
                    <a href="products.php?id=22">Shipping Products</a>
                    <a href="products.php?id=23">Manual Forms</a>
                    <a href="products.php?id=24">Custom Forms</a>
                </div>
                <div class="column">
                    <h3>Business Cheques</h3>
                    <!--<a href="products.php?id=1">Custom Cheques</a>-->
                    <a href="products.php?id=2">High Security Cheques</a>
                    <a href="products.php?id=3">Laser Cheques</a>
                    <a href="products.php?id=4">Manual Cheques</a>
                    <a href="products.php?id=5">Personal Cheques</a>
                    <a href="products.php?id=6">QuickBooks Cheques</a>
                    <a href="products.php?id=7">Sage Cheques</a>
                </div>
                <div class="column">
                    <h3>Banking Products</h3>
                    <a href="products.php?id=9">Cheque Envelopes</a>
                    <a href="products.php?id=10">Deposit Slips</a>
                    <a href="products.php?id=11">Deposit Bags</a>
                    <a href="products.php?id=12">Stamps</a>
                </div>
                <div class="column">
                    <h3>Signature Packaging</h3>
                    <a href="products.php?id=31&name=Bags">Bags</a>
                    <a href="products.php?id=32&name=Boxes">Boxes</a>
                    <a href="products.php?id=33&name=Tissue Paper">Tissue Paper</a>
                    <a href="products.php?id=34&name=Gift Wrap">Gift Wrap</a>
                    <a href="products.php?id=35">Ribbon</a>
                </div>
                <div class="column">
                    <h3>Office Supplies</h3>
                    <a href="products.php?id=25&name=Stationery">Stationery</a>
                    <a href="products.php?id=26">Envelops</a>
                    <a href="products.php?id=27">Stamps</a>
                    <a href="products.php?id=28">Tags</a>
                    <a href="products.php?id=29&name=Labels">Labels</a>
                    <a href="products.php?id=30">Calendars</a>
                </div>


            </div>
        </div>
    </div>
</div>