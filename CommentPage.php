<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');

// handling session login
if (isset($_SESSION['login'])) {
    $_SESSION['login'] = true;
} else {
    echo "<meta http-equiv='refresh' content='0; url=LoginPage.php'>";
    die();
}

$state = $_GET['from'];
$nama = $_SESSION['username'];
$id = $_SESSION['id'];
$idJawaban = $_GET['id'];

$yielder = new Yielder($state, $nama);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state, $nama);

$hasilJawaban = $pdo->prepare("SELECT jawaban.id_jawaban, pertanyaan.pertanyaan, jawaban.jawaban, user.username FROM jawaban INNER JOIN pertanyaan ON jawaban.id_pertanyaan = pertanyaan.id_pertanyaan INNER JOIN user ON jawaban.id_user = user.id_user WHERE jawaban.id_jawaban=".$idJawaban.";");
try {
    $hasilJawaban->execute();
    $dataJawaban = $hasilJawaban->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
// SQL GOES HERE buat komen

$hasilKomen = $pdo->prepare("SELECT user.username, komentar.komentar FROM komentar INNER JOIN user ON komentar.id_user = user.id_user WHERE komentar.id_jawaban=".$idJawaban." ORDER BY komentar.waktu DESC;");
try {
    $hasilKomen->execute();
    $dataKomen = $hasilKomen->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php echo $head ?>
<?php echo $header;?>
<div class=" bg-[#2B2D42] flex items-center justify-center flex-col">
        <div class="bg-white p-10  rounded shadow-md flex items-center justify-center flex-col my-6 w-[75%]">
            <div class="border-solid border-2 border-[#2B2D42] pb-8 w-[100%]">
                <div class="px-8 py-8 text-2xl font-semibold">
                    <b><?php echo $dataJawaban[0]['pertanyaan'] ?></b>
                </div>
                <div class="px-8">
                    <?php echo $dataJawaban[0]['jawaban'] ?>
                </div>
                <div class="pt-10 mx-8">
                    Dijawab oleh : <?php echo $dataJawaban[0]['username'] ?>
                </div>
            </div>
            <form action="controller.php?idJawaban=<?php echo $dataJawaban[0]['id_jawaban'] ?>" method="post" class="my-4 w-[100%] flex flex-col justify-center">
                <?php if (isset($_SESSION['error'])) : ?>
                    <p style="color: red; font-style: italic; margin-top: 5px;"><?php echo $_SESSION['pesan'];
                                                                                        unset($_SESSION['pesan']);
                                                                                        unset($_SESSION['error']); ?></p>
                <?php endif ?>
                <?php if (isset($_SESSION['didit'])) : ?>
                    <p style="color: blue; font-style: italic; margin-top: 5px;"><?php echo $_SESSION['pesan'];
                                                                                        unset($_SESSION['pesan']);
                                                                                        unset($_SESSION['didit']); ?></p>
                <?php endif ?>
                <input placeholder="comments..." type="text" name="Komentar" class="border border-gray-300 my-2 px-3 py-2 rounded w-[100%] " required>
                <button type="submit" name="SubmitKomentar" class="transition self-end duration-300 bg-[#D90429] w-[100px] hover:bg-[#2B2D42] text-white font-medium px-4 py-2 rounded">Submit</button>  
            </form>
            <?php foreach($dataKomen as $komen) : ?>
                <div class="border-solid border-2 border-black-500 mt-6 flex flex-col w-[100%]">
                    <div class="font-semibold px-4 mt-2 text-[25px]"><?php echo $komen['username'] ?></div>
                    <div class="px-4 py-2 text-justify">
                        <?php echo $komen['komentar'] ?>
                    </div>
                </div>
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

        $('#logot').click(function() {
            window.location.href = 'controller.php'
        })

        $('#editUserPass').click(function() {
            window.location.href = 'EditUserPage.php?id=<?php echo $id ?>'
        })
    });
</script> 


<?php echo $tail ?>