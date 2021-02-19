<?php

$server = 'sistemasdeinf.xp3.biz';
$username = '246578';
$password = '';
$database = '246578';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
