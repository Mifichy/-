<?php
// Всегда начинаем сессию в начале
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once('functions.php');

// Обработка POST-запросов должна быть ДО любого вывода HTML
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ex'])) {
        // Выход пользователя
        unset($_SESSION['ruser']);
        unset($_SESSION['radmin']);
        header('Location: '.$_SERVER['PHP_SELF']);
        exit;
    } elseif (isset($_POST['press'])) {
        // Попытка входа
        if (login($_POST['login'], $_POST['pass'])) {
            header('Location: '.$_SERVER['PHP_SELF']);
            exit;
        }
    }
}

// Отображение форм
if (isset($_SESSION['ruser'])) {
    echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']);
    if (isset($_GET['page'])) {
        echo '?page='.htmlspecialchars($_GET['page']);
    }
    echo '" class="form-inline pull-right" method="post">';
    echo '<h4> Hello, <span>'.htmlspecialchars($_SESSION['ruser']).'</span>&nbsp;';
    echo '<input type="submit" value="Logout" id="ex" name="ex" class="btn btn-default btn-xs"></h4>';
    echo '</form>';
} else {
    echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']);
    if (isset($_GET['page'])) {
        echo '?page='.htmlspecialchars($_GET['page']);
    }
    echo '" class="input-group input-group-sm pull-right" method="post">';
    echo '<input type="text" name="login" size="10" class="" placeholder="login" required>
          <input type="password" name="pass" size="10" class="" placeholder="password" required>
          <input type="submit" id="press" value="Login" class="btn btn-default btn-xs" name="press">
          </form>';
}
?>