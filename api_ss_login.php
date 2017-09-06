<?php
if ($_POST) {
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://kompetisi.gunadarma.net/apa/api/cekd.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "username=" .$_POST['username'] ."&pass=" . $_POST['pass']);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$hasil = curl_exec ($ch);
curl_close ($ch);
echo $hasil;
} else {
      echo '<pre>{username} {pass} not found!</pre>';
}

?>
