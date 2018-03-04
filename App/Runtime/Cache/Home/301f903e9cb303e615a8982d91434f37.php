<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta charset="UTF-8">
<title>好班手</title>
<link href="/APP/Home/View/css/user.css" rel="stylesheet"/>
</head>
<body>
<center><img src="/APP/Home/View/image/icon.png"/><br/>
<span style="font-size:24px;"><?php echo ($msg); ?></span><br/>
<?php if($_COOKIE['hbs_kind']==1){ ?>
<input type="button" class="bt1" value="返回首页" onclick="location.href='/index.php/Home/Index/showMainM';">
<?php }else{ ?>

<input type="button" class="bt1" value="返回首页" onclick="location.href='/index.php/Home/Index/showMain';">
<?php } ?>
<input type="button" class="bt2" value="跳转到用户中心" onclick="location.href='/index.php/Home/User/showUser';">

 </center>
</body>
</html>