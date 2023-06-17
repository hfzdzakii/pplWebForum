<?php
session_start();
include_once('connectDb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['LoginButton'])) {
        $username = strtolower(stripslashes($_POST['UsernameLogin']));
        $password = $_POST['PasswordLogin'];
        // cek username di db
        $cek_username = $pdo->prepare("SELECT * FROM 'user' WHERE 'username' = '$username'; ");
        try{
            $cek_username->execute();
            if($cek_username->rowCount()==1){
                //cek password
                $baris = $cek_username->fetchAll(PDO::FETCH_ASSOC);
                if(password_verify($password,$baris[0]['password'])){
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $barisp[0]['username'];
                    $_SESSION['akses'] = $baris[0]['akses'];
                    echo "<meta http-equiv='refresh' content='0; url=HomePage.php'>";
                    die();
                }
            }
        } catch(PDOException $e){
            echo "Error " . $e->getMessage();
        }
        $_SESSION['error'] = 'Usernmae dan Password Tidak Cocok';
        echo "<meta http-equiv='refresh' content='0; url=LoginPage.php'>";
        die();

        
        // $_SESSION['pesan'] = '';
        // die();
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
