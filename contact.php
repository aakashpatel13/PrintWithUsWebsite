<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <!-- Link the stylesheet-->
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
    <center>
        <h1 style="color: white;">CONTACT US</h1>
        <div class="contact-container">
            <form action="contactConnection.php" method="POST">
                <label for="firstName">FIRST NAME</label>
                <input type="text" id="firstName" name="firstName" placeholder="First name" required />
                <label for="lastName">LAST NAME</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last name" required />

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email" required />
                <label for="query">Query</label>
                <textarea id="query" name="query" placeholder="Write Your Query Here" style="height: 200px;"
                    required></textarea>
                <input type="submit" value="SUBMIT" />
                <input type="reset" value="RESET" />
            </form>
        </div>
    </center>
    <?php include './footer.php'; ?>
    <br /><br /><br /><br /><br /><br /><br />
</body>

</html>