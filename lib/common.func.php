<?php
function alertMsg($msg,$url=null){
	if($url){
		echo "<script>window.location = '{$url}';</script>";
	}
	echo "<script>alert('{$msg}');</script>";	
}
