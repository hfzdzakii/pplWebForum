<?php
session_start();
include_once('connectDb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['LoginButton'])) {
        $username = strtolower(stripslashes($_POST['UsernameLogin']));
        $password = $_POST['PasswordLogin'];
        // cek username di db
        $cek_username = $pdo->prepare("SELECT * FROM user WHERE username = '$username'; ");
        try{
            $cek_username->execute();
            if($cek_username->rowCount()==1){
                // cek password
                $baris = $cek_username->fetchAll(PDO::FETCH_ASSOC);
                if(password_verify($password,$baris[0]['password'])){
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $baris[0]['id_user'];
                    $_SESSION['username'] = $baris[0]['username'];
                    $_SESSION['akses'] = $baris[0]['akses'];
                    echo "<meta http-equiv='refresh' content='0; url=HomePage.php'>";
                    die();
                }
            }
        } catch(PDOException $e){
            echo "Error " . $e->getMessage();
        }
        $_SESSION['error'] = 'Username dan Password Tidak Cocok';
        echo "<meta http-equiv='refresh' content='0; url=LoginPage.php'>";
        die();
    } else if(isset($_POST['RegisterButton'])){
        $_SESSION['pesan'] = '';

        $username = strtolower(stripslashes($_POST['Username']));
        $password1 = $_POST['Password'];
        $password2 = $_POST['ConfirmPassword'];

        // cek duplikat username di DB
        $cek_user = $pdo->prepare("SELECT `username` FROM `user` WHERE `username` = '$username';");
        try {
            $cek_user->execute();
            if ($cek_user->fetchAll(PDO::FETCH_ASSOC)) {
                $_SESSION['error'] = true;
                $_SESSION['pesan'] = "Username sudah digunakan";
                goto end;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // cek kemiripan password dan konfirmasi password
        if ($password1 !== $password2) {
            $_SESSION['error'] = true;
            $_SESSION['pesan'] = "Konfirmasi Password tidak sesuai!";
            goto end;
        }

        // enkripsi password
        $password = password_hash($password1, PASSWORD_DEFAULT);

        // masukan data ke DB
        $query = $pdo->prepare("INSERT INTO `user` VALUES(null, :usrname, :pass, 'customer');");
        $query->bindParam(':usrname', $username);
        $query->bindParam(':pass', $password);

        // cek kesuksesan data masuk DB
        try {
            $query->execute();
            $_SESSION['didit'] = true;
            $_SESSION['pesan'] = "User Baru berhasil ditambahkan!";
            goto end;
        } catch (PDOException $e) {
            $_SESSION['error'] = true;
            $_SESSION['pesan'] = "Ada sesuatu yang salah!";
            echo $e->getMessage();
            goto end;
        }
        end:
        echo "<meta http-equiv='refresh' content='0; url=RegisterPage.php'>";
    }else if(isset($_POST['SubmitEdit'])) {
        $_SESSION['pesan'] = '';

        $id = $_GET['id'];
        $username = strtolower(stripslashes($_POST['UsernameEdit']));
        $password1 = $_POST['PasswordEdit'];
        $password2 = $_POST['PasswordConfirmEdit'];

        if ($password1 !== $password2) {
            $_SESSION['error'] = true;
            $_SESSION['pesan'] = "Konfirmasi Password tidak sesuai!";
            goto endd;
        }

        $password = password_hash($password1, PASSWORD_DEFAULT);

        $update_user = $pdo->prepare("UPDATE user SET username = :username, password = :password WHERE id_user = :id");
        $update_user->bindParam(':username', $username);
        $update_user->bindParam(':password', $password);
        $update_user->bindParam(':id', $id);

        try {
            $update_user->execute();
            $_SESSION['didit'] = true;
            $_SESSION['pesan'] = "Akun Anda berhasil diupdate!";
            $_SESSION['username'] = $username;
            goto endd;
        } catch (PDOException $e) {
            $_SESSION['error'] = true;
            $_SESSION['pesan'] = "Ada sesuatu yang salah!";
            echo $e->getMessage();
            goto endd;
        }

        endd:
        echo "<meta http-equiv='refresh' content='0; url=EditUserPage.php?id=".$id."'>";
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['username']);
        unset($_SESSION['akses']);
        echo "<meta http-equiv='refresh' content='0; url=LoginPage.php'>";
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
            echo "<meta http-equiv='refresh' content='0; url=LoginPage.php'>";
            die();
        }
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['username']);
        unset($_SESSION['akses']);
        echo "<meta http-equiv='refresh' content='0; url=LoginPage.php'>";
        die();
    }
}
