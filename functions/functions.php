<?php

require __DIR__ . '/../koneksi/koneksi.php';

function tampilUserArray($request, $array)
{
    global $pdo;
    $query = $pdo->prepare($request);
    $query->execute($array);
    $row = $query->fetch(PDO::FETCH_OBJ);

    return $row;
}

function tampilData($request)
{
    global $pdo;
    $query = $pdo->prepare($request);
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_OBJ);

    return $row;
}

function tampilDataFetchOnly($request)
{
    global $pdo;
    $query = $pdo->prepare($request);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    return $row;
}
