<?php
require __DIR__ . '/../../../koneksi/koneksi.php';

date_default_timezone_set('Asia/Jakarta');

$id = htmlspecialchars($_POST['idResep']);
$resepInfo = htmlspecialchars($_POST['resepInfo']);
$resepDosis = htmlspecialchars($_POST['resepDosis']);


$query = $pdo->prepare("UPDATE tb_resep SET
                                        resepInfo = ?,
                                        resepDosis = ?,
                                        tanggalDiubah = ?
                                        WHERE idResep = ?
                        ");
$query->execute([$resepInfo, $resepDosis, null, $id]);

if ($query) {
    $_SESSION['berhasil'] = ['type' => true, 'message' => 'Data berhasil diperbaharui'];
    header('Location: ../data-resep');
} else {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Data gagal diperbaharui'];
    header('Location: ../data-resep');
}
