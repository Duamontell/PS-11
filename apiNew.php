<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    if ($data !== null) {
        $image_data = base64_decode($data['image']['data']);
        $image_filename = $data['image']['filename'];
        $image_path = 'images/' . $image_filename;
        $image_result = file_put_contents($image_path, $image_data);
        $author_url_data = base64_decode($data['author_url']['data']);
        $author_url_filename = $data['author_url']['author_url_filename'];
        $author_url_path = 'images/' . $author_url_filename;
        $author_url_result = file_put_contents($author_url_path, $author_url_data);
        
        if ($image_result !== false && $author_url_result !== false) {
            echo "Изображения успешно сохранены";
            $conn = new mysqli("localhost", "root", "", "blog");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $title = $data['title'];
            $subtitle = $data['subtitle'];
            $content = $data['content'];
            $author = $data['author'];
            $author_url = $author_url_path;
            $publish_date = $data['publish_date'];
            $image_url = $image_path;
            $featured = $data['featured'];
            $sql = "INSERT INTO post (title, subtitle, content, author, author_url, publish_date, image_url, featured) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssi", $title, $subtitle, $content, $author, $author_url, $publish_date, $image_path, $featured);
            if ($stmt->execute()) {
                echo "Данные успешно добавлены в базу данных";
            } else {
                echo "Ошибка при добавлении данных в базу данных: " . $conn->error;
            }
            $stmt->close();
            $conn->close();
        } else {
            echo "Ошибка при сохранении изображений";
        }
    } else {
        echo "Ошибка при парсинге JSON-данных";
    }
} else {
    echo "Метод запроса должен быть POST";
}

?>