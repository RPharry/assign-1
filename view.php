<?php
$servername = "127.0.0.1:3306";
$username = "harry"; 
$password = "Harry@123"; 
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, description FROM books";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>View Content</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="view.php">View Books</a></li>
            </ul>
        </nav>
        <div class="logo">H Books</div>
    </header>

    <div class="container">
        <h2>View Books</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h3>" . $row["title"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
            }
        } else {
            echo "No content available";
        }
        $conn->close();
        ?>
    </div>

    <footer>
        <p>&copy; 2023 H Book. All rights reserved.</p>
    </footer>
</body>

</html>
