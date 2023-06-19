<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');

if (isset($_SESSION['login'])) {
    $_SESSION['login'] = true;
} else {
    echo "<meta http-equiv='refresh' content='0; url=LoginPage.php'>";
    die();
}

$state = "MyPostPage";
$nama = $_SESSION['username'];
$id = $_SESSION['id'];
$akses = $_SESSION['akses'];

$yielder = new Yielder($state, $nama);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state, $nama);

// SQL GOES HERE

if ($akses == "admin") {
    $kumpJawaban = $pdo->prepare("SELECT jawaban.id_jawaban, jawaban.jawaban, user.username from jawaban INNER JOIN user ON jawaban.id_user = user.id_user ORDER BY jawaban.waktu DESC;");
    $kumpPertanyaan = $pdo->prepare("SELECT pertanyaan.id_pertanyaan, pertanyaan.pertanyaan, user.username FROM pertanyaan INNER JOIN user ON pertanyaan.id_user = user.id_user ORDER BY pertanyaan.waktu DESC;");
} else {
    $kumpJawaban = $pdo->prepare("SELECT jawaban.id_jawaban, jawaban.jawaban, user.username from jawaban INNER JOIN user ON jawaban.id_user = user.id_user WHERE jawaban.id_user=".$id." ORDER BY jawaban.waktu DESC;");
    $kumpPertanyaan = $pdo->prepare("SELECT pertanyaan.id_pertanyaan, pertanyaan.pertanyaan, user.username FROM pertanyaan INNER JOIN user ON pertanyaan.id_user = user.id_user WHERE pertanyaan.id_user=".$id." ORDER BY pertanyaan.waktu DESC;");
}

try {
    $kumpJawaban->execute();
    $Jawaban = $kumpJawaban->fetchAll(PDO::FETCH_ASSOC);
    $kumpPertanyaan->execute();
    $Pertanyaan = $kumpPertanyaan->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<?php echo $head ?>
<?php echo $header ?>
<div class="min-h-[100vh] w-[100vw] bg-[#EDF2F4] flex justify-around items-center px-10">
    <div class="w-[42%] flex items-center items-center flex-col">
        <div class="text-[30px] text-left w-[100%] font-semibold">
            Kumpulan Jawaban
        </div>
        <div class="flex flex-col w-[100%] h-[500px] overflow-y-auto">
            <?php foreach($Jawaban as $jawaban): ?>
                <a href="" class="w-[100%] bg-white rounded-md border-solid border-2 border-[#2B2D42] pb-8 mt-4">
                    <div class="px-8 py-2 text-2xl font-semibold">
                        <b><?php echo $jawaban['jawaban'] ?></b>
                    </div>
                    <?php if($akses == "admin") : ?>
                        <div class="px-8">
                            Dijawab oleh : <?php echo $jawaban['username'] ?>
                        </div>
                    <?php endif ?>
                </a>
            <?php endforeach ?>
        </div>
    </div>
    <div class="w-[5%]"></div>
    <div class="w-[42%] flex items-center items-center flex-col">
        <div class="text-[30px] text-left w-[100%] font-semibold">
            Kumpulan Pertanyaan
        </div>
        <?php if (isset($_SESSION['error'])) : ?>
            <p style="color: red; font-style: italic; margin-bottom: 1rem;"><?php echo $_SESSION['pesan'];
                                                                                unset($_SESSION['pesan']);
                                                                                unset($_SESSION['error']); ?></p>
        <?php endif ?>
        <?php if (isset($_SESSION['didit'])) : ?>
            <p style="color: blue; font-style: italic; margin-bottom: 1rem;"><?php echo $_SESSION['pesan'];
                                                                                unset($_SESSION['pesan']);
                                                                                unset($_SESSION['didit']); ?></p>
        <?php endif ?>
        <div class="flex flex-col w-[100%] h-[500px] overflow-y-auto">
            <?php foreach($Pertanyaan as $pertanyaan) : ?>
                <a href="" class="w-[100%] bg-white rounded-md border-solid border-2 border-[#2B2D42] pb-8 mt-4">
                    <div class="px-8 py-2 text-2xl font-medium">
                        <b><?php echo $pertanyaan['pertanyaan'] ?></b>
                    </div>
                    <?php if($akses == "admin") : ?>
                        <div class="px-8">
                            Ditanyakan oleh : <?php echo $pertanyaan['username'] ?>
                        </div>
                    <?php endif ?>
                </a>
                <div class="mt-2 flex">
                    <!-- <a href=""><img width="30" height="30" src="https://img.icons8.com/ios/30/edit--v1.png" alt="edit--v1"/></a> -->
                    <a href="controller.php?aksi=DeletePertanyaan&idPert=<?php echo $pertanyaan['id_pertanyaan'] ?>" class="ml-4 right-0 top-6"><img width="30" height="30" src="https://img.icons8.com/fluency-systems-regular/30/filled-trash.png" alt="filled-trash"/></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dropdown-toggle').click(function() {
            $('#dropdown-menu').toggleClass('hidden');
        });

        $('#myPost').click(function() {
            window.location.href = 'MyPostPage.php'
        })

        $('#logot').click(function() {
            window.location.href = 'controller.php'
        })

        $('#editUserPass').click(function() {
            window.location.href = 'EditUserPage.php?id=<?php echo $id ?>'
        })
    })
</script>

<?php echo $tail ?>