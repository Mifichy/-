<?php

include_once('functions.php');
$db = connect();

// получение id из GET-запроса
$sector_id = isset($_GET['sector_id']) ? intval($_GET['sector_id']) : null;

if($sector_id){
    $query = "SELECT * FROM categories WHERE sector_id = $sector_id";
    $res = mysqli_query($db,$query);

    if(!$res){
        die("ошибка выполнения запроса: ".mysqli_error($db));
    }

    $categories = [];
    while($row = mysqli_fetch_assoc($res)){
        $categories[] = $row;
    }
}
else{
    header('Location:\project31/index.php');
    exit();
}

mysqli_close($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            background: linear-gradient(135deg, #4CAF50, #81C784);
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        a {

            text-decoration: none;
            color:#2a572a;
            padding: 10px;
            border-radius: 5px;
            display: block;
            transition: background-color 0.3s, color 0.3s;
            background: #7ABF78;
            background: linear-gradient(90deg,rgba(122, 191, 120, 1) 11%, rgba(255, 255, 255, 0) 100%);
            color: #1B5E20;
        }

        a:hover {
            background-color: #7abf78;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Наши игры</h1>
<ul>
    <?php foreach($categories as $category): ?>
        <li>
            <a href="products.php?category_id=<?php echo $category['id'];?>">
                <?php echo htmlspecialchars($category['name']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
