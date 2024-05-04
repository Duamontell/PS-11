<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function closeDBConnection(mysqli $conn): void {
  $conn->close();
}

function getAndPrintFeaturedPostsFromDB(mysqli $conn): void // Разделить печать и чтение
{
    $sql = "SELECT * FROM post WHERE featured = 1"; // Запрос для выборки только "featured" постов
    $result = $conn->query($sql);   
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            include 'post-preview.php'; // Используем шаблон для вывода "featured" постов
        }
    } else {
        echo "0 results";
    }
}
function getAndPrintMostRecentsPostsFromDB(mysqli $conn): void // Разделить печать и чтение
{    $sql = "SELECT * FROM post WHERE featured = 0"; // Запрос для выборки только "most-recent" постов
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
           include 'most-recent_preview.php'; // Используем шаблон для вывода "most-recent" постов
       }
    } else {
       echo "0 results";
    }
}

$conn = createDBConnection();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Escape</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="header-panel">
            <img class="header-panel__logo" src="http://localhost/images/SVG/Escape-white.svg" alt="Logo Escape">
            <nav class="header-navigation">
                <ul class="header-navigation__list">
                    <li class="header-navigation__list-element"><a href="#">Home</a></li>
                    <li class="header-navigation__list-element">Categories</li>
                    <li class="header-navigation__list-element">About</li>
                    <li class="header-navigation__list-element">Contact</li>
                </ul>
            </nav>
        </div>
        <div class="header-tittle">
            <h1 class="main-tittle">Let's do it together.</h1>
            <h2 class="sub-tittle">We travel the world in search of stories. Come along for the ride.</h2>
            <button class="button-lasts-post">View Latest Posts</button>
        </div>
    </div>
    <div class="main">
        <div class="menu">
            <div class="menu-panel">
                <ul class="menu-panel__list">
                    <li class="menu-panel__list-element">Nature</li>
                    <li class="menu-panel__list-element">Photography</li>
                    <li class="menu-panel__list-element">Relaxation</li>
                    <li class="menu-panel__list-element">Vacation</li>
                    <li class="menu-panel__list-element">Travel</li>
                    <li class="menu-panel__list-element">Adventure</li>
                </ul>
            </div>
        </div>
        <div class="posts__block">
            <h3 class="posts__main-tittle">Featured Posts</h3>
            <div class="posts__line"></div>
            <div class="posts">
                <?php
                    getAndPrintFeaturedPostsFromDB($conn);
                ?>
            </div>
        </div>
        <div class="posts__block">
            <h3 class="posts__main-tittle">Most Recent</h3>
            <div class="posts__line"></div>
            <div class="posts">
                <?php
                    getAndPrintMostRecentsPostsFromDB($conn);
                    closeDBConnection($conn);
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-panel">
            <img class="footer-panel__logo" src="http://localhost/images/SVG/Escape-white.svg" alt="Logo Escape">
            <ul class="footer-nav">
                <li>Home</li>
                <li>Categories</li>
                <li>About</li>
                <li class="contact-margin">Contact</li>
            </ul>
        </div>
        <div class="footer_opacity"></div>
    </div>
</body>

</html>