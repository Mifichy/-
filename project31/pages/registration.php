<h3>Registration Form</h3>
<?php
require_once '../configs/connect.php';
require_once 'functions.php';
if(!isset($_POST['regbtn']))
{
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
    <form method="post">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="form-group">
            <label for="pass1">Password:</label>
            <input type="password" class="form-control" name="pass1">
        </div>
        <div class="form-group">
            <label for="pass2">Confirm Password:</label>
            <input type="password" class="form-control" name="pass2">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email">
        </div>
        <button type="submit" class="btn btn-primary" name="regbtn">Register</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        <script src ="js/bootstrap.min.js"></script>
    <?php
}
else
{
    if(register($_POST['login'],$_POST['pass1'],$_POST['email']))
    {
        echo "<h3/><span style='color:green;'>New User Added!</span><h3/>";
    }
}
?>
