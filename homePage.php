<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');

// handling session login
$state = "LoginPage";

$yielder = new Yielder($state);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state);
?>

<?php echo $head ?>
<?php echo $header ?>

<div class="flex justify-center w-[100vw] relative p-[10px] bg-[#EDF2F4] ">
    <div class=" flex w-[50%]  h-[1000px] mr-5 flex-col">
        <div class="flex justify-center border-2 border-black h-20 w-full ">
            <div>
                <input type="text" placeholder="ASK" class="text-[20px] font-black border-2 w-[600px] h-[40px] mt-4 border-black rounded-full text-center">
            </div>
            <div>
                <button type="button" class="border-2 w-[40px] font-black text-[20px] h-[40px] mt-4 ml-2 border-black rounded-full text-center">+</button>
            </div>
        </div>
        <div class="flex justify-center border-2 border-black w-[100%] mt-5">
            <div class="flex items-center w-[10%] flex-col  text-center">
                <div class="flex mb-1 mt-5">
                    <img width="30" height="30" src="https://img.icons8.com/badges/30/up.png"/>
                </div>
                <div class="flex mb-1">
                    10.0k
                </div>
                <div class="flex mb-1">
                    <img width="30" height="30" src="https://img.icons8.com/badges/30/down.png"/>
                </div>
            </div>
            <div class="flex w-[90%] mt-3 flex-col">
                <div class="flex mb-1 text-[24px] text-justify	">
                    Username
                </div>
                <div class="text-[36px] flex mb-1 text-justify	">
                    Pertanyaan
                </div>
                <div class="flex flex-col mb-2 text-[24px] w-[400px]">
                    <div class="flex mb-1 text-justify	">
                        Jawabandsafffffffffffgfdasssssssssss ssssssssssssssssss ssssssssssssssssssssssssssssssssssssdfsfsffdsfsf
                    </div>
                    <div class="flex mb-1">
                        <img src="tes.png" class="w-64 h-64">
                    </div>
                </div>
                <div class="flex mb-1">
                    <img width="25" height="25" src="https://img.icons8.com/ios/25/comments--v1.png" alt="comments--v1" />
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-[30%] h-[700px] bg-[#FFFFFF] sticky top-0 flex-col">
        <div class="w-[100%] h-[550px] border-2 border-black">
            <div class="text-center text-[20px] bg-[#D90429] text-[#FFFFFF] flex flex-col">
                Newest Questions
            </div>
            <div class="flex items-center justify-center flex-col">
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
                <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                    Question Tittle
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center text-center mt-2 ">
            <button type="button" name="" class="rounded-full bg-[#D90429] h-[40px] w-[100%] text-[#FFFFFF]">
                More Questions
            </button>
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
    });
</script>


<?php echo $tail ?>