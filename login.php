<?php
header('Content-Type:text/html; charset=utf-8');
if(isset($_GET['logout'])){ //注销
    setcookie('sign','',-300);
    unset($_GET['logout']);
    header('location:index.php');
}

if(isset($_POST['username']) && isset($_POST['password'])){
    setcookie('sign',$_POST['username'],0,'');
    header("location:".$_POST['callback']."?sign={$_POST['username']}"); //回传cookie
}

if(emptyempty($_COOKIE['sign'])){
?>

<form method="post">
<p>用户名：<input type="text" name="username" /></p>
<p>密  码：<input type="password" name="password" /></p>
<input type="hidden" name="callback" value="<?php echo $_GET['callback']; ?>" />
<input type="submit" value="登录" />
</form>


<?php
}else{
    $query = http_build_query($_COOKIE);
    echo "系统检测到您已登录 {$_COOKIE['sign']} <a href="{$_GET['callback']}?{$query}">授权</a> <a href="?logout">退出</a>"; //已登录进行授权
}
?>
