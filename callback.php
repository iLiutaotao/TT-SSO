<?php
header('Content-Type:text/html; charset=utf-8');
if(emptyempty($_GET)){
    exit('您还未登录');
}else{
    foreach($_GET as $key=>$val){
        setcookie($key,$val,0,'');
    }
    header("location:index.php");
}
?>
