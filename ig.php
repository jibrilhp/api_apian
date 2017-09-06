 <?php

class Plugin_Instagram {
  public $user_id = '';
   public function __construct($user_id) {
  $this->user_id = $user_id;
 }
   public function getMedia($count=20){
      $url = 'https://www.instagram.com/'.$this->user_id.'/media/';
  $json = $this->fetchData($url);
  echo $json;
  
  $data = json_decode($json,true);
    if(!isset($data->items)){
   return array();
  }
    $return = array();    $i=0;
    foreach($data->items as $post){
   $return[] = array(
    'link'=>$post->link,
    'type'=>$post->type,            'img'=>$post->images->thumbnail->url,
    'img2'=>$post->images->low_resolution->url,
    'img3'=>$post->images->standard_resolution->url,
   );
   $i++;
   if($i>=$count){
    break;
   }
  }
    return $return;
 }
   private function fetchData($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; rv:54.0) Gecko/20100101 Firefox/54.0');
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);   
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
 }
  }
  
  
  $instagram = new Plugin_Instagram(''. $_GET['ig_id'].'');
$images = $instagram->getMedia(20); // get only latest 3 images


 
 
 
 
 
/*
foreach($images as $p){
echo '<img src="' . $p[img3] . '" alt="Smiley face" width="200" height="300">';
 }
 */
 //print_r($images);
 
 
 ?>

