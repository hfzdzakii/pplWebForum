<?php
session_start();
include_once('yielder.php');
$yielder = new Yielder($_SESSION['state']);
$head = $yielder->getHead();
$tail = $yielder->getTail();
?>

<?php echo $head ?>
<div class="w-[100vw] h-[100vh] bg-[#2B2D42] flex items-center justify-center flex-col	">
        <div class="bg-white p-10  rounded shadow-md flex items-center justify-center flex-col">
            <div class="flex justify-between items-center p-4">
                <div class="w-96">
                    <button type="submit" name="Submit">
                        <img width="50" height="50" src="https://img.icons8.com/quill/50/double-left.png" alt="double-left"/>
                    </button>   
                </div>
                <h2 class="text-2xl font-semibold  justify-center">Edit Profile</h2>
            </div>
            <!-- <img width="50" height="50" src="https://img.icons8.com/quill/50/double-left.png" alt="double-left"/>
            <h2 class="text-2xl font-semibold  justify-center">Edit Profile</h2> -->
            <hr class="border border-black w-[600px] my-4">
            <form action="controller.php" method="POST">
                <div class="mb-4 ">
                    <input type="username" placeholder="Username" name="UsernameEdit" id="usernameEdit" class="border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px] " required>
                </div>
                <div class="mb-6">
                    <input placeholder="Password" type="password" name="PasswordEdit" id="passwordEdit" class="border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" required>
                </div>
                <div class="mb-6">
                    <input placeholder="Confirm Password" type="Conf_password" name="Password_Conf" id="Confpassword" class="border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" required>
                </div>
            </form>
            <div class="flex items-center justify-between flex-col ">
                <button type="submit" name="Submit" class="bg-[#D90429] w-[354px] h-[45px] hover:bg-blue-600 text-white font-medium px-4 py-2 rounded">Submit</button>   
            </div>
        </div>
</div>
<?php echo $tail?>