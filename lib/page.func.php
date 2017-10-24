<?php
require_once "../include.php";

$sql = "select * from qc_admin";
$totalRows = getResultNum($sql);
$pageSize = 2;
$totalPage = ceil($totalRows/$pageSize);


$page = $_REQUEST["page"]?(int)$_REQUEST["page"]:1;

if($page < 1 || $page == NUll || !is_numeric($page)){
	$page = 1;
}
if($page >= $totalPage){
	$page =$totalPage;
};

$offset = ($page - 1) * $pageSize;
$sql = "select * from qc_admin limit {$offset},{$pageSize}";
$rows = fetchAll($sql);

foreach($rows as $row){
	echo "管理员：".$row["username"]."<br />";
	echo "管理员账号：".$row["account"];
	echo "<hr />";	
}
showPage($page, $totalPage);
function showPage($page, $totalPage, $where=null, $sep="&nbsp;"){
	$where = ($where == null)?null:"&".$where;
	$url = $_SERVER["PHP_SELF"];
	$index = ($page == 1)?"首页":"<a href='{$url}?page=1{$where}'>首页</a>";
	$last = ($page == $totalPage)?"尾页":"<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
	$prev = ($page == 1)?"上一页":"<a href='{$url}?page=".($page - 1)."'>上一页</a>";
	$next = ($page == $totalPage)?"下一页":"<a href='{$url}?page=".($page + 1)."'>下一页</a>";
	$str ="总共{$totalPage}页/当前第{$page}页";
	for($i=1;$i<=$totalPage;$i++){
		if($page == $i){
			$p.= "[{$i}]";
		}else{
			$p.= "<a href='{$url}?page={$i}'>[{$i}]</a>";
		}
	}
	echo $str."<br />".$index.$prev.$p.$next.$last;
}