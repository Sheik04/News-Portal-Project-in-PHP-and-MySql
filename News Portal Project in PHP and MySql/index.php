<?php
include 'config.php';

$sql = "SELECT news.id, news.title, news.content, users.username, news.created_at FROM news JOIN users ON news.author_id = users.id ORDER BY news.created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>News Portal</title>
</head>
<body>
    <h1>News Portal</h1>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>By " . $row['username'] . " on " . $row['created_at'] . "</p>";
            echo "<p>" . $row['content'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No news found.";
    }
    ?>
</body>
</html>
