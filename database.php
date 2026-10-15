<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "bq_company";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed. Check database.php and MySQL.");
}
$conn->set_charset("utf8mb4");
?>