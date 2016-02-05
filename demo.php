<?php
$data = stripslashes($_POST['data']); 
file_put_contents('users.json', $data, true);

function vget($url)
{
    
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $data = curl_exec($curl);
  if (curl_errno($curl)) {return 'ERROR '.curl_error($curl);}
  curl_close($curl);
   return $data ;
} 

$url='users.json';
$json=vget($url);

 $obj=json_decode($json);

  $data=$obj->data;
  $i=0;
   foreach ( $data as $unit )
   {
       $i++;
       $arr[$i]['Web']=$unit->Web;
       $arr[$i]['Name']=$unit->Name;

  }
 print_r($arr);

?>