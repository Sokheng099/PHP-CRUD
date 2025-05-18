<?php
// Connect to the database using custom MySQL port 3307
$conn = new mysqli("localhost", "root", "", "book_reviews", 3307);
//$conn = new mysqli("sql303.infinityfree.com", "if0_39007787", "Heng0997788", "if0_39007787_book_reviews");



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided in the URL
if (!isset($_GET['id'])) {
    die("No ID provided.");
}

$id = intval($_GET['id']);

// Delete the review
$sql = "DELETE FROM reviews WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: reviews.php");
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
