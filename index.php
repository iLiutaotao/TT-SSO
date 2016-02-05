<?php
header('Content-Type:text/html; charset=utf-8');
$sso_address = 'http://example.com/sso/login.php'; //SSO所在的域名
$callback_address = 'http://'.$_SERVER['HTTP_HOST']
                    .str_replace('index.php','',$_SERVER['SCRIPT_NAME'])
                    .'callback.php'; //callback地址用于回调设置cookie

if(isset($_COOKIE['sign'])){
    exit("欢迎您{$_COOKIE['sign']} <a href="login.php?logout">退出</a>");
}else{
    echo '您还未登录 <a href="'.$sso_address.'?callback='.$callback_address.'">点此登录</a>';
}
?>
<iframe src="<?php echo $sso_address ?>?callback=<?php echo $callback_address ?>" frameborder="0"  width="0" height="0"></iframe>
