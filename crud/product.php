<?php include 'config/connect.php'; ?>
<?php
$id = $_GET['id'];
$product = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM products WHERE id = $id"));
echo "<h2>{$product['title']}</h2><p>\${$product['price']}</p><p>{$product['description']}</p>";
?>
<h3>Comments</h3>
<?php
$result = mysqli_query($connect, "SELECT * FROM comments WHERE product_id = $id");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>- {$row['body']}</p>";
}
?>
<form method="POST" action="vendor/create_comment.php">
    <input type="hidden" name="product_id" value="<?= $id ?>">
    <textarea name="body" required></textarea><br>
    <button type="submit">Add Comment</button>
</form>
    