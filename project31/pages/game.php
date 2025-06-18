<?php
include_once("../configs/connect.php");
$db = connect();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new category</title>
</head>
<body>
<h1>Add new category</h1>
<form action="game.php" method="POST">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name">
    </div>
    <div>
        <label for="sector">Sector:</label>
        <select name="selector" id="selector"></select>
        <option value=""></option>
    </div>

</form>
</body>
</html>

