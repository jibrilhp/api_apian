<?php

class ig_bemfikti
{

   public function getGambar(){
      $url = 'https://www.instagram.com/ug_bemfikti/media/';
  $json = $this->Ambil($url);
  
  $data = json_decode($json,true);
    
    return $data;
 }
   private function Ambil($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; rv:54.0) Gecko/20100101 Firefox/54.0');
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);   
  $hasil = curl_exec($ch);
  curl_close($ch);
  return $hasil;
 }
  

}

$baca = new ig_bemfikti();
$jadi =$baca->getGambar();
//print_r($jadi);
$bilangan = array (1,4,7,10,13,16);
$loadapa = array();
foreach ($jadi as $awal) {
	foreach ($awal as $nomor => $buka) {
//print_r($buka);
		 if (in_array($nomor,$bilangan)) {
			//echo  $buka['images']['standard_resolution']['url'];
			$dari = $buka['images']['standard_resolution']['url'];
			$untuk =$buka['caption']['text'];
			$total = $dari . "$". $untuk;
			nl2br($total,true);
			array_push($loadapa,$total);
			
			
		}
	}
	
	
}
$kembali = json_encode($loadapa);
echo $kembali;


?>