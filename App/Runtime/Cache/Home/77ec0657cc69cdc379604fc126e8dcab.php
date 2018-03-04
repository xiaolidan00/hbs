<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/activity.css"  />

</head>


<body>
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">发出邀请函</span>
</div >


<form action="./actInvite" method="post">
<table style="margin:8px auto;width:80%">
<tr>
<td>邀请班级</td>
<td><select type="text" name="invited" class="select1">
<?php if(is_array($clalist)): $i = 0; $__LIST__ = $clalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["claname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
</td></tr>
<tr>
<td>联谊时间</td>
<td>
<input type="text"  name="actime" class="text2"/>
</td></tr>

<tr>
<td>邀请内容</td>
<td><textarea name="content" class="ta3"></textarea></td>
</tr>

<tr>
<td>邀请活动</td>
<td>
<select type="text" name="class" class="select1">
<?php if(is_array($actlist)): $i = 0; $__LIST__ = $actlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
</td></tr>
</table>
<font color="red"><?php echo ($error); ?></font>
<div style="text-align:center;">
<input type="submit"  value="发出邀请" class="bt2"/>
</div>
</form>
</body>
</html>