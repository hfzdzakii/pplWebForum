<?php
class Yielder
{
    private $head;
    private $tail;

    public function __construct()
    {
        $this->headContent();
        $this->tailContent();
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
                <title>Document</title>
            </head>
            <body>';
        $this->head = ob_get_clean();
    }

    private function tailContent()
    {
        ob_start();
        echo '</body>
            </html>';
        $this->tail = ob_get_clean();
    }

    public function getHead()
    {
        return $this->head;
    }

    public function getTail()
    {
        return $this->tail;
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->

<!-- </body>
</html> -->