<?php
session_start();
srand(microtime()*1000000);
$captcha=strval(rand("1111111","9999999"));
$_SESSION["captcha"]=$captcha;
$img=imagecreate(70,20);
Header("C3ontent-type:image/png");
$black=ImageColorAllocate($img,0,0,0);
$white=ImageColorAllocate($img,239,239,239);
$gray=ImageColorAllocate($img,180,170,170); 
imagefill($img,0,0,$white);
imagestring($img,5,4,1,$captcha,$gray);
for($i=0;$i<150;$i++)
{ 
	$randcolor = ImageColorallocate($img,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($img, rand()%71 , rand()%21 , $randcolor); 
}
ImagePng($img);
ImageDestroy($img);
die();
?>
