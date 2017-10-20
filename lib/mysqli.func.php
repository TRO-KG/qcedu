<?php
$arr = array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
$keys = join(",", array_keys($arr));
$vals = "'".join("','", array_values($arr))."'";
echo $keys;
echo "<br />";
echo $vals;
//require_once "../include.php";
//
//function connect(){
//  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
//  if ($mysqli->connect_error > 0) {
//      echo "连接错误";
//      echo $mysqli->connect_error;
//      exit;
//  }
//	mysqli_set_charset($mysqli,DB_CHARSET);
//	mysqli_select_db($mysqli,DB_DBNAME) or die("指定数据库打开失败");
//  return $mysqli;
//}
//function insert($table,$array)
//{
//  $conn=connect();
//  $keys="".join(",",array_keys($array));
//  $vals="'".join("','",array_values($array))."'";
//  $sql="INSERT INTO {$table} ({$keys})VALUES ({$vals})";
//  if ($conn->query($sql) === TRUE) {
//      return null;
//  } else {
//      echo "Error: " . $sql . "<br>" . $conn->error;
//      return $sql;
//  }
//
//}

//function update($table,$array,$where=null)
//{
//  $sql="update {$table} set cName='{$array}' ".($where==null?null:" where ").$where;
//    如果没有传入判断条件，即为空，这里 $where==null? 为1   传入条件 即非空，那么执行传入的where 语句
//update shop_admin set username= "king" where id=1
//可以参照这句话    表达式1是否为真，如果为真，执行表达式2，要么执行表达式3   因为$where 为条件，例如id=1
//所以是"where".$where

//  mysqli_query(connect(),$sql);
//
//  return mysqli_affected_rows(connect());
//}
//
//function delete($table,$where)
//{
//  $where= $where==null?null:" where ".$where;
//  $sql ="delete from {$table}{$where}";
//  mysqli_query($sql);
//  return mysqli_affected_rows();
//
//}

/*查找操作,查找一条记录*/
//function fetchOne($sql,$result_type=MYSQLI_ASSOC){
//  $result=mysqli_query(connect(),$sql);
//  if ($result->num_rows > 0) {
//      // 输出每行数据
//      while($row = $result->fetch_assoc()) {
//          return $row;
//      }
//  } else {
//      echo "0 个结果";
//  }
//}
/*查找操作,获取所有记录*/
//function fetchAll($sql,$result_type=MYSQLI_ASSOC){

    //$result_type = MYSQL_ASSOC这个返回的数组是以数据表中的字段为键的而MYSQL_NUM是以数字为键搜索的
//  $conn=connect();
//  $result=$conn->query($sql);
//  if ($result->num_rows > 0) {
        // 输出每行数据
//      while($row = $result->fetch_assoc()) {
//          $rows[]=$row;
//      }
//  } else {
//      echo "0 个结果";
//  }
//  return $rows;
//}
/*获取记录条数*/
//function getResultNum($sql){
//  $conn=connect();
//  $result=$conn->query($sql);
//  $totalRows=$result->num_rows;
//  return $totalRows;
//}