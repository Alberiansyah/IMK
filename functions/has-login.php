<?php
if (isset($_SESSION['username']) && isset($_SESSION['idLevel'])) {
    header('Location: home');
    exit;
}
