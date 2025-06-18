<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['radmin']))
{
    echo "<h3/><span style='color:red;'>For Administrators Only!</span><h3/>";
    exit();
}

?>



<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">

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
<div>
    <p>dskog[vs</p>
</div>