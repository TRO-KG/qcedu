<?php
require_once 'string.func.php';
function verifyImage($type = 1,$length = 4,$pixel = 0,$line = 0,$sess_name = "verify"){
	session_start();
	$im_w = $length*20;
	$im_h = 30;
	$im = imagecreatetruecolor($im_w, $im_h);
	$bg = ImageColorAllocate($im, rand(180,255),rand(180,255),rand(180,255));
	$white = ImageColorAllocate($im, 255, 255, 255);
	$chars = buildRandomString($type, $length);
	$_SESSION[$sess_name]=$chars;
	$fontfiles  = ["t1.ttf","t2.ttf","t6.ttf","t7.ttf","t10.ttf"];
	
	imagefill($im, 0, 0,$bg);

	if($pixel){
		for($i = 0; $i < 50; $i ++){
			$randcolor = ImageColorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagesetpixel($im, mt_rand(0,$im_w-1), mt_rand(0,$im_h-1), $randcolor);
		}
	}
	
	if($line){
		for($i = 1; $i<$line; $i++){
			$randcolor = ImageColorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imageline($im, mt_rand(0,$im_w-1), mt_rand(0,$im_h-1), mt_rand(0,$im_w-1), mt_rand(0,$im_h-1), $randcolor);
		}
	}
	
	for($i=0;$i<$length;$i++){
		$size = mt_rand(14, 18);
		$angle = mt_rand(-15, 15);
		$x = 8+$i*$size;
		$y = mt_rand(20, 26);
		$color = ImageColorAllocate($im, mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
		$fontfile = "../fonts/".$fontfiles[rand(0,count($fontfiles)-1)];
		$text = substr($chars, $i, 1);
		imagettftext($im, $size, $angle, $x,$y, $color,$fontfile, $text);
	}
	header("content-type:image/png");
	ImagePNG($im);
	ImageDestroy($im);
}
verifyImage();