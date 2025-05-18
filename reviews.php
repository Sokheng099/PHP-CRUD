<?php
// Connect to the database using custom MySQL port 3307
$conn = new mysqli("localhost", "root", "", "book_reviews", 3307);
//$conn = new mysqli("sql303.infinityfree.com", "if0_39007787", "Heng0997788", "if0_39007787_book_reviews");



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all reviews
$sql = "SELECT * FROM reviews ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Reviews</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        a.button {
            display: inline-block;
            margin-bottom: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.button:hover {
            background-color: #45a049;
        }
        .actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Book Reviews</h1>
    <a class="button" href="add.php">➕ Add New Review</a>
    <a class="button" href="index.php">🏠 Back to Home</a>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Reviewer</th>
                <th>Review</th>
                <th>Actions</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['book_title']) ?></td>
                    <td><?= htmlspecialchars($row['author']) ?></td>
                    <td><?= htmlspecialchars($row['reviewer_name']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['review'])) ?></td>
                    <td class="actions">
                        <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this review?');">🗑️ Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No reviews found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>
