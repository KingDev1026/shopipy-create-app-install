<?php
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
    $gmail = $_GET['gmail'];
    $query = "select * from testshopify where gmail='" . $gmail ."'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) 
        echo "repeat";
    else{
        $query = "insert into testshopify (gmail, discount_code) values('". $gmail . "', '57TCTHPK76BZ')";
        if($conn->query($query) === true){
            echo '57TCTHPK76BZ';
        }
        else
            echo "faild";
    }
    $conn->close();
    // echo "Connected successfully";
?>