<!DOCTYPE html>
<html>
<head>
    <title>Book Review Portal - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 40px;
            max-width: 800px;
            margin: auto;
            color: #333;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
        }
        a.button {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 18px;
        }
        a.button:hover {
            background-color: #45a049;
        }
        footer {
            margin-top: 60px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome to My Book Review Portal</h1>

    <p><strong>Who am I?</strong>  
    Hello! I'm Sokheng Lay, a student from RUPP, passionate about books and coding.</p>

    <p><strong>About this project:</strong>  
    This is a simple web application built with PHP and MySQL that allows users to add, view, edit, and delete book reviews. It’s a great way to practice CRUD operations and PHP programming.</p>

    <p><strong>Class Info:</strong>  
    I’m currently studying Information Technology, in class A6. This project is part of my learning journey in web development.</p>

    <a class="button" href="reviews.php">View Book Reviews</a>

    <footer>
        &copy; <?= date('Y') ?> Sokheng Lay. All rights reserved.
    </footer>
</body>
</html>
