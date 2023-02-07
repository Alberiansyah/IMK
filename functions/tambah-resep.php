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
$query = $pdo->prepare("SELECT max(idResep)as id from tb_resep");
$query->execute();
$hasilId = $query->fetch(PDO::FETCH_ASSOC);

if ($hasilId['id'] == null) {
    $id = randomUserId($karakter, 5);
} else {

    // Cek ke database jika terdapat ID yang sama
    $query = $pdo->prepare("SELECT * FROM tb_resep WHERE idResep = ? ");
    $query->execute([$userIdRandom]);
    $cekRow = $query->rowCount();

    if ($cekRow > 0) {
        // Ulangi sekali lagi untuk mencari ke database jika terdapat ID yang sama.
        $userIdRandom2 = randomUserId($karakter, 5);
        $query = $pdo->prepare("SELECT * FROM tb_resep WHERE idResep = ? ");
        $query->execute([$userIdRandom2]);
        $cekRow2 = $query->rowCount();

        if ($cekRow2 > 0) {
            // Jika tetap terdapat ID yang sama maka akan menghasilkan kode baru + 1 karakter baru.
            // Cari row paling terakhir dalam database (Mungkin masih kurang efektif, perlu perbaikan di masa berikutnya.)   
            $query = $pdo->prepare("SELECT * FROM tb_resep ORDER BY tanggalDibuat DESC LIMIT 1");
            $query->execute();
            $hasilRow = $query->fetchColumn(0);
            $hitungKarakter = strlen($hasilRow);

            // Menambah 1 karakter di akhir agar kode tidak pernah sama.
            $id = randomUserId($karakter, $hitungKarakter + 1);
        }
    } else {
        // Cari row paling terakhir dalam database (Mungkin masih kurang efektif, perlu perbaikan di masa berikutnya.)
        $query = $pdo->prepare("SELECT * FROM tb_resep ORDER BY tanggalDibuat DESC LIMIT 1");
        $query->execute();
        $hasilRow = $query->fetchColumn(0);
        $hitungKarakter = strlen($hasilRow);

        // Menghasilkan karaktek acak dengan banyak karakter 20 (Akan menambah jika semua kode acak digunakan.).
        $id = randomUserId($karakter, $hitungKarakter);
    }
}
// Akhir dari Karakter Acak

$idObat = htmlspecialchars($_POST['idObat']);
$resepInfo = htmlspecialchars($_POST['resepInfo']);
$resepDosis = htmlspecialchars($_POST['resepDosis']);

$query = $pdo->prepare("INSERT INTO tb_resep (idResep, idObat, resepInfo, resepDosis) VALUE(?, ?, ?, ?)");
$query->execute([$id, $idObat, $resepInfo, $resepDosis]);

if ($query) {
    $_SESSION['berhasil'] = ['type' => true, 'message' => 'Data berhasil ditambahkan'];
    header('Location: ../data-resep');
} else {
    $_SESSION['berhasil'] = ['type' => false, 'message' => 'Data Gagal Ditambahkan'];
    header('Location: ../data-resep');
}
