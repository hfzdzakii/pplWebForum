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

<div class="flex justify-center w-[100vw] relative p-[10px]  ">
    <div class=" flex w-[50%]  h-[1000px] mr-5 bg-blue-500 ">
        sddasf
    </div>
    <div class="flex w-[30%] h-[100px] bg-[#FFFFFF] sticky top-0">
            <div class="w-[100%] border-2 border-black">
                <div class="text-center text-[20px] bg-[#D90429] text-[#FFFFFF] flex flex-col">
                    Newest Questions
                </div>
                <div class="flex items-center justify-center">
                    <div class="text-center m-auto  border-2 w-[400px] h-[40px] mt-2 border-black rounded-full">
                        Question Tittle
                    </div>
                </div>
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