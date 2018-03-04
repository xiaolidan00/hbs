<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/attend.css"  />
</head>

<body class="graybg">
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">请假记录</span>
</div >
<!--end of body top-->
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="part">
<p>从:<font color="brown" size="1%"><?php echo ($vo["start"]); ?></font></p>
<p>到:<font color="brown" size="1%"><?php echo ($vo["end"]); ?></font></p>
<p>理由：<font color="gray"><?php echo ($vo["reason"]); ?></font></p>
<p>状态:<font color="brown" size="1%"><?php if($vo["status"] == 1): ?>批准
<?php elseif($vo["status"] == 0): ?>未回复
<?php elseif($vo["status"] == -1): ?>不批<?php endif; ?></font></p>
<p><font color="gray" size="1%">申请时间:<?php echo ($vo["time"]); ?></font></p>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>