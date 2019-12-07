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

if (!empty($_POST['title']) and !empty($_POST['content'])) 
	{
		$title=$_POST['title'];
		$content=$_POST['content'];
		$id=$_POST['id'];
		//echo $id;
		$sql2="update essay set title='{$title}', content='{$content}' where id='{$id}'";
		//echo $sql2;
		if ($res=$dbh->exec($sql2)) {
			echo '<script>alert("修改成功")</script>';
			echo "<script>location.href='html.php'</script>";
		}
		else{
			echo '<script>alert("修改失败或未作改动")</script>';
			echo "<script>location.href='html.php'</script>";
		}
	}
	else{
		echo '<script>alert("标题或正文为空")</script>';
		echo "<script>location.href='html.php'</script>";
	}

?>