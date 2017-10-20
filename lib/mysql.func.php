<?php
/*
 * 连接数据库
 * */
function connect(){
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败 Error:".mysqli_connect_errno().":".mysqli_connect_error());
	mysqli_set_charset($con,DB_CHARSET);
	mysqli_select_db($con,DB_DBNAME) or die("指定数据库打开失败");
	return $con;
}
/*
 * 插入数据
 * */
function insert($table,$arry){
	$con = connect();
 	$keys = join(",", array_keys($array));
	$vals = "'".join("','", array_values($array))."'";
	$sql = "insert {$table}($keys) values({$vals})";
	mysqli_query($con,$sql);
	return mysql_insert_id();
}
/*
 * 更新数据
 * */
function update($table,$array,$where=null){
 	foreach($array as $key=>$val){
 		if($str==null){
 			$sep = "";
 		}else{
 			$sep = ",";
 		}
		$str.=$sep.$key."='".$val."'";
 	}
	$sql = "update {$table} set {$str}".($where == null?null:" where ".$where);
	mysql_query($sql);
	return mysql_affected_rows();
}
/*
 * 删除数据
 * */
function delete($table,$where=null){
	$where = $where == null?null : " where ". $where;
	$sql = "delete from {$table} {$where}";
	mysql_query($sql);
	return mysql_affected_rows();
}
/*
 * 查找数据
 * (查找指定数据)
 * */

function fetchOne($sql, $result_type = MYSQL_ASSOC){
	$con = connect();
   	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row;
        }
    } else {
        echo "0 个结果";
    }
}

/*
 * 查找数据
 * （查找所有数据）
 * */
function fetchAll($sql, $result_type = MYSQL_ASSOC){
	$result = mysql_query($sql);
	while (@$row = mysql_fetch_array($result,$result_type)) {
		$rows[] = $row;
	}
	return $rows;
}

/*
 *查找数据条数 
 * */
function getResultNum($sql){
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}