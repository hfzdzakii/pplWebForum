<?php
session_start();
include_once('yielder.php');
$_SESSION['state'] = 'login';

if(isset($_SESSION['login'])){
    echo "<meta http-equiv='refresh' content='0; url=HomePage.php'>";
    die();
}
if ($_SESSION['state'] == 'login') {
    $login = true;
}


$yielder = new Yielder($_SESSION['state']);
$head = $yielder->getHead();
$tail = $yielder->getTail();

?>

<?php echo $head ?>
<div class="w-[100vw] h-[100vh] bg-[#2B2D42] flex items-center justify-center flex-col	">
    <div class="text-center font-semibold  text-[#D90429] text-4xl pb-10">
        <p class="text-6xl">WEB FORUM</p>
    </div>
    
        <div class="bg-[#EDF2F4] p-10  rounded shadow-md flex items-center justify-center flex-col">
            <h2 class="text-2xl font-semibold  justify-center">Login</h2>
            <hr class="border border-black w-[600px] my-4">
            <form action="controller.php" method="POST">
                <div class="mb-4 ">
                    <input type="username" placeholder="Username" name="UsernameLogin" id="username" class="hover:border-2 border-[#2B2D42] px-3 py-2 rounded w-[354px] h-[45px] " required>
                </div>
                <div class="mb-6">
                    <input placeholder="Password" type="password" name="PasswordLogin" id="password" class="hover:border-2 border-[#2B2D42] px-3 py-2 rounded w-[354px] h-[45px]" required>
                </div>
            </form>
            <div class="flex items-center justify-between flex-col mb-4">
                <button type="submit" name="LoginButton" class="bg-[#D90429] w-[354px] h-[45px] hover:bg-[#2B2D42] text-white font-medium px-4 py-2 rounded ">Login</button>
            </div>
            <?php if (isset($_SESSION['error'])) : ?>
                <div><?php echo $_SESSION['error'];
                        unset($_SESSION['error']); ?></div>
            <?php endif ?>
            <div class="flex items-center justify-between flex-col mb-4">
                <hr class="border border-black w-[600px] ">
            </div>
            <div class="flex items-center justify-between flex-col ">
                <button type="submit" name="RegisterButton" class="bg-[#D90429] w-[354px] h-[45px] hover:bg-[#2B2D42] text-white font-medium px-4 py-2 rounded">Create New Account</button>   
            </div>
        </div>
</div>
<?php echo $tail?>