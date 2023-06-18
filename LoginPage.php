<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');

if (isset($_SESSION['login'])) {
    echo "<meta http-equiv='refresh' content='0; url=HomePage.php'>";
    die();
}

$yielder = new Yielder();
$head = $yielder->getHead();
$tail = $yielder->getTail();

?>

<?php echo $head ?>
<div class="w-[100vw] h-[100vh] bg-[#2B2D42] flex items-center justify-center flex-col	">
    <div class="text-center font-semibold text-[#D90429] pb-10 text-6xl">WEB FORUM</div>
    <div class="bg-[#EDF2F4] p-10 rounded shadow-md flex items-center justify-center flex-col">
        <p class="text-[#000000] font-[400] text-[40px]">Login</p>
        <hr class="border border-black w-[600px] my-4">
        <form action="controller.php" method="post" class="flex justify-center flex-col items-center">
            <?php if (isset($_SESSION['error'])) : ?>
                <p style="color: red; font-style: italic; margin-bottom: 1rem;"><?php echo $_SESSION['error'];
                                                                                unset($_SESSION['error']); ?></p>
            <?php endif ?>
            <input type="text" placeholder="Username" name="UsernameLogin" class="mb-4 border-[#2B2D42] px-3 py-2 rounded w-[354px] h-[45px] " required>
            <input placeholder="Password" type="password" name="PasswordLogin" class="mb-6 border-[#2B2D42] px-3 py-2 rounded w-[354px] h-[45px]" required>
            <button type="submit" name="LoginButton" class="mb-4 transition duration-300 bg-[#D90429] w-[354px] h-[45px] hover:bg-[#2B2D42] text-white font-medium px-4 py-2 rounded ">Login</button>
        </form>
        <hr class="border border-black w-[600px] mb-4">
        <div class="flex items-center justify-between flex-col ">
            <button id="createAcc" name="RegisterButton" class="transition duration-300 bg-[#D90429] w-[354px] h-[45px] hover:bg-[#2B2D42] text-white font-medium px-4 py-2 rounded">Create New Account</button>   
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#createAcc').on('click', function() {
            window.location.href = 'RegisterPage.php'
        })
    });
</script>
<?php echo $tail?>