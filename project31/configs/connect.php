<?php
function connect(
    $servername = "localhost",
    $username = "root",
    $password = "",
    $dbname = "project"
) {
    $db = new mysqli($servername, $username, $password, $dbname);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    return $db;
}