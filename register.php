<!DOCTYPE html>
<html>
<head>
    <title>欢迎注册</title>
    <style type="text/css">
        body{align:center};
    </style>

</head>
<body>
<h2 align="center">
欢迎注册<br>
<form name="form1" action="register.php" method="post" >
    请输入用户名:<input type="text" name="username"><br>
    请输入密码:<input type="text" name="password"><br>
    请输入邮箱:<input type="text" name="email"><br>
    <input name="sub" type="submit" value="提交">
    <input name="back" type="button" value="返回登录" onclick="location.href='login.php'">
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
    if(!empty($_POST))
    {
        $field = array('username','password','email');
        $value = array();
        foreach ($field as $k => $v) 
        {
            $data=isset($_POST[$v]) ? $_POST[$v] : '';
            if ($data=='') {
                die($v.'字段不能为空');
            }
            $field[$k]="$v";
            $value[]="'$data'";
        }
        $field=implode(',', $field);
        $value=implode(',', $value);
        $sql="insert into user ($field) values ($value)";
        if ($res=$dbh->query($sql)) {
            echo '<script>alert("注册成功");
            window.location.href="login.php";</script>';
        }
        else{
            die('注册失败');
        }
    }

} 
catch (PDOException $e) 
{
    die ("Error!: " . $e->getMessage() . "<br/>");
}
?>