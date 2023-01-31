<?php
if (isset($_SESSION['username']) && isset($_SESSION['idLevel'])) {
    if ($_SESSION['idLevel'] == '9lKih') {
        header('Location: wp-resources/dokter/home');
        exit;
    }
    header('Location: home');
    exit;
}
