<?php
include '../config/connect.php';
$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];

mysqli_query($connect, "UPDATE products SET title='$title', price=$price, description='$description' WHERE id=$id");
header("Location: ../index.php");
