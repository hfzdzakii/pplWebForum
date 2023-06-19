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

$state = "KumpulanPage";
$nama = $_SESSION['username'];
$id = $_SESSION['id'];

$yielder = new Yielder($state, $nama);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state, $nama);

// SQL GOES HERE
$daftarPertanyaan = $pdo->prepare("SELECT pertanyaan.id_pertanyaan as id, pertanyaan.pertanyaan as tanya, user.username as nama FROM `pertanyaan` INNER JOIN user ON pertanyaan.id_user = user.id_user ORDER BY waktu DESC;");
try {
    $daftarPertanyaan->execute();
    $Pertanyaan = $daftarPertanyaan->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php echo $head ?>
<?php echo $header ?>
<div class="min-h-[100vh] w-[100vw] bg-[#EDF2F4] flex items-center flex-col">
    <div class="w-[60%] flex items-center items-center flex-col">
        <?php foreach($Pertanyaan as $baris) : ?>
            <a href="JawabPage.php?idPertanyaan=<?php echo $baris['id'] ?>" class="w-[100%] bg-white rounded-md border-solid border-2 border-[#2B2D42] pb-8 mt-4">
                <div class="px-8 py-2 text-2xl font-semibold">
                    <b><?php echo $baris['tanya'] ?></b>
                </div>
                <div class="px-8">
                    Ditanyakan oleh : <?php echo $baris['nama'] ?>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dropdown-toggle').click(function() {
            $('#dropdown-menu').toggleClass('hidden');
        });
        
        $('#logot').click(function() {
            window.location.href = 'controller.php'
        })

        $('#editUserPass').click(function() {
            window.location.href = 'EditUserPage.php?id=<?php echo $id ?>'
        })
    })
</script>

<?php echo $tail ?>