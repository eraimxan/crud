<?php
include '../config/connect.php';
$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];

mysqli_query($connect, "INSERT INTO products (title, price, description) VALUES ('$title', $price, '$description')");
header("Location: ../index.php");
