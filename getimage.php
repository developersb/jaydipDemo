<?php 

//function getimagenow()
//{


$ch = curl_init();

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($ch, CURLOPT_URL, 'https://dog.ceo/api/breeds/image/random');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer xxx'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);

$picture=curl_exec($ch);
$retcode=json_decode($picture);
curl_close($ch);
$file=$retcode->message;
echo $file;
//print_r($retcode);
//echo "string";
//exit();
    //$location   = $retcode->results[0]->address_components[0]->long_name;
    // Check the return value of curl_exec(), too
/*    if ($picture === false) {
        throw new Exception(curl_error($ch), curl_errno($ch));
    }*/
//print_r($retcode);
/*var_dump($ch);
var_dump($picture);
echo "hello";
exit();*/


//print_r($file);
//exit();
//exit();
//Display the image in the browser
//header('Content-type: image/jpeg');


//exit();
//$retarr= array('imgfile' =>$file);
//echo json_encode($retarr);

//}

?>