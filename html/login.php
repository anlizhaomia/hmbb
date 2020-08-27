

<?php
header("Content-type:text/html;charset=utf-8");
$name = $_POST["username"];
$pwd = $_POST["password"];
$conn = mysql_connect("localhost","root","root");
if(!$conn){
	echo ("连接出错".mysql_error());
	
}else{
	mysql_select_db("student",$conn);
	$result = mysql_query("select * from student where stuName='$name'",$conn);
	$rows = mysql_num_rows($result);
if($rows>0){
  mysql_close($conn);
  echo "-1";
 }else{
  $result = mysql_query("insert into student(stuName,stuId) values('$name','$pwd')",$conn);
  mysql_close($conn);
  if($result!=1){
   echo "0";
  }else{
   echo "1";
  } 
 }
}
?>