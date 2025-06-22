<?php
include '../config/connect.php';
$pid = $_POST['product_id'];
$body = $_POST['body'];
mysqli_query($connect, "INSERT INTO comments (product_id, body) VALUES ($pid, '$body')");
header("Location: ../product.php?id=$pid");
