<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');

// HANDLING SESSION LOGIN
$state = "EditUserPage";

$yielder = new Yielder();
$head = $yielder->getHead();
$tail = $yielder->getTail();
?>

<?php echo $head ?>

<div class="w-[100vw] h-[100vh] bg-[#2B2D42] flex items-center justify-center flex-col">
    <div class="bg-[#EDF2F4] p-10 rounded shadow-md flex items-center justify-center flex-col">
        <div class="flex items-center p-4 justify-center relative items-center w-[100%]">
            <a href="HomePage.php" class="absolute left-0"><img width="25" height="25" src="https://img.icons8.com/ios/50/000000/double-left.png" alt="double-left"/></a>
            <h2 class="text-2xl font-semibold  justify-center">Edit Profile</h2>
        </div>
        <hr class="border border-black w-[600px] my-4">
        <form action="" method="post" class="flex flex-col justify-center items-center">
            <input type="text" placeholder="Username" name="UsernameEdit" class="mb-4 border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px] " required>
            <input placeholder="Password" type="password" name="PasswordEdit" class="mb-4 border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" required>
            <input placeholder="Confirm Password" type="password" name="PasswordConfirmEdit" class="mb-6 border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" required>
            <button type="submit" name="SubmitEdit" class="transition duration-300 hover:bg-[#2B2D42] bg-[#D90429] w-[354px] h-[45px] text-white font-medium px-4 py-2 rounded">Submit</button>   
        </form>
    </div>
</div>

<?php echo $tail?>