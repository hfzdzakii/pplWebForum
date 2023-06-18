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

$state = "HomePage";
$id = $_SESSION['id'];
$nama = $_SESSION['username'];
$akses = $_SESSION['akses'];

$yielder = new Yielder($state, $nama);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state, $nama);

// SQL GOES HERE
$daftarPertanyaan = $pdo->prepare("SELECT pertanyaan, id_pertanyaan FROM pertanyaan ORDER BY waktu DESC LIMIT 5");
try {
    $daftarPertanyaan->execute();
    $Pertanyaan = $daftarPertanyaan->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$daftarPostingan = $pdo->prepare("SELECT jawaban.jawaban, user.username, pertanyaan.pertanyaan, jawaban.upvote FROM jawaban INNER JOIN pertanyaan ON jawaban.id_pertanyaan = pertanyaan.id_pertanyaan INNER JOIN user ON jawaban.id_user = user.id_user;");
try {
    $daftarPostingan->execute();
    $Postingan = $daftarPostingan->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php echo $head ?>
<?php echo $header ?>

<div class="flex justify-center w-[100vw] relative p-[10px] bg-[#EDF2F4] ">
    <div class=" flex w-[50%]  mr-5 flex-col"> <!-- h-[1000px] -->
        <div class="flex justify-center border-2 border-black h-20 w-[100%] bg-[#FFFFFF]">
            <form action="controller.php?id=<?php echo $id ?>" method="post" class="w-[100%] flex flex-col justify-center items-center"> <!-- controller.php -->
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
                <div class="w-[100%] mb-[5px] flex flex justify-center items-center">
                    <input name="AjukanPertanyaan" type="text" placeholder="ASK" class="text-[20px] font-black border-2 w-[80%] border-black rounded-full text-center" required>
                    <button name="AjukanPertanyaanButton" type="submit" class="text-[20px] ml-2 rounded-full text-center flex justify-center">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/add--v1.png" alt="add--v1"/>
                    </button>
                </div>
            </form>
        </div>
        <?php foreach($Postingan as $post) : ?>
            <div class="flex justify-center border-2 border-black w-[100%] mt-5 bg-white">
                <div class="flex items-center w-[10%] flex-col text-center">
                    <img id="upvote" class="mb-1 mt-5" width="30" height="30" src="https://img.icons8.com/badges/30/up.png"/>
                    <div class="mb-1"><?php echo $post['upvote'] ?></div>
                    <img id="downvote" class="mb-1" width="30" height="30" src="https://img.icons8.com/badges/30/down.png"/>
                </div>
                <div class="flex w-[90%] mt-3 flex-col">
                    <div class="mb-1 text-[24px] text-justify">Dijawab Oleh <?php echo $post['username'] ?></div>
                    <div class="text-[36px] mb-1 text-justify"><?php echo $post['pertanyaan'] ?></div>
                    <div class="flex flex-col mb-2 text-[24px] w-[400px]">
                        <div class="mb-1 text-justify	">
                            <?php echo $post['jawaban'] ?>
                        </div>
                    </div>
                    <img id="komen" class="mb-1" width="25" height="25" src="https://img.icons8.com/ios/25/comments--v1.png" alt="comment" />
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!-- ============================================================================================== -->
    <div class="flex w-[30%] relative flex-col ">
        <div class="sticky top-[5px]">
            <div class="w-[100%] bg-[#FFFFFF] border-2 border-black">
                <div class="text-center text-[18px] py-[5px] bg-[#D90429] text-[#FFFFFF] mb-2">Newest Questions</div>
                <div class="flex items-center justify-center flex-col">
                    <?php foreach($Pertanyaan as $baris) : 
                        if (strlen($baris['pertanyaan']) > 40) {
                            $modify = substr($baris['pertanyaan'], 0, 40) . "..."; ?>
                            <a href="JawabPage.php?idPertanyaan=<?php echo $baris['id_pertanyaan'] ?>" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md"><?php echo $modify; ?></a>
                            <?php
                        } else { ?>
                            <a href="JawabPage.php?idPertanyaan=<?php echo $baris['id_pertanyaan'] ?>" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md"><?php echo $baris['pertanyaan']; ?></a>
                        <?php } ?>
                    <?php endforeach ?>
                </div>
            </div>
            <button id="moreQuestion" class="text-center rounded-md bg-[#D90429] mt-2 h-[40px] w-[100%] text-[#FFFFFF]">More Questions</button>
            <button id="topPost" class="text-center rounded-md bg-[#D90429] mt-2 h-[40px] w-[100%] text-[#FFFFFF]">Top Post</button>
        </div>
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

        $('#moreQuestion').click(function() {
            window.location.href = 'KumpulanPage.php'
        })

        $('#topPost').click(function() {
            window.location.href = 'HomePage.php'
        })


    });
</script>


<?php echo $tail ?>