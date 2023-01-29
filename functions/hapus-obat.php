<?php

require __DIR__ . '/../koneksi/koneksi.php';

function submitDeleteUrl($request)
{
    global $pdo, $id;
    $query = $pdo->prepare($request);
    $query->execute([$id]);

    return $query;
}

$id = $_GET['idObat'];

$query = submitDeleteUrl("DELETE FROM tb_obat WHERE idObat = ?");

if ($query) {
    $_SESSION['berhasil'] = ['type' => true, 'message' => 'Data Berhasil dihapus'];
    header("Location: ../data-obat");
} else {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Data gagal dihapus'];
    header("Location: ../data-obat");
}
