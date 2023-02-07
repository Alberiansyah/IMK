<?php

require __DIR__ . '/../koneksi/koneksi.php';

function randomUserId($id, $kekuatan = 20)
{
    $banyakKarakter = strlen($id);
    $stringAcak = '';
    for ($i = 0; $i < $kekuatan; $i++) {
        $karakaterAcak = $id[mt_rand(0, $banyakKarakter - 1)];
        $stringAcak .= $karakaterAcak;
    }

    return $stringAcak;
}

global $pdo;
date_default_timezone_set('Asia/Jakarta');

// Karakter Acak
$karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.';
$userIdRandom = randomUserId($karakter, 5);

// Cek apakah ada data di dalam database
$query = $pdo->prepare("SELECT max(idUser)as id from tb_users");
$query->execute();
$hasilId = $query->fetch(PDO::FETCH_ASSOC);

if ($hasilId['id'] == null) {
    $id = randomUserId($karakter, 5);
} else {

    // Cek ke database jika terdapat ID yang sama
    $query = $pdo->prepare("SELECT * FROM tb_users WHERE idUser = ? ");
    $query->execute([$userIdRandom]);
    $cekRow = $query->rowCount();

    if ($cekRow > 0) {
        // Ulangi sekali lagi untuk mencari ke database jika terdapat ID yang sama.
        $userIdRandom2 = randomUserId($karakter, 5);
        $query = $pdo->prepare("SELECT * FROM tb_users WHERE idUser = ? ");
        $query->execute([$userIdRandom2]);
        $cekRow2 = $query->rowCount();

        if ($cekRow2 > 0) {
            // Jika tetap terdapat ID yang sama maka akan menghasilkan kode baru + 1 karakter baru.
            // Cari row paling terakhir dalam database (Mungkin masih kurang efektif, perlu perbaikan di masa berikutnya.)   
            $query = $pdo->prepare("SELECT * FROM tb_users ORDER BY tanggalDibuat DESC LIMIT 1");
            $query->execute();
            $hasilRow = $query->fetchColumn(0);
            $hitungKarakter = strlen($hasilRow);

            // Menambah 1 karakter di akhir agar kode tidak pernah sama.
            $id = randomUserId($karakter, $hitungKarakter + 1);
        }
    } else {
        // Cari row paling terakhir dalam database (Mungkin masih kurang efektif, perlu perbaikan di masa berikutnya.)
        $query = $pdo->prepare("SELECT * FROM tb_users ORDER BY tanggalDibuat DESC LIMIT 1");
        $query->execute();
        $hasilRow = $query->fetchColumn(0);
        $hitungKarakter = strlen($hasilRow);

        // Menghasilkan karaktek acak dengan banyak karakter 20 (Akan menambah jika semua kode acak digunakan.).
        $id = randomUserId($karakter, $hitungKarakter);
    }
}
// Akhir dari Karakter Acak

$idLevel  = htmlspecialchars($_POST['idLevel']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$password1 = htmlspecialchars($_POST['password1']);
$nama = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$jk = htmlspecialchars($_POST['jk']);
$noTelp = htmlspecialchars($_POST['noTelp']);
$alamat = htmlspecialchars($_POST['alamat']);

// Cek Password
if ($password != $password1) {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Gagal menambahkan, konfirmasi password tidak sama'];
    header('Location: ../data-dokter');
    exit();
}

// Cek username & email
$query = $pdo->prepare("SELECT * FROM tb_users WHERE email = ? OR username = ? ");
$query->execute([$email, $username]);
$cekEmailUsername = $query->rowCount();

if ($cekEmailUsername > 0) {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Gagal menambahkan, Username/Email telah digunakan'];
    header('Location: ../data-dokter');
    exit();
}

// Encrypt Password
$passwordEncrypt = password_hash($password, PASSWORD_DEFAULT);

$query = $pdo->prepare("INSERT INTO tb_users (idUser, idLevel, username, password, nama, email, jk, noTelp, alamat) VALUE( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->execute([$id, $idLevel, $username, $passwordEncrypt, $nama, $email, $jk, $noTelp, $alamat]);

if ($query) {
    $_SESSION['berhasil'] = ['type' => true, 'message' => 'Data berhasil ditambahkan'];
    header('Location: ../data-dokter');
} else {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Data Gagal Ditambahkan'];
    header('Location: ../data-dokter');
}
