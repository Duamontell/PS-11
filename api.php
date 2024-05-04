<?php

// Проверяем метод запроса
$method = $_SERVER['REQUEST_METHOD'];

// Проверяем, что запрос пришел методом POST
if ($method === 'POST') {
    // Получаем содержимое POST-запроса
    $json_data = file_get_contents('php://input');
    
    // Парсим JSON-данные
    $data = json_decode($json_data, true);
    
    // Проверяем, что данные успешно распарсились
    if ($data !== null) {
        // Получаем содержимое изображения из запроса
        $image_data = $data['image'];
        
        // Декодируем base64-строку в бинарные данные
        $image_data = base64_decode($image_data);
        
        // Генерируем уникальное имя файла
        $filename = uniqid() . '.jpg';
        
        // Путь к папке для сохранения изображений
        $path = 'images/' . $filename;
        
        // Сохраняем изображение в файл
        $result = file_put_contents($path, $image_data);
        
        // Проверяем успешность сохранения
        if ($result !== false) {
            echo "Изображение успешно сохранено в файл: $path";
        } else {
            echo "Ошибка при сохранении изображения";
        }
    } else {
        echo "Ошибка при парсинге JSON-данных";
    }
} else {
    echo "Метод запроса должен быть POST";
}