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
function insert($table,$array){
	$con = connect();
 	$keys = join(",", array_keys($array));
	$vals = "'".join("','", array_values($array))."'";
	$sql = "insert into {$table} ($keys) values ({$vals})";
	mysqli_query($con,$sql);
	return mysqli_insert_id($con);
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
	$con = connect();
	mysqli_query($con,$sql);
	return mysqli_affected_rows($con);
}
/*
 * 删除数据
 * */
function delete($table,$where=null){
	$where = $where == null?null : " where ". $where;
	$sql = "delete from {$table} {$where}";
	$con = connect();
	mysqli_query($con,$sql);
	return mysqli_affected_rows($con);
}
/*
 * 查找数据
 * (查找指定数据)
 * */

function fetchOne($sql){
	$con = connect();
   	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row;
        }
    }else{
    	alertMsg("请检查管理员账号或密码！！","login.php");
    }
}

/*
 * 查找数据
 * （查找所有数据）
 * */
function fetchAll($sql){
	$con = connect();
	$result = mysqli_query($con,$sql);
	while($row = $result->fetch_assoc()) {
            $rows[]=$row;
        }
	return $rows;
}

/*
 *查找数据条数 
 * */
function getResultNum($sql){
	$con = connect();
	$result = mysqli_query($con,$sql);
	return mysqli_num_rows($result);
}