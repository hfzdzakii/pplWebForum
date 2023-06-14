<?php
session_start();
include_once('connectDb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['something'])) {
        $_SESSION['pesan'] = '';
        die();
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['username']);
        unset($_SESSION['akses']);
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        die();
    }
} else {
    if (isset($_GET['aksi'])) {
        $aksi = $_GET['aksi'];
        $_SESSION['pesan'] = '';
        if ($aksi == 'deleteUser') {
            die();
        } else {
            unset($_SESSION['login']);
            unset($_SESSION['username']);
            unset($_SESSION['akses']);
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
            die();
        }
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['username']);
        unset($_SESSION['akses']);
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        die();
    }
}
