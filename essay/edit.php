<!DOCTYPE html>
<html>
<head>
	<title>修改文章</title>
</head>
<body>
<?php
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='haha';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
try {
	$dbh = new PDO($dsn, $user, $pass); 
} catch (PDOException $e) {
	die ("Error!: " . $e->getMessage() . "<br/>");
}
if (!empty($_POST['id'])) {
	$id=$_POST['id'];
	$sql1="select * from essay where id={$id}";
	$source=$dbh->query($sql1);
	$result=$source->fetchAll(PDO::FETCH_ASSOC);
	if (count($result)==0) {
		echo '<script>alert("无此编号文章，请检查")</script>';
		echo "<script>location.href='html.php'</script>";
		exit();
	}
}
else{
	echo '<script>alert("文章编号为空")</script>';
	echo "<script>location.href='html.php'</script>";
	exit();
}



?>
<form name="form2" action="edit2.php" method="post">
	标题：<input type="text" name="title" value="<?php echo $result[0]['title']?>"><br>正文：<br>
	 <textarea name="content" rows="30" cols="100"><?php echo $result[0]['content']?></textarea>
	 <input type="submit" value="上传" >
	 <input name="back" type="button" value="返回主页" onclick="location.href='html.php'">
	 <input type="text" name="id" value="<?php echo $result[0]['id']?>" style="display: none">
</form>
</body>
</html>

