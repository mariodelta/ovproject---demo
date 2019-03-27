<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "OV";

$_ENV['conn'] = new mysqli($servername, $username, $password, $database);

if ($_ENV['conn']->connect_error) {
    die("Connection failed: " . $_ENV['conn']->connect_error);
}
?>