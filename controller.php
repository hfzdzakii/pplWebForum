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
    } else if(isset($_POST['AjukanPertanyaanButton'])) {
        $_SESSION['pesan'] = '';

        $idUser = $_GET['id'];
        $pertanyaan = $_POST['AjukanPertanyaan'];
        $waktu = time();

        $query = $pdo->prepare("INSERT INTO pertanyaan VALUES (null, :idUser, :pertanyaan, :waktu);");
        $query->bindParam(':idUser', $idUser);
        $query->bindParam(':pertanyaan', $pertanyaan);
        $query->bindParam(':waktu', $waktu);

        try {
            $query->execute();
            $_SESSION['didit'] = true;
            $_SESSION['pesan'] = "Pertanyaan Anda Berhasil Ditambah!";
            goto enddd;
        } catch (PDOException $e) {
            $_SESSION['error'] = true;
            $_SESSION['pesan'] = "Ada sesuatu yang salah!";
            echo $e->getMessage();
            goto enddd;
        }
        enddd:
        echo "<meta http-equiv='refresh' content='0; url=HomePage.php'>";
    } else if(isset($_POST['kirimJawaban'])) {
        $idPertanyaan = $_GET['idPertanyaan'];
        $idUser = $_SESSION['id'];
        $content = $_POST['content'];
        $username = $_POST['sebagai'];
        $waktu = time();

        $insert_query = $pdo->prepare("INSERT into jawaban values(null, :idPertanyaan , :content, 0, :idUser, :username, :waktu)");
        $insert_query->bindParam(':idPertanyaan', $idPertanyaan);
        $insert_query->bindParam(':content', $content);
        $insert_query->bindParam(':idUser', $idUser);
        $insert_query->bindParam(':username', $username);
        $insert_query->bindParam(':waktu', $waktu);
        try {
            $insert_query->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        echo "<meta http-equiv='refresh' content='0; url=NewestPage.php'>";
        die();
    } else if(isset($_POST['SubmitKomentar'])) {
        $_SESSION['pesan'] = '';

        $idJawaban = $_GET['idJawaban'];
        $idUser = $_SESSION['id'];
        $komentar = $_POST['Komentar'];
        $waktu = time();

        $query = $pdo->prepare("INSERT INTO komentar VALUES (null, :idJawaban, :idUser, :komentar, :waktu);");
        $query->bindParam(':idJawaban', $idJawaban);
        $query->bindParam(':idUser', $idUser);
        $query->bindParam(':komentar', $komentar);
        $query->bindParam(':waktu', $waktu);

        try {
            $query->execute();
            $_SESSION['didit'] = true;
            $_SESSION['pesan'] = "Komentar Anda Berhasil Ditambah!";
            goto ennddd;
        } catch (PDOException $e) {
            $_SESSION['error'] = true;
            $_SESSION['pesan'] = "Ada sesuatu yang salah!";
            echo $e->getMessage();
            goto ennddd;
        }
        ennddd:
        echo "<meta http-equiv='refresh' content='0; url=CommentPage.php?id=".$idJawaban."'>";
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
