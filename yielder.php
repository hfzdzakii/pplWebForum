<?php
class Yielder
{
    private $head;
    private $tail;
    private $header;

    public function __construct($state='', $nama='')
    {
        $this->headContent();
        $this->tailContent();
        $this->headerContent($state, $nama);
    }

    private function headContent()
    {
        ob_start();
        echo '<!DOCTYPE html>
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
            <body class="overflow-x-hidden">';
        $this->head = ob_get_clean();
    }

    private function tailContent()
    {
        ob_start();
        echo '</body>
            </html>';
        $this->tail = ob_get_clean();
    }

    private function headerContent($state, $nama)
    {
        $hasil2 = ($state == "JawabPage") ? 'KumpulanPage.php' : ($state == "new" ? 'NewestPage.php' : 'HomePage.php'); //'HomePage.php'
        $hasil = $state == "HomePage" ? '' : '<div class="absolute left-[30px] ">
                                                    <a href="'. $hasil2.'"><img width="25" height="25" src="https://img.icons8.com/ios/50/FFFFFF/double-left.png" alt="double-left"/></a>
                                                </div>';
        ob_start();
        echo '<div class=" w-[100vw] h-[50px] bg-[#2B2D42] flex items-center justify-between	">
                '. $hasil .'
                <div class="ml-[110px] text-[20px] text-center text-[#D90429]">
                    <a href="HomePage.php">WEB FORUM</a>
                </div>
                <div class="mr-[110px] hs-dropdown relative flex-col   ">
                    <button id="dropdown-toggle" name="profilButton" class="type=buttonn bg-[#D90429] pb-1 px-4 pt-1 hover:bg-[#96021b] text-white font-medium rounded-full transition duration-300">'.$nama.'
                    </button>
                    <div class="origin-top-right absolute mt-2 w-[150px] z-[100]  hidden flex flex-col" id="dropdown-menu">
                        <button id="myPost" class="border-black border-2 bg-[#D90429] text-white rounded-full mb-1 pb-1 px-1 pt-1">Postinganku</button>
                        <button id="editUserPass" class="border-black border-2 bg-[#D90429] text-white rounded-full mb-1 pb-1 px-1 pt-1">Edit Profil</button>
                        <button id="logot" class="border-black border-2 bg-[#D90429] text-white rounded-full pb-1 px-4 pt-1">Logout</button>
                    </div>
                </div>
            </div>';
        $this->header = ob_get_clean();
    }

    public function getHead()
    {
        return $this->head;
    }

    public function getTail()
    {
        return $this->tail;
    }
    public function getHeader()
    {
        return $this->header;
    }
}
?>