<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手——参加过的活动</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/class.css"  />
</head>

<body class="graybg">
<!--start of 蓝色横条-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">参加过的活动</span>
</div >
<!--end of 蓝色横条-->

<div class="part" >
<img src="/APP/Home/View/image/good_on.png" class="icon"/><?php echo ($claname); ?><span class="redtext">活动总获赞（<?php echo ($good); ?>）</span>
</div>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="part" >
<table style="width:100%;">
<tr>
<td>
<span class="bluetext" ><?php echo ($vo["name"]); ?></span><br/>
<font color="gray" size="1%"><?php echo ($vo["time"]); ?></font><br/>
<img src="/APP/Home/View/image/good_on.png" class="icon" />
<font color="red" size="1%" ><?php echo ($vo["good"]); ?></font>
</td>
<td style="text-align:right;">
<img src="<?php echo ($vo["pic"]); ?>" class="pic1" onclick="location.href='/index.php/Home/Activity/showActDetail?id=<?php echo ($vo["id"]); ?>'"/>
</td>
</tr>
</table>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>