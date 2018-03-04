<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/class.css"  />
</head>

<body>
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <a class="title " href="/index.php/Home/Class/showCourse">通讯录</a>
</div >
<!--end of body top-->
<center>

<table style="width:100%;">

<tr >
<th class="head">学号</td>
<th class="head">姓名</td>
<th class="head">宿舍</td>
<th class="head">手机</td>
<th class="head">家</td>
</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
<td class="text"><?php echo ($vo["stuid"]); ?></td>
<td class="text"><?php echo ($vo["username"]); ?></td>
<td class="text"><?php echo ($vo["room"]); ?></td>
<td class="text"><?php echo ($vo["phone"]); ?></td>
<td class="text"><?php echo ($vo["province"]); echo ($vo["city"]); ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</center>

</body>
</html>