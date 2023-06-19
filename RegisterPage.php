<?php
session_start();
include_once("yielder.php");
include_once("connectDB.php");

if (isset($_SESSION['login'])) {
    echo "<meta http-equiv='refresh' content='0; url=HomePage.php'>";
    die();
}

$yielder = new Yielder();
$head = $yielder->getHead();
$tail = $yielder->getTail();
?>

<?php echo $head?>
<div class="w-[100vw] h-[100vh] bg-[#2B2D42] flex justify-center items-center flex-col">
	<div class="text-center font-semibold text-[#D90429] pb-10 text-6xl">WEB FORUM</div>
	<div class="bg-[#EDF2F4] rounded p-10 flex justify-center items-center flex-col">
		<div class="flex items-center justify-center relative items-center w-[100%]">
			<a href="LoginPage.php" class="absolute left-0"><img width="25" height="25" src="https://img.icons8.com/ios/50/000000/double-left.png" alt="double-left"/></a>
			<p class="text-[#000000] font-[400] text-[40px]">Register</p>
        </div>
		<hr class="border border-black w-[600px] my-4">
		<form action="controller.php" method="post" class="flex justify-center flex-col items-center">
			<?php if (isset($_SESSION['error'])) : ?>
				<p style="color: red; font-style: italic; margin-bottom: 1rem;"><?php echo $_SESSION['pesan'];
																					unset($_SESSION['pesan']);
																					unset($_SESSION['error']); ?></p>
			<?php endif ?>
			<?php if (isset($_SESSION['didit'])) : ?>
				<p style="color: blue; font-style: italic; margin-bottom: 1rem;"><?php echo $_SESSION['pesan'];
																					unset($_SESSION['pesan']);
																					unset($_SESSION['didit']); ?></p>
			<?php endif ?>
			<input type="text" placeholder="Username" name="Username" class="mb-4 border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" required/>
			<input type="password" placeholder="Password" name="Password" class="mb-4 border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" required/>
			<input type="password" placeholder="Confirm Password" name="ConfirmPassword" class="mb-6 border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" required/>
			<button type="submit" name="RegisterButton" class="transition duration-300 bg-[#D90429] w-[354px] h-[45px] hover:bg-[#2B2D42] text-white font-medium">
				Register
			</button>
		</form>
	</div>
</div>
<?php echo $tail?>
