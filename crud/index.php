<?php
require_once 'config/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #999;
        }

        th {
            background-color: #444;
            color: white;
        }

        td {
            background-color: #eee;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .danger {
            color: red;
        }
    </style>
</head>
<body>

<h2>Product List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price ($)</th>
            <th colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($connect, "SELECT * FROM `products`");

    if ($result && mysqli_num_rows($result) > 0) {
        while ($product = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . htmlspecialchars($product['id']) . "</td>
                    <td>" . htmlspecialchars($product['title']) . "</td>
                    <td>" . htmlspecialchars($product['description']) . "</td>
                    <td>" . htmlspecialchars($product['price']) . "</td>
                    <td><a href='product.php?id={$product['id']}'>View</a></td>
                    <td><a href='update.php?id={$product['id']}'>Update</a></td>
                    <td><a class='danger' href='vendor/delete.php?id={$product['id']}'>Delete</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No products found</td></tr>";
    }
    ?>
    </tbody>
</table>

<h3>Add New Product</h3>
<form action="vendor/create.php" method="post">
    <p><label>Title<br><input type="text" name="title" required></label></p>
    <p><label>Description<br><textarea name="description" required></textarea></label></p>
    <p><label>Price ($)<br><input type="number" step="0.01" name="price" required></label></p>
    <button type="submit">Add Product</button>
</form>

</body>
</html>
