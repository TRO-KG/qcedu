<?php 
function pageFun($table,$pageSize,$page){
	$sql = "select * from {$table}";
	// 得到数据条数
	$totalRows = getResultNum($sql);
	// 计算总页数
	$totalPage =ceil($totalRows/$pageSize);
	// 设置当前页码
	$page = $page ? (int)$page : 1;
	if($page < 1 || $page == null || !is_numeric($page)){
		$page = 1;
	}
	if($page >= $totalPage) $page = $totalPage;
	// 设置偏移量
	$offet = ($page - 1) * $pageSize;
	$sql = "select * from {$table} limit {$offet},{$pageSize}";
	$rows = json_encode(fetchAll($sql));
	$res = '{"totalRows":"'.$totalRows.'","rows":'.$rows.'}';
	return $res;
}

