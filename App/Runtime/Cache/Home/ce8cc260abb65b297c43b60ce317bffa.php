<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/attend.css"  />
</head>

<body>
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">手动签到</span>
</div >
<!--end of body top-->
<center>
 <form action="./attInhand" method="post">
<table style="width:100%;">

<tr >
<th class="head">学号</td>
<th class="head">姓名</td>
<th class="head">到场</td>
<th class="head">请假</td>
<th class="head">旷课</td>
</tr>

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="text-align: center;">
<td><?php echo ($vo["stuid"]); ?><input type="hidden" name="uid[]" value="<?php echo ($vo["stuid"]); ?>"/></td>
<td><?php echo ($vo["username"]); ?></td>
<td><input type="checkbox" name="status[]" value="1"/></td>

<?php if($vo["leave"] == true): ?><td><input type="checkbox" name="status[]" value="0" checked="checked"/></td>
<?php else: ?> 
<td><input type="checkbox" name="status[]" value="0"/></td><?php endif; ?>

<td><input type="checkbox" name="status[]" value="-1"/></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<p><input type="button" class="bt1" value="重置" onclick="location.href='./showInhand';">
<input type="submit" name="submit" class="bt1" value="保存" >
</p>
</form>
</center>
</body>
</html>