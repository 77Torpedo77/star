<!DOCTYPE html>
<html>
<head>
    <title>欢迎登录</title>
    <style type="text/css">
        body{align:center};
    </style>

</head>
<body>
<h2 align="center">
欢迎登录<br>
<form name="form1" action="login.php" method="post" >
    请输入用户名:<input type="text" name="username"><br>
    请输入密码:<input type="password" name="password"><br>
    <input name="sub" type="submit" value="提交">
    <input type="reset" value="重新填写">
    <input name="back" type="button" value="前往注册" onclick="location.href='register.php'">
</form>
</h2>
</body>
</html>

<?php
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='haha';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";


try 
{
    $dbh = new PDO($dsn, $user, $pass); 
    if (!empty(($_post))) {
    	$username=isset($_post['username']) ? trim($_POST['username']) : '';
    	$password=isset($_post['password']) ? ($_post['password']) : '';
    	$sql="select `id`,`password` from `user` where `username`='$username'";
    	if($res=$pdo->query($sql))
    	{
    		echo'<script>alert("登录成功");window.location.href="index.php";</script>';
    	}
    	else
    	{
    		die('登录失败');
    	}
    }
}
catch(PDOException $e)
{
	die ("Error!: " . $e->getMessage() . "<br/>");
}
?>