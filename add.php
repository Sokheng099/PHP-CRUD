<?php

// Connect to the database using custom MySQL port 3307
$conn = new mysqli("localhost", "root", "", "book_reviews", 3307);

//$conn = new mysqli("sql303.infinityfree.com", "if0_39007787", "Heng0997788", "if0_39007787_book_reviews");



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert form data into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_title = $_POST["book_title"];
    $author = $_POST["author"];
    $reviewer_name = $_POST["reviewer_name"];
    $review = $_POST["review"];

    $stmt = $conn->prepare("INSERT INTO reviews (book_title, author, reviewer_name, review) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $book_title, $author, $reviewer_name, $review);

    if ($stmt->execute()) {
        header("Location: reviews.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book Review</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .form-container {
            background-color: white;
            padding: 25px;
            max-width: 600px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        textarea {
            height: 100px;
        }
        button {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        a.button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #777;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add Book Review</h1>
        <form method="POST">
            <label for="book_title">Book Title</label>
            <input type="text" name="book_title" required>

            <label for="author">Author</label>
            <input type="text" name="author" required>

            <label for="reviewer_name">Your Name</label>
            <input type="text" name="reviewer_name" required>

            <label for="review">Your Review</label>
            <textarea name="review" required></textarea>

            <button type="submit">Submit Review</button>
        </form>
        <a class="button" href="reviews.php">← Back to Reviews</a>
    </div>
</body>
</html>
