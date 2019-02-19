<?php

$data = ['result' => false];


if(isset($_POST['arquivo'])){

    $imagedata = $_POST['arquivo'];
    $teste = $_POST['cont'];
    $imagedata = str_replace('data:image/jpeg;base64,','',$imagedata);
    $imagedata = str_replace('data:image/jpg;base64,','',$imagedata);
    $imagedata = str_replace(' ','+', $imagedata);
    //$source = imagecreatefromjpeg($imagedata);
    //$rotate = imagerotate($source, 90);
    $imagedata = base64_decode($imagedata);
    $target_path = $teste.'.jpg';
    
    

    file_put_contents($target_path, $imagedata);

    $data['result'] = true;
    $data['image_url'] = 'http://vservices.com.br/'.$target_path;
    $data['teste'] = $teste;
}

echo json_encode($data);

?>