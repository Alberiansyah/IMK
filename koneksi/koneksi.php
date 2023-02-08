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
$hostToResources = 'http://localhost/UNIKOM/IMK/wp-resources/';
$title = 'IMK | Klinik';
$version = 'Build 1.0';

session_start();
