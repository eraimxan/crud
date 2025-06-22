<?php
include 'config/connect.php';
$id = $_GET['id'] ?? '';
$title = '';
$price = '';
$description = '';

if ($id) {
    $product = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM products WHERE id = $id"));
    $title = $product['title'];
    $price = $product['price'];
    $description = $product['description'];
}
?>
<form action="vendor/<?= $id ? 'update.php' : 'create.php' ?>" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input name="title" placeholder="Title" value="<?= $title ?>"><br>
    <input name="price" placeholder="Price" value="<?= $price ?>"><br>
    <textarea name="description"><?= $description ?></textarea><br>
    <button type="submit">Save</button>
</form>
