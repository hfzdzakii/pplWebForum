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
$akses = $_SESSION['akses'];

$yielder = new Yielder($state, $nama);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state, $nama);

// SQL GOES HERE
$daftarPertanyaan = $pdo->prepare("SELECT pertanyaan.id_pertanyaan as id, pertanyaan.pertanyaan as tanya, user.username as nama FROM `pertanyaan` INNER JOIN user ON pertanyaan.id_user = user.id_user;");
try {
    $daftarPertanyaan->execute();
    $Pertanyaan = $daftarPertanyaan->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php echo $head ?>
<?php echo $header ?>
<div class=" bg-[#EDF2F4] flex items-center justify-center flex-col px-80">
    <div class="p-10 flex items-center justify-center flex-col mt-1">
        <?php foreach($Pertanyaan as $baris) : ?>
            <a href="" class="w-[100%] bg-white rounded-md border-solid border-2 border-[#2B2D42] pb-8 mb-8">
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

        $(document).click(function(e) {
            const target = e.target;
            if (!target.closest('#dropdown-toggle')) {
                $('#dropdown-menu').addClass('hidden');
            }
        });
    })
</script>

<?php echo $tail ?>