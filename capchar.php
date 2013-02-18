<?php
session_start();
srand(microtime()*100000);
$capchar=strval(rand("11111","99999"));
$_SESSION["capchar"]=$capchar;
$img=imagecreate(65,20);
Header("Content-type:image/png");
$black=ImageColorAllocate($img,0,0,0);
$white=ImageColorAllocate($img,255,255,255);
$gray=ImageColorAllocate($img,100,100,100); 
imagefill($img,0,0,$white);
imagestring($img,5,4,1,$capchar,$gray);
for($i=0;$i<200;$i++)
{ 
	$randcolor = ImageColorallocate($img,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($img, rand()%70 , rand()%30 , $randcolor); 
}
ImagePng($img);
ImageDestroy($img);
die();
?>
