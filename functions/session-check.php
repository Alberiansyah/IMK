<?php
// Check session
if ($_SESSION['idLevel'] === '9lKih') {
    header("Location: wp-resources/dokter/home");
    exit;
}

if (!isset($_SESSION['username']) && !isset($_SESSION['idLevel'])) {
    $containUrl = urlencode((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    header("Location: index?destination=" . $containUrl . "");
    die;
}
