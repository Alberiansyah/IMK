<?php
require __DIR__ . '/../koneksi/koneksi.php';

$usernameEmail = $_POST['usernameEmail'];
$password = $_POST['password'];
$query = $pdo->prepare("SELECT * FROM tb_users WHERE email = ? OR username = ?");
$query->execute([$usernameEmail, $usernameEmail]);
$checkRow = $query->rowCount();
if ($checkRow === 1) {
    // Cari password di dalam database.
    $queryAssoc = $query->fetch(PDO::FETCH_OBJ);
    // Mencocokkan data.
    if (password_verify($password, $queryAssoc->password)) {
        $_SESSION['idUser'] = $queryAssoc->idUser;
        $_SESSION['username'] = $queryAssoc->username;
        $_SESSION['nama'] = $queryAssoc->nama;
        $_SESSION['idLevel'] = $queryAssoc->idLevel;
        if ($_SESSION['destination']) {
            $urlReturnTo = $_SESSION['destination'];
            header("Location: " . $urlReturnTo . "");
            unset($_SESSION['destination']);
            exit();
        } else {
            header('Location: ../home');
            exit();
        }
    } else {
        $_SESSION['gagal'] = ['type' => false, 'message' => 'Email atau Nama Pengguna/Kata Sandi tidak sah.'];
        header('Location: ../index');
        exit();
    }
} else {
    $_SESSION['gagal'] = ['type' => false, 'message' => 'Email atau Nama Pengguna/Kata Sandi tidak sah.'];
    header('Location: ../index');
    exit();
}
