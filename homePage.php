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
?>

<?php echo $head ?>
<?php echo $header ?>

<div class="flex justify-center w-[100vw] relative p-[10px] bg-[#EDF2F4] ">
    <div class=" flex w-[50%]  mr-5 flex-col"> <!-- h-[1000px] -->
        <div class="flex justify-center border-2 border-black h-20 w-[100%] bg-[#FFFFFF]">
            <form action="" method="post" class="w-[100%] flex justify-center items-center"> <!-- controller.php -->
                <input type="text" placeholder="ASK" class="text-[20px] font-black border-2 w-[80%] border-black rounded-full text-center" required>
                <button type="submit" class="text-[20px] ml-2 rounded-full text-center flex justify-center">
                <img width="50" height="50" src="https://img.icons8.com/ios/50/add--v1.png" alt="add--v1"/>
                </button>
            </form>
        </div>
        <div class="flex justify-center border-2 border-black w-[100%] mt-5 bg-white">
            <div class="flex items-center w-[10%] flex-col text-center">
                <img id="upvote" class="mb-1 mt-5" width="30" height="30" src="https://img.icons8.com/badges/30/up.png"/>
                <div class="mb-1">10.0k</div>
                <img id="downvote" class="mb-1" width="30" height="30" src="https://img.icons8.com/badges/30/down.png"/>
            </div>
            <div class="flex w-[90%] mt-3 flex-col">
                <div class="mb-1 text-[24px] text-justify">Username</div>
                <div class="text-[36px] mb-1 text-justify">Pertanyaan</div>
                <div class="flex flex-col mb-2 text-[24px] w-[400px]">
                    <div class="mb-1 text-justify	">
                        Jawabandsafffffffffffgfdasssssssssss ssssssssssssssssss ssssssssssssssssssssssssssssssssssssdfsfsffdsfsf
                    </div>
                    <img src="tes.png" class="w-[50%] h-auto mb-1">
                </div>
                <img id="komen" class="mb-1" width="25" height="25" src="https://img.icons8.com/ios/25/comments--v1.png" alt="comment" />
            </div>
        </div>
        <div class="flex justify-center border-2 border-black w-[100%] mt-5 bg-white">
            <div class="flex items-center w-[10%] flex-col text-center">
                <img id="upvote" class="mb-1 mt-5" width="30" height="30" src="https://img.icons8.com/badges/30/up.png"/>
                <div class="mb-1">10.0k</div>
                <img id="downvote" class="mb-1" width="30" height="30" src="https://img.icons8.com/badges/30/down.png"/>
            </div>
            <div class="flex w-[90%] mt-3 flex-col">
                <div class="mb-1 text-[24px] text-justify">Username</div>
                <div class="text-[36px] mb-1 text-justify">Pertanyaan</div>
                <div class="flex flex-col mb-2 text-[24px] w-[400px]">
                    <div class="mb-1 text-justify	">
                        Jawabandsafffffffffffgfdasssssssssss ssssssssssssssssss ssssssssssssssssssssssssssssssssssssdfsfsffdsfsf
                    </div>
                    <img src="tes.png" class="w-[50%] h-auto mb-1">
                </div>
                <img id="komen" class="mb-1" width="25" height="25" src="https://img.icons8.com/ios/25/comments--v1.png" alt="comment" />
            </div>
        </div>
        <div class="flex justify-center border-2 border-black w-[100%] mt-5 bg-white">
            <div class="flex items-center w-[10%] flex-col text-center">
                <img id="upvote" class="mb-1 mt-5" width="30" height="30" src="https://img.icons8.com/badges/30/up.png"/>
                <div class="mb-1">10.0k</div>
                <img id="downvote" class="mb-1" width="30" height="30" src="https://img.icons8.com/badges/30/down.png"/>
            </div>
            <div class="flex w-[90%] mt-3 flex-col">
                <div class="mb-1 text-[24px] text-justify">Username</div>
                <div class="text-[36px] mb-1 text-justify">Pertanyaan</div>
                <div class="flex flex-col mb-2 text-[24px] w-[400px]">
                    <div class="mb-1 text-justify	">
                        Jawabandsafffffffffffgfdasssssssssss ssssssssssssssssss ssssssssssssssssssssssssssssssssssssdfsfsffdsfsf
                    </div>
                    <img src="tes.png" class="w-[50%] h-auto mb-1">
                </div>
                <img id="komen" class="mb-1" width="25" height="25" src="https://img.icons8.com/ios/25/comments--v1.png" alt="comment" />
            </div>
        </div>
        <div class="flex justify-center border-2 border-black w-[100%] mt-5 bg-white">
            <div class="flex items-center w-[10%] flex-col text-center">
                <img id="upvote" class="mb-1 mt-5" width="30" height="30" src="https://img.icons8.com/badges/30/up.png"/>
                <div class="mb-1">10.0k</div>
                <img id="downvote" class="mb-1" width="30" height="30" src="https://img.icons8.com/badges/30/down.png"/>
            </div>
            <div class="flex w-[90%] mt-3 flex-col">
                <div class="mb-1 text-[24px] text-justify">Username</div>
                <div class="text-[36px] mb-1 text-justify">Pertanyaan</div>
                <div class="flex flex-col mb-2 text-[24px] w-[400px]">
                    <div class="mb-1 text-justify	">
                        Jawabandsafffffffffffgfdasssssssssss ssssssssssssssssss ssssssssssssssssssssssssssssssssssssdfsfsffdsfsf
                    </div>
                    <img src="tes.png" class="w-[50%] h-auto mb-1">
                </div>
                <img id="komen" class="mb-1" width="25" height="25" src="https://img.icons8.com/ios/25/comments--v1.png" alt="comment" />
            </div>
        </div>
    </div>
    <!-- ============================================================================================== -->
    <div class="flex w-[30%] relative flex-col ">
        <div class="sticky top-[5px]">
            <div class="w-[100%] bg-[#FFFFFF] border-2 border-black">
                <div class="text-center text-[18px] py-[5px] bg-[#D90429] text-[#FFFFFF] mb-2">Newest Questions</div>
                <div class="flex items-center justify-center flex-col">
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                    <div id="pertanyaann" class="cursor-pointer text-center border-2 w-[95%] py-[5px] mb-2 border-black rounded-md">Question Tittle</div>
                </div>
            </div>
            <button id="moreQuestion" class="text-center rounded-md bg-[#D90429] mt-2 h-[40px] w-[100%] text-[#FFFFFF]">More Questions</button>
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


    });
</script>


<?php echo $tail ?>