<?php
session_start();
include_once("yielder.php");
include_once("connectDB.php");
$_SESSION['state'] = 'register';

$yielder = new Yielder($_SESSION['state']);
$head = $yielder->getHead();
$tail = $yielder->getTail();
?>

<?php echo $head?>
<div class="w-[100vw] h-[100vh] bg-[#1E1E1E] flex justify-center items-center flex-col">
	<p class="text-[#D90429] text-[64px]">Web Forum</p>

	<div class="bg-[#EDF2F4] p-10 flex justify-center items-center flex-col">
		<p class="text-[#000000] text-[40px]">Register</p>
		<hr class="border border-black w-[600px] my-4">

		<form action="LoginPage.php" method="POST">
			<div class="mb-4">
				<input type="text" placeholder="Username" name="Username" id="username" class="border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" require/>
			</div>

			<div class="mb-4">
				<input type="Password" placeholder="Password" name="Password" id="password" class="border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" require/>
			</div>
			
			<div class="mb-5">
				<input type="Confirm Password" placeholder="Confirm Password" name="Confirm Password" id="confirm password" class="border border-gray-300 px-3 py-2 rounded w-[354px] h-[45px]" require/>
			</div>

			<button type="submit" class="bg-[#D90429] w-[354px] h-[45px] hover:bg-blue-600 text-[#ffffff]">
				Register
			</button>
		</form>

	</div>
</div>
<?php echo $tail?>
