<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];

    $sql = "INSERT INTO news (title, content, author_id) VALUES ('$title', '$content', '$author_id')";

    if ($conn->query($sql) === TRUE) {
        echo "News posted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post News</title>
</head>
<body>
    <form method="post" action="">
        Title: <input type="text" name="title" required><br>
        Content: <textarea name="content" required></textarea><br>
        <button type="submit">Post News</button>
    </form>
</body>
</html>
