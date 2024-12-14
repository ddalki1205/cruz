<?php
$config = include __DIR__ . '/../config/config.php';
$host = $config['db']['host'];
$user = $config['db']['user'];
$password = $config['db']['password'];
$database = $config['db']['name'];

$dbconnect = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$dbconnect) {
  die('Connection failed: ' . mysqli_connect_error());
}