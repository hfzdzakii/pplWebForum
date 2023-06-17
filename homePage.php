<?php
session_start();
include_once('yielder.php');
$yielder = new Yielder();
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader();
?>

<?php echo $head ?>
<?php echo $header ?>

<!-- <div class=" w-[100vw] h-[50px] bg-[#2B2D42] flex items-center justify-between	">
    <div class="ml-[110px] text-[20px] text-center text-[#D90429]">
        <a href="homePage.php">WEB FORUM</a>
    </div>
    <div class="mr-[110px] hs-dropdown relative flex-col   ">
        <button id="dropdown-toggle" name="profilButton" class="type=buttonn bg-[#D90429] pb-1 px-4 pt-1 hover:bg-blue-600 text-white font-medium rounded-full transition duration-300">NAMA
        </button>
        <div class="origin-top-right absolute mt-2 w-[150px]  shadow-lg  hidden flex flex-col" id="dropdown-menu">
            <button class=" bg-[#D90429] type=buttonn text-white rounded-full mb-1 pb-1 px-1 pt-1">Edit Profil</button>
            <button class=" bg-[#D90429] type=buttonn text-white rounded-full pb-1 px-4 pt-1">Logout</button>
        </div>

    </div>
</div>-->
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
    });
</script> 


<?php echo $tail ?>