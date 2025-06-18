<?php
global $config;
require_once '../configs/config.php';
?>

<ul class="nav nav-pills nav-justified">
    <li>
        <a href="<?php echo $config['base_url']; ?>pages/games.php">Игры</a>
    </li>
    <li>
        <a href="<?php echo $config['base_url']; ?>pages/gallery.php">Галерея</a>
    </li>
    <li>
        <a href="<?php echo $config['base_url']; ?>pages/registration.php">Регистрация</a>
    </li>
    <li>
        <a href="<?php echo $config['base_url']; ?>pages/admin.php">Admin forms</a>
    </li>
</ul>


