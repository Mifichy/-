<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $db = connect();

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    // Обработка загрузки файла
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        // Сохраняем информацию в БД
        $stmt = $db->prepare("INSERT INTO images (title, image_path, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $targetPath, $description);

        if ($stmt->execute()) {
            header("Location: gallery.php"); //?success=1
            exit();
        } else {
            echo "Ошибка при сохранении в базу данных: " . $db->error;
        }
    } else {
        echo "Ошибка при загрузке файла.";
    }

    $db->close();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка изображения</title>
</head>
<body>
<h1>Загрузить новое изображение</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="title">Название:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Описание:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="image">Изображение:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
    </div>
    <button type="submit">Загрузить</button>
</form>
</body>
</html>