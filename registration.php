<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>

    <!-- Link the stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/registration.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/HeaderFooterStyle.css">
    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="css/fixed.css">
</head>

<body>

    <!-- Display a sign up or registration form -->
    <!-- Display a navigation bar -->
    <?php include './header.php'; ?>
    <div>
        <form action="registrationConnection.php" method="post">
            <center>
                <h1 style="color: white;">REGISTER NOW</h1>

                <br /><br />
                <!-- For input validation, I have used the 'required' attribute in input tags. So, the the field can't be left empty
                         The same thing can also be achieved using javascript but it makes the code lengthy-->

                <table align="center" cellpadding="10" cellspacing="3">
                    <!------------------ First Name -------------------------->
                    <tr>
                        <td>
                            <label for="firstName">FIRST NAME</label>
                        </td>
                        <td>
                            <input type="text" name="firstName" placeholder="First name" id="firstName" maxlength="30"
                                required />
                        </td>
                    </tr>

                    <!-------------------Last Name ---------------------------->
                    <tr>
                        <td>
                            <label for="lastName">LAST NAME</label>
                        </td>
                        <td>
                            <input type="text" name="lastName" placeholder="Last name" id="lastName" maxlength="30"
                                required />
                        </td>
                    </tr>

                    <!------------------ Date Of Birth ------------------------>
                    <tr>
                        <td>
                            <label for="DOB">DATE OF BIRTH</label>
                        </td>
                        <td>
                            <input type="date" name="DOB" id="DOB" required />
                        </td>
                    </tr>

                    <!----- Gender ----------------------------------------------------------->
                    <tr>
                        <td>
                            <label>GENDER</label>
                        </td>
                        <td>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="gender" value="Male" required />

                            <label for="female">Female</label>
                            <input type="radio" name="gender" name="gender" value="Female" required />
                        </td>
                    </tr>

                    <!----- Email Id ---------------------------------------------------------->
                    <tr>
                        <td>
                            <label for="email" required>EMAIL</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" maxlength="100" required />
                        </td>
                    </tr>

                    <!----- Mobile Number ---------------------------------------------------------->
                    <tr>
                        <td>
                            <label for="mobile" required>MOBILE NUMBER</label>
                        </td>
                        <td>
                            <input type="tel" placeholder="Example: 123-456-7890" id="mobile" name="mobile" id="phone"
                                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
                        </td>
                    </tr>

                    <!----- Address ---------------------------------------------------------->
                    <tr>
                        <td>
                            <label for="Address" required>ADDRESS</label> <br /><br /><br />
                        </td>
                        <td>
                            <textarea name="address" rows="4" cols="30" required></textarea>
                        </td>
                    </tr>

                    <!----- City ---------------------------------------------------------->
                    <tr>
                        <td>
                            <label for="City">CITY</label>
                        </td>
                        <td>
                            <input type="text" name="city" id="city" maxlength="30" required />
                        </td>
                    </tr>

                    <!----- Postal Code ---------------------------------------------------------->
                    <tr>
                        <td>
                            <label for="postalcode">POSTAL CODE</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Example: P4N 5K8" id="postalcode" name="postalcode"
                                required />
                        </td>
                    </tr>

                    <!----- State ---------------------------------------------------------->
                    <tr>
                        <td><label for="State">STATE</label></td>
                        <td>
                            <input type="text" name="state" id="state" maxlength="30" required />
                        </td>
                    </tr>

                    <!----- Country ---------------------------------------------------------->
                    <tr>
                        <td><label for="Country">COUNTRY</label></td>
                        <td>
                            <input type="text" name="country" id="country" required />
                        </td>
                    </tr>

                    <!----- Enter Password ---------------------------------------------------------->
                    <tr>
                        <td>
                            <label for="password">Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" maxlength="30" required />
                        </td>
                    </tr>

                    <!----- Submit and Reset ------------------------------------------------->
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" id="submitButton" value="REGISTER" />
                            <input type="reset" id="resetButton" value="RESET" />
                        </td>
                    </tr>
                </table>
            </center>
        </form>
    </div>
    <br /><br /><br />
    <?php include './footer.php'; ?>
    <br /><br /><br /><br /><br /><br /><br />
</body>

</html>