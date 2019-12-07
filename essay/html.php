<!DOCTYPE html>
<html>
<head>
	<title>主页</title>
</head>
<body>
	
<form name="form1" action="edit.php" method="post">
	前往文章发布页：<input type="button" name="add" onclick="location.href='add.php'" value="添加文章">    
	前往文章删除页：<input type="button" name="delete" onclick="location.href='delete.php'" value="删除文章"> 
	请输入要编辑的文章编号：<input type="text" name="id">
	<input type="submit" value="确认">
</form>
</body>
</html>

<?php
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='haha';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
try {
	$dbh=new PDO($dsn,$user,$pass);
	$sql='select * from essay order by id asc';
	$source=$dbh->query($sql);
	$result=$source->fetchAll(PDO::FETCH_ASSOC);
	$num=count($result);
	//echo $num.'<br>';
	//print_r($result);
	for ($i=0; $i < $num; $i++) { 
		echo '文章编号：'.$result[$i]['id'].'<br>';
		echo '发布时间：'.$result[$i]['time'].'<br>';
		echo '标题：'.$result[$i]['title'].'<br>';
		echo '正文：'.$result[$i]['content'].'<br>';
		echo '<br>';
	}

	
} catch (PDOException $e) {
	die ("Error!: " . $e->getMessage() . "<br/>");
}
?>