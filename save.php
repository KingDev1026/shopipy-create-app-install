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
    $gmail = $_POST['mail'];
    $query = "select * from testshopify where gmail='" . $gmail ."'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) 
        echo "repeat";
    else{
        $query = "select * from discount_code order by iindexid DESC limit 1";
        $result = $conn->query($query);
        $discount_code = "";
        while($row = $result->fetch_assoc()) {
            $discount_code = $row["cur_discount_code"];
        }
        $query = "insert into testshopify (gmail, discount_code) values('". $gmail . "', '". $discount_code . "')";
        if($conn->query($query) === true){
            echo $discount_code;
        }
        else
            echo "failed";
    }
    $conn->close();
?>