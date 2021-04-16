<?php

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $DOB = $_POST['DOB'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'printwithus');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        exit('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare('insert into users(firstName, lastName, DOB, gender, email, mobile, address, city, postalcode, state, country, password) 
        values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssssssssss', $firstName, $lastName, $DOB, $gender, $email, $mobile, $address, $city, $postalcode, $state, $country, $password);
        //$execval =
        $stmt->execute();
        //echo $execval;
        header('location: thankyouRegistration.html');
        $stmt->close();
        $conn->close();
    }
