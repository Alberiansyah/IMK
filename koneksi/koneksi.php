<?php
$host = "localhost";
$dbname = "imk_klinik";
$user   = "root";
$pass   = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$hostToRoot = 'http://localhost/UNIKOM/IMK/';
$title = 'IMK | Klinik';
$version = 'Beta Build 1.4';

session_start();
