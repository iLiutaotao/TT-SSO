<?php
header('Content-Type:text/html; charset=utf-8');
if(isset($_COOKIE['sign'])){ //检测登录状态
    $callback = urldecode($_GET['callback']);unset($_GET['callback']);
    $query = http_build_query($_COOKIE);
    $callback = $callback."?{$query}";
}else{
    exit;
}
?>
<html><script type="text/javascript">top.location.href="<?php echo $callback; ?>";</script></html>
