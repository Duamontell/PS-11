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

function getAndPrintPostFromDB(mysqli $conn): void
{    
    global $row, $id;    
    $sql = "SELECT * FROM post WHERE id = $id"; // Запрос для выборки только "featured" постов
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result ->fetch_assoc();
        include 'post_template.php';
    } else {
        echo "0 results";
    }
}

function closeDBConnection(mysqli $conn): void {
  $conn->close();
}

$conn = createDBConnection();
if (isset($_GET['postId']) && is_numeric($_GET['postId'])) {
    // Если параметр postId был передан в запросе и является числом
    $id = $_GET['postId'];

    // Подготавливаем запрос к базе данных
    $stmt = $conn->prepare("SELECT * FROM post WHERE id = ?"); //Разобраться с тем что лежит в stmt и почему так называется
    $stmt->bind_param("i", $id); // Привязываем параметр к запросу
    $stmt->execute(); // Выполняем запрос
    $result = $stmt->get_result(); // Получаем результат

    if ($result->num_rows > 0) {
        // Если запись существует, то отображаем содержимое поста или выполняем другие действия
    } else {
        // Если запись не существует, выводим сообщение об ошибке или выполняем перенаправление, перенаправляем пользователя на другую страницу
        
        header("Location: /error.php"); 
        exit; // Завершаем выполнение скрипта после перенаправления
    }
} else {
    // Если параметр postId не был передан в запросе или не является числом перенаправляем пользователя на другую страницу
    header("Location: /error.php"); 
    exit; 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>The Road Ahead</title>
    <link rel="stylesheet" href="css/the-road-ahead.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header-panel">
            <img class="header-logo" src="http://localhost/images/SVG/Escape-black..svg" alt="Logo Escape">
            <nav class="header-nav">
                <ul class="header-nav-list">
                    <li class="header-list header-home">Home</li>
                    <li class="header-list header-categories">Categories</li>
                    <li class="header-list header-about">About</li>
                    <li class="header-list header-contact">Contact</li>
                </ul>
            </nav>
        </div>
    </header>
    <?php
    getAndPrintPostFromDB($conn);
    closeDBConnection($conn);
    ?>
    <div class="bottom">
        <div class="bottom-panel">
            <img class="bottom-logo" src="http://localhost/images/SVG/Escape-white.svg" alt="Logo Escape">
            <nav class="bottom-nav">
                <ul class="bottom-nav-list">
                    <li class="bottom-list bottom-home">Home</li>
                    <li class="bottom-list bottom-categories">Categories</li>
                    <li class="bottom-list bottom-about">About</li>
                    <li class="bottom-list bottom-contact">Contact</li>
                </ul>
            </nav>
        </div>
        <div class="bottom-background-opacity"></div>
    </div>
</body>

</html>