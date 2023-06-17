<?php
session_start();
include_once('yielder.php');
$_SESSION['state'] = 'login';


$state = "JawabPage";
$yielder = new Yielder($state);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state);


?>

<?php echo $head ?>
<?php echo $header?>
<div class="h-screen w-sreen bg-[#EDF2F4] flex flex-col space-y-5 items-center">
    <div class="bg-[#EDF2F4] w-4/5">
        <p class="text-[35px]"> JUDUL PERTANYAAN </p>
    </div>
    <div class="w-4/5">
        <form action="controller.php" method="post">
                <p class="text-[20px]"> Send as : </p>
                <input type="radio" /> <label> Username </label>
                <br>
                <input type="radio" /> <label> Anonymous </label>
            <!--textarea class="bg-[#FFFFFF] w-[1185px] border-2 border-black rounded-[5px]"> </textarea-->
        </form>
    </div>
    <div class="w-4/5">
        <form action="contorller.php" method="post">
            <div id="editor"> </div>
                        <script>
                                ClassicEditor
                                        .create( document.querySelector( '#editor' ) )
                                        .then( editor => {
                                                console.log( editor );
                                        } )
                                        .catch( error => {
                                                console.error( error );
                                        } );
                        </script> 
        </form>
    </div>
    <div class="w-4/5">
        <button class="bg-[#D90429] w-[100px] h-[40px] rounded-[5px] text-white border-black border-2"> Send </button>
    <div>
</div>
<?php echo $tail?>