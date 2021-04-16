<?php
if (isset($_SESSION['email'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

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
    <form action="loginConnection.php" method="post">
        <center>
            <br /><br /><br /><br />
            <h1 style="color:white;">Login</h1>
            <div class="login-container">

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email" required />

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required />

                <input type="submit" value="LOGIN" />

                <div class="container" style=" color: red">
                    <p>Don't have an account yet? <a style=" color: yellow" href="registration.php">Sign Up</a></p>
                </div>
            </div>
        </center>
    </form>
    <?php include './footer.php'; ?>
    <br /><br /><br /><br /><br /><br /><br />
</body>

</html>