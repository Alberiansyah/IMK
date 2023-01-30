<?php
require __DIR__ . '/../koneksi/koneksi.php';

date_default_timezone_set('Asia/Jakarta');

$id = htmlspecialchars($_POST['idUser']);
$nama = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$password1 = htmlspecialchars($_POST['password1']);
$noTelp = htmlspecialchars($_POST['noTelp']);
$alamat = htmlspecialchars($_POST['alamat']);

// Cek Password
if ($password != $password1) {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Gagal menambahkan, konfirmasi password tidak sama'];
    header('Location: ../data-pasien');
    exit();
}

// Encrypt Password
$passwordEncrypt = password_hash($password, PASSWORD_DEFAULT);

$query = $pdo->prepare("UPDATE tb_users SET
                                        nama = ?,
                                        email = ?,
                                        password = ?,
                                        noTelp = ?,
                                        alamat = ?,
                                        tanggalDiubah = ?
                                        WHERE idUser = ?
                        ");
$query->execute([$nama, $email, $passwordEncrypt, $noTelp, $alamat, null, $id]);

if ($query) {
    $_SESSION['berhasil'] = ['type' => true, 'message' => 'Data berhasil diperbaharui'];
    header('Location: ../data-pasien');
} else {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Data gagal diperbaharui'];
    header('Location: ../data-pasien');
}
