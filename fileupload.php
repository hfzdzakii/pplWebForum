<?php
$data  = array();
if(isset($_FILES['upload']['name']))
{
    $namaFile = $_FILES['upload']['name'];
    $pathFile = 'upload/'.$namaFile;
    $ekstensiFile = strtolower(pathinfo($pathFile, PATHINFO_EXTENSION));
    if($ekstensiFile ==  'jpg' || $ekstensiFile ==  'png' || $ekstensiFile ==  'jpeg')
    {
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $pathFile))
        {
            $data['file'] = $namaFile;
            $data['url'] = $pathFile;
            $data['uploaded'] = 1;
        }
        else
        {
            $data['uploaded'] = 0;
            $data['error']['message'] = "ehehe";
        }
    }
    else
    {
        $data['uploaded'] = 0;
        $data['error']['message'] = "xixixi";
    }
}
echo json_encode($data);
?>