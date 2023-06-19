<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <title>Document</title>
</head>

<body>
    <div class=" w-[100vw] h-[50px] bg-[#2B2D42] flex items-center justify-between	">
        <div class="ml-[110px] text-[20px] text-center text-[#D90429]">
            <a href="HomePage.php">WEB FORUM</a>
        </div>
        <div class="mr-[110px] hs-dropdown relative flex-col   ">
            <button id="dropdown-toggle" name="profilButton" class="type=buttonn bg-[#D90429] pb-1 px-4 pt-1 hover:bg-[#96021b] text-white font-medium rounded-full transition duration-300">
            </button>
            <div class="origin-top-right absolute mt-2 w-[150px] z-[100]  hidden flex flex-col" id="dropdown-menu">
                <button id="myPost" class="border-black border-2 bg-[#D90429] text-white rounded-full mb-1 pb-1 px-1 pt-1">Postinganku</button>
                <button id="editUserPass" class="border-black border-2 bg-[#D90429] text-white rounded-full mb-1 pb-1 px-1 pt-1">Edit Profil</button>
                <button id="logot" class="border-black border-2 bg-[#D90429] text-white rounded-full pb-1 px-4 pt-1">Logout</button>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#dropdown-toggle').click(function() {
            $('#dropdown-menu').toggleClass('hidden');
        });

        $(document).click(function(e) {
            const target = e.target;
            if (!target.closest('#dropdown-toggle')) {
                $('#dropdown-menu').addClass('hidden');
            }
        });

        $('#myPost').click(function() {
            window.location.href = 'myPostPage.php'
        })


        $('#logot').click(function() {
            window.location.href = 'controller.php'
        })

        $('#editUserPass').click(function() {
            window.location.href = 'EditUserPage.php?id=<?php echo $id ?>'
        })



    });
</script>
</body>


</html>