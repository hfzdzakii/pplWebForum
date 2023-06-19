<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');

// if (isset($_SESSION['login'])) {
//     $_SESSION['login'] = true;
// } else {
//     echo "<meta http-equiv='refresh' content='0; url=LoginPage.php'>";
//     die();
// }

$state = "KumpulanPage";
$nama = $_SESSION['username'];
$id = $_SESSION['id'];

$yielder = new Yielder($state, $nama);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state, $nama);

// SQL GOES HERE

?>

<?php echo $head ?>
<?php echo $header ?>
<div class="min-h-[100vh] w-[100vw] bg-[#EDF2F4] flex items-center flex-col">
    <div class="w-[60%] flex items-center items-center flex-col">
        <div class="text-[30px] text-left w-[100%]">
            Kumpulan Jawabanku
        </div>
        <a href="" class="w-[100%] bg-white rounded-md border-solid border-2 border-[#2B2D42] pb-8 mt-4">
            <div class="px-8 py-2 text-2xl font-semibold">
                <b>isi jawaban</b>
            </div>
            <div class="px-8">
                Jawaban dari pertanyan : dfasafsfa
            </div>
        </a>
    </div>
    <div class="border border-black w-[60%] flex items-center items-center mt-4">

    </div>
    <div class="w-[60%] flex items-center items-center flex-col">
        <div class="text-[30px] text-left w-[100%]">
            Kumpulan Pertanyaanku
        </div>
        <a href="" class="w-[100%] bg-white rounded-md border-solid border-2 border-[#2B2D42] pb-8 mt-4">
            <div class="px-8 py-2 text-2xl font-semibold">
                <b>pertanyaan</b>
            </div>
            <div class="px-8">
                Ditanyakan oleh : babi
            </div>
        </a>
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