<?php

// Set variables for our request
$shop = $_GET['shop'];

$api_key = "96a0dfd03cfabf272ae97f605a9c4fb0";
$scopes = "read_orders,write_products,read_script_tags,write_script_tags";
$redirect_uri = "https://localhost/myshopifyfirstapp/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();