<?php
	$num = 4;
	$str = getcode($num,2);
	$im_w = $num*24;
	$im_h = 30;
	$fz = 18;
	$th = 26;
	$count = 200;
	
	$im = imagecreatetruecolor($im_w,$im_h);
//	$color = ImageColorAllocate($im, rand(0,100),rand(0,100),rand(0,100));
	$bg = ImageColorAllocate($im, rand(180,255),rand(180,255),rand(180,255));
	
	
	
	imagefill($im, 0, 0, $bg);
	
	for($i=0; $i<$count; $i++){
		$randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
		imagesetpixel($im, rand(0,$im_w), rand(0,$im_h), $randcolor);
	}
	
	$rand = rand(5,30);
	$rand1 = rand(15,25);
	$rand2 = rand(5,10);
	for ($yy=$rand; $yy<=+$rand+2; $yy++){
		for ($px=-80;$px<=80;$px=$px+0.1)
		{
			$x=$px/$rand1;
			if ($x!=0)
			{
				$y=sin($x);
			}
			$py=$y*$rand2;

			imagesetpixel($im, $px+80, $py+$yy, ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255)));
		}
	}
	
	
	
	$font  = ["t1.ttf","t2.ttf","t6.ttf","t7.ttf","t10.ttf"];
	
	for($i=0;$i<$num;$i++){
		imagettftext($im, $fz, rand(-20,20), 10+($fz*$i),$th, ImageColorAllocate($im, rand(0,150),rand(0,150),rand(0,150)),"ttfs/".$font[rand(0,count($font)-1)], $str[$i]);
	}
	
	Header("Content-type: image/png");
	ImagePNG($im);
	ImageDestroy($im);
	session_start(); 
	$overtime = time();
	$verify = array($str,$overtime);
	$_SESSION['code'] = $verify;	

	function getcode($m = 4, $type = 0){
		$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$t = array(9,35,strlen($str)-1);
		
		$c = "";
		for( $i=0; $i<$m; $i++){

			$c.=$str[rand(0,$t[$type])];
		}
		return $c;
	}