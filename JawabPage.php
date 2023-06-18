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
<?php
    include_once('connectDb.php');
    if(isset($_REQUEST['kirimjawaban']))
    {
        $content = $_REQUEST['content'];

        $insert_query = $mysqli_query($connetDb, "insert into jawaban set jawaban='$content'");
        if($insert_query)
        {
            $msg = "DAta masuk";
        }
        else 
        {
            $msg = "tidak masuk";
        }
    }
?>
<div class="h-screen w-sreen bg-[#EDF2F4] flex flex-col space-y-5 items-center">
    <div class="bg-[#EDF2F4] w-4/5">
        <p class="text-[35px]"> JUDUL PERTANYAAN </p>
    </div>
    <div class="w-4/5">
        <form action=".php" method="post" enctype="multipart/form-data">
                <p class="text-[20px]"> Send as : </p>
                <input name="ass" type="radio" /> <label> Username </label>
                <br>
                <input name="as" type="radio" /> <label> Anonymous </label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
                <button name="kirimJawaban" class="bg-[#D90429] w-[100px] h-[40px] rounded-[5px] text-white border-black border-2"> Send </button>
        </form>
        <div>
            <?php if(!empty($msg)) {echo $msg;} ?> 
        </div>
</div>
<div id="editor"> </div>
                        <script>
                                ClassicEditor
                                        .create( document.querySelector( '#content' ) )
                                        .then( editor => {
                                                console.log( editor );
                                        } )
                                        .catch( error => {
                                                console.error( error );
                                        } );
                        </script> 
<?php echo $tail?>