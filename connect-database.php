<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully<br>";
    return $conn;
}

function closeDBConnection(mysqli $conn): void
{
    $conn->close();
}

function getAndPrintPostsFromDB(mysqli $conn): void
{
    $sql = "SELECT * FROM post";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: {$row['id']} <br>";
            echo "Title: {$row['title']} <br>";
            echo "Subtitle: {$row['subtitle']} <br>";
            echo "Content: {$row['content']} <br>";
            echo "Author: {$row['author']} <br>";
            echo "Author URL: {$row['author_url']} <br>";
            echo "Publish Date: {$row['publish_date']} <br>";
            echo "Image URL: {$row['image_url']} <br>";
            echo "Is Featured: {$row['featured']} <br>";
            echo "<br>";
        }
    } else {
        echo "0 results";
    }
}

$conn = createDBConnection();
getAndPrintPostsFromDB($conn);
closeDBConnection($conn);

?>