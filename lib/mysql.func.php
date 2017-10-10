<?php
class mysql{
	private static $dbcon=false;
    private $link;
	private function __construct(){
        //连接数据库
        $this->db_connect();
    }
	//连接数据库
	private function db_connect(){
        $this->link=mysqli_connect(DB_HOST,DB_USER,DB_PWD);
        if(!$this->link){
            echo "数据库连接失败<br>";
            echo "错误编码".mysqli_errno($this->link)."<br>";
            echo "错误信息".mysqli_error($this->link)."<br>";
            exit;
        }
        mysqli_set_charset($this->link,DB_CHARSET);
        mysqli_select_db($this->link,DB_DBNAME) or die("指定数据库打开失败");
    }
    //公用的静态方法
    public static function getIntance(){
        if(self::$dbcon==false){
            self::$dbcon=new self;
        }
        return self::$dbcon;
    }
	//执行sql语句的方法
	public function query($sql){
        $res=mysqli_query($this->link,$sql);
        if(!$res){
            echo "sql语句执行失败<br>";
            echo "错误编码是".mysqli_errno($this->link)."<br>";
            echo "错误信息是".mysqli_error($this->link)."<br>";
        }
        return $res;
    }
	 //获得最后一条记录id
	public function getInsertid(){
        return mysqli_insert_id($this->link);
    }
	/**
     * 查询某个字段
     */
    public function getOne($sql, $result_type = MYSQL_ASSOC){
        $result=$this->query($sql);
        return mysqli_fetch_assoc($result);
    }
}
/*
 * 连接数据库
 * */
function connect(){
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败 Error:".mysqli_connect_errno().":".mysqli_connect_error());
	mysqli_set_charset($con,DB_CHARSET);
	mysqli_select_db($con,DB_DBNAME) or die("指定数据库打开失败");
}
/*
 * 插入数据
 * */
function insert($table,$arry){
 	$keys = join(",", array_keys($array));
	$vals = "'".join("','", array_values($array))."'";
	$sql = "insert {$table}($keys) values({$vals})";
	mysql_query($sql);
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
   	$result = mysqli_query($sql );
	$row = mysqli_fetch_array($result, $result_type);
	return $row;
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