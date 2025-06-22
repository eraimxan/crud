<?php
include '../config/connect.php';
$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM products WHERE id = $id");
header("Location: ../index.php");
