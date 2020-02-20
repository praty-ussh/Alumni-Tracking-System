<?php
error_reporting(0);	
session_start();

function getRandomWord($len = 5) {
    $word = array_merge(range('0', '9'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}

$ranStr = getRandomWord();
$_SESSION["vercode"] = $ranStr;


$height = 35; //CAPTCHA image height
$width = 120; //CAPTCHA image width
$font_size = 23; 

$image_p = imagecreate($width, $height);
$graybg = imagecolorallocate($image_p, 34, 34, 34);
$textcolor = imagecolorallocate($image_p, 245, 245, 245);

imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, dirname(__FILE__).'/fonts/mono.ttf', $ranStr);
//imagestring($image_p, $font_size, 5, 3, $ranStr, $white);
imagepng($image_p);

	
?>
