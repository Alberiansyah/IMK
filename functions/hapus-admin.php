<?php

require __DIR__ . '/../koneksi/koneksi.php';

function submitDeleteUrl($request)
{
    global $pdo, $id;
    $query = $pdo->prepare($request);
    $query->execute([$id]);

    return $query;
}

$id = $_GET['idUser'];
$nama = $_GET['nama'];

$query = submitDeleteUrl("DELETE FROM tb_users WHERE idUser = ?");

if ($query) {
    $_SESSION['berhasil'] = 'Berhasil';
    header("Location: ../data-admin");
} else {
    $_SESSION['berhasil'] = 'Gagal';
    header("Location: ../data-admin");
}
