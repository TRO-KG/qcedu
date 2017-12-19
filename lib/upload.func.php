<?php
	require_once "string.func.php";
	header("Content-type: text/html; charset=utf-8");
	$fileName = $_FILES["file"]["name"];
	$fileType = $_FILES["file"]["type"];
	$tmp_name = $_FILES["file"]["tmp_name"];
	$error = $FILES["file"]["error"];
	$fileSize = $_FILES["file"]["size"];
	$allowExt = array("gif","jpeg","jpg","png","wbmp");
	
	
	$ext = getExt($fileName);
	$fileName = getUniName().".".$ext;
	if($error == UPLOAD_ERR_OK){
		if(!in_array($ext,$allowExt)){
			exit("图片格式不正确，请选择后缀为gif/jpeg/jpg/png/wbmp的图片");
		}
		$destination = "../uploads/".$fileName;
		if(is_uploaded_file($tmp_name)){
			if(move_uploaded_file($tmp_name,$destination)){
				$msg = "文件上传成功";
				$file = '{"name":"'.$fileName.'"}';
			}else{
				$msg = "文件移动失败";
			}
		}else{
			$msg = "文件上传方式不正确";
		}
	}else{
		switch($error){
			case 1:
			$msg = "超过了配置文件上传文件的大小";
			break;
			case 2:
			$msg = "超过了表单配置上传文件的大小";
			break;
			case 3:
			$msg = "文件部分被上传";
			break;
			case 4:
			$msg = "没有文件被上传";
			break;
			case 6:
			$msg = "没有找到临时目录";
			break;
			case 7:
			$msg = "文件不可写";
			break;
			case 8:
			$msg = "由于PHP的扩展程序中断了文件的上传";
			break;
		}
	}
	if($file){
		echo '{"msg":"'.$msg.'","file":'.$file.'}';
	}else{
		echo "{msg:".$msg."}";
	}
