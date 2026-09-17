<?php

$user = "root";
$pass = "";
$SERVER = "localhost";
$database = "shop_vku";

$conn = new mysqli($SERVER, $user, $pass, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>