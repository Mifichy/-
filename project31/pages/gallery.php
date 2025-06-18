<?php
require_once '../configs/connect.php'; // Подключаем файл с функцией connect()

// Подключаемся к базе данных
$db = connect();

// Получаем изображения из базы данных
$query = "SELECT id, title, image_path, description FROM images ORDER BY upload_date DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотогалерея</title>
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .gallery-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            transition: transform 0.3s;
        }
        .gallery-item:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 3px;
        }
        .gallery-title {
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
        }
        .gallery-description {
            margin-top: 5px;
            font-size: 0.9em;
            color: #555;
            text-align: center;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }
    </style>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <header class="col-sm-12 col-md-12 col-lg-12">
            <?php
            include_once('login.php');
            ?>
        </header>
    </div>
    <div class="row">
        <nav class="col-sm-12 col-md-12 col-lg-12">
            <?php
            include_once('menu.php');

            ?>
        </nav>
    </div>
<h1>Наша фотогалерея</h1>

<div class="gallery">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="gallery-item">
                <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="gallery-image">
                <div class="gallery-title"><?php echo htmlspecialchars($row['title']); ?></div>
                <?php if (!empty($row['description'])): ?>
                    <div class="gallery-description"><?php echo htmlspecialchars($row['description']); ?></div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="grid-column: 1 / -1; text-align: center;">В галерее пока нет фотографий.</p>
    <?php endif; ?>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    <script src ="js/bootstrap.min.js"></script>
</html>
<?php
$db->close();?>