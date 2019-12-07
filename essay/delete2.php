<?php
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='haha';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
try {
	 $dbh = new PDO($dsn, $user, $pass); 
	 if (!empty($_POST['id'])) {
	 	$id=$_POST['id'];
	 	$sql="delete from essay where id={$id}";
	 	if ($res=$dbh->exec($sql)) {
			echo '<script>alert("删除成功")</script>';
			echo "<script>location.href='html.php'</script>";
		}
		else{
			echo '<script>alert("文章编号错误")</script>';
			echo "<script>location.href='delete.php'</script>";
		}
	 }
	 else{
		echo '<script>alert("文章编号为空")</script>';
		echo "<script>location.href='delete.php'</script>";
	}
	 
} catch (PDOException $e) {
	 die ("Error!: " . $e->getMessage() . "<br/>");
}

?>