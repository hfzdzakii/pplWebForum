<?php
session_start();
include_once('yielder.php');
$yielder = new Yielder($_SESSION['state']);
$head = $yielder->getHead();
$tail = $yielder->getTail();
?>
<?php echo $head ?>
<div class=" bg-[#2B2D42] flex items-center justify-center flex-col px-80">
        <div class="bg-white p-10  rounded shadow-md flex items-center justify-center flex-col ">
            <div class="border-solid border-2 border-sky-500 pb-8 mb-8">
                <div class="px-8 py-8 text-2xl font-semibold">
                    <b>JUDUL PERTANYAAN</b>
                </div>
                <div class="px-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
                </div>
            </div>

            <div class="border-solid border-2 border-sky-500 pb-8 mb-8">
                <div class="px-8 py-8 text-2xl font-semibold">
                    <b>JUDUL PERTANYAAN</b>
                </div>
                <div class="px-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
                </div>
            </div>

            <div class="border-solid border-2 border-sky-500 pb-8 mb-8">
                <div class="px-8 py-8 text-2xl font-semibold">
                    <b>JUDUL PERTANYAAN</b>
                </div>
                <div class="px-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
                </div>
            </div>

            <div class="border-solid border-2 border-sky-500 pb-8 mb-8">
                <div class="px-8 py-8 text-2xl font-semibold">
                    <b>JUDUL PERTANYAAN</b>
                </div>
                <div class="px-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sollicitudin massa ut hendrerit. Cras dapibus nulla non diam scelerisque euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas at ligula vitae dolor cursus consectetur. Nulla dapibus viverra eros nec tempor. Maecenas aliquet magna ut augue sagittis, eu interdum diam posuere. Pellentesque at efficitur ex. Ut hendrerit mauris nisl, ut aliquam tellus egestas vitae.
                </div>
            </div>
        </div>
</div>