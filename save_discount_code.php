<?php

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
    header('Access-Control-Allow-Origin: *');
//    header('Content-Type: application/json');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shopifytestdb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $discount = $_POST['discount'];
    $shop_name = $_POST['shop_name'];
    
    $query = "insert into discount_code (cur_discount_code, shop_name) values('". $discount . "', '" . $shop_name . "')";
    if($conn->query($query) === true)
        echo "success";
    else
        echo "faild";
    $conn->close();
?>