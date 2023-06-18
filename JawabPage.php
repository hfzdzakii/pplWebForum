<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');
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
    
    if(isset($_REQUEST['kirimJawaban']))
    {
       $content = $_REQUEST['content'];

        $insert_query = $pdo->prepare("INSERT into jawaban values(null,1,'$content',0,1,'farel','1')");
        try {
            $insert_query->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
<div class="h-screen w-sreen bg-[#EDF2F4] flex flex-col space-y-5 items-center">
    <div class="bg-[#EDF2F4] w-4/5">
        <p class="text-[35px]"> JUDUL PERTANYAAN </p>
    </div>
    <div class="w-4/5 space-y-5">
        <form action="" method="post" enctype="multipart/form-data">
                <p class="text-[20px]"> Send as : </p>
                <input name="ass" type="radio" /> <label> Username </label>
                <br>
                <input name="as" type="radio" /> <label> Anonymous </label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
                <button name="kirimJawaban" class="bg-[#D90429] w-[100px] h-[40px] rounded-[5px] text-white border-black border-2"> Send </button>
        </form>
        <!-- <div class="text-[20px] text-red-500">
        </div> -->
</div>
<div id="editor"> </div>
                        <script>
                                ClassicEditor
                                        .create( document.querySelector( '#content' ),{
                                            ckfinder:
                                            {
                                                uploadUrl: 'fileupload.php'
                                            }
                                        } )
                                        .then( editor => {
                                                console.log( editor );
                                        } )
                                        .catch( error => {
                                                console.error( error );
                                        } );
                        </script> 
<?php echo $tail?>