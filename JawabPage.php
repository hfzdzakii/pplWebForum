<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');
$_SESSION['state'] = 'login';


$state = "JawabPage";
$id = $_SESSION['id'];
$id_pertanyaan = $_GET['idPertanyaan'];
$nama = $_SESSION['username'];

$yielder = new Yielder($state, $nama);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state, $nama);

$pertanyaan = $pdo->prepare("SELECT * FROM pertanyaan where id_pertanyaan=". $id_pertanyaan .";");
try {
    $pertanyaan->execute();
    $data = $pertanyaan->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php echo $head ?>
<?php echo $header?>

<div class="h-screen w-sreen bg-[#EDF2F4] flex flex-col items-center">
    <div class="bg-[#EDF2F4] w-4/5 mt-[10px] ">
        <p class="text-[35px]"> <?php echo $data[0]['pertanyaan'] ?> </p>
    </div>
    <div class="w-4/5 space-y-5">
        <form action="controller.php?idPertanyaan=<?php echo $id_pertanyaan ?>" method="post" enctype="multipart/form-data">
                <p class="text-[20px]"> Send as : </p>
                <input name="sebagai" type="radio" value="<?php echo $nama ?>" checked/> <label> <?php echo $nama ?> </label>
                <br>
                <input name="sebagai" type="radio" value="anonymous"/> <label> Anonymous </label>
                <br>
                <textarea name="content" id="content" cols="30" rows="10" class="mt-[10px]"></textarea>
                <button type="submit" name="kirimJawaban" class="bg-[#D90429] w-[100px] h-[40px] rounded-[5px] text-white border-black border-2"> Send </button>
        </form>
</div>
<!-- <div id="editor"> </div> -->
<script>
        ClassicEditor.create( document.querySelector( '#content' ),{
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

<script>
    $(document).ready(function() {
        $('#dropdown-toggle').click(function() {
            $('#dropdown-menu').toggleClass('hidden');
        });

        $('#myPost').click(function() {
            window.location.href = 'MyPostPage.php'
        })
        
        $('#logot').click(function() {
            window.location.href = 'controller.php'
        })

        $('#editUserPass').click(function() {
            window.location.href = 'EditUserPage.php?id=<?php echo $id ?>'
        })
    })
</script>

<?php echo $tail?>