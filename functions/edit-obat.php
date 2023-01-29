<?php
require __DIR__ . '/../koneksi/koneksi.php';

date_default_timezone_set('Asia/Jakarta');

$id = htmlspecialchars($_POST['idObat']);
$namaObat = htmlspecialchars($_POST['namaObat']);
$stokObat = htmlspecialchars($_POST['stokObat']);
$jenisObat = htmlspecialchars($_POST['jenisObat']);
$hargaObat = htmlspecialchars($_POST['hargaObat']);

$query = $pdo->prepare("UPDATE tb_obat SET
                                        namaObat = ?,
                                        stokObat = ?,
                                        jenisObat = ?,
                                        hargaObat = ?,
                                        tanggalDiubah = ?
                                        WHERE idObat = ?
                        ");
$query->execute([$namaObat, $stokObat, $jenisObat, $hargaObat, null, $id]);

if ($query) {
    $_SESSION['berhasil'] = ['type' => true, 'message' => 'Data berhasil diperbaharui'];
    header('Location: ../data-obat');
} else {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Data gagal diperbaharui'];
    header('Location: ../data-obat');
}
