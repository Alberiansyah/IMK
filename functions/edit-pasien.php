<?php
require __DIR__ . '/../koneksi/koneksi.php';

date_default_timezone_set('Asia/Jakarta');

$id = htmlspecialchars($_POST['idUser']);
$nama = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$noTelp = htmlspecialchars($_POST['noTelp']);
$alamat = htmlspecialchars($_POST['alamat']);

$query = $pdo->prepare("UPDATE tb_users SET
                                        nama = ?,
                                        email = ?,
                                        noTelp = ?,
                                        alamat = ?,
                                        tanggalDiubah = ?
                                        WHERE idUser = ?
                        ");
$query->execute([$nama, $email, $noTelp, $alamat, null, $id]);

if ($query) {
    $_SESSION['berhasil'] = ['type' => true, 'message' => 'Data berhasil diperbaharui'];
    header('Location: ../data-pasien');
} else {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Data gagal diperbaharui'];
    header('Location: ../data-pasien');
}
