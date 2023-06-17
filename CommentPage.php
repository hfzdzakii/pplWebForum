<?php
session_start();
include_once('yielder.php');
$state = "CommentPage";
$yielder = new Yielder($state);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state);
?>

<?php echo $head ?>
<?php
     echo $header;
?>
<div class=" bg-[#2B2D42] flex items-center justify-center flex-col px-80">
        <div class="bg-white p-10  rounded shadow-md flex items-center justify-center flex-col mt-6">
            <div class="border-solid border-2 border-sky-500 pb-8">
                <div class="px-8 py-8 text-2xl font-semibold">
                    <b>JUDUL PERTANYAAN</b>
                </div>
                <div class="px-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
                </div>
            </div>
            <form action="controller.php" method="POST">
                <div class="pt-6">
                    <input placeholder="comments..." type="text" name="komentar" id="komentar" class="border border-gray-300 px-3 py-2 rounded w-[823px] h-[45px]" required>
                </div>
            </form>
            <div class="self-end mt-4">
                <button type="submit" name="Submit" class=" bg-[#D90429] w-[100px] h-[45px] hover:bg-green-600 text-white font-medium px-4 py-2 rounded">Submit</button>   
            </div>
            <div class="border-solid border-2 border-black-500 mt-6">
                <div class="p-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
                </div>
            </div>
            <div class="border-solid border-2 border-black-500 mt-6">
                <div class="p-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
                </div>
            </div>
            <div class="border-solid border-2 border-black-500 mt-6">
                <div class="p-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
                </div>
            </div>
            <div class="border-solid border-2 border-black-500 mt-6">
                <div class="p-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
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