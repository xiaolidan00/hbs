<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/activity.css"  />

</head>

<body class="graybg">
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <a class="title active" href="./showActList">活动IDEAS</a>
 <a class="title" href="./showClassList">班级联谊</a> 
  <a class="title" href="./showRecList">活动回忆</a>
</div >
<!--end of body top-->
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="part" >
<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
<img src="<?php echo ($vo["pic"]); ?>" class="image1" onclick="location.href='/index.php/Home/Activity/showActDetail?id=<?php echo ($vo["id"]); ?>'"/>
<br/>
<p><?php echo ($vo["name"]); ?>
<img src="/APP/Home/View/image/good_on.png" class="icon"/>
<font color="red" ><?php echo ($vo["good"]); ?></font> </p>
<font color="gray" size="1%">发布班级：<?php echo ($vo["claname"]); ?></font>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<img src="/APP/Home/View/image/add.png" style="float:right;top:60px;"
width="48" height="48" 
onclick="location.href='/index.php/Home/Activity/showActAdd'" />
</body>
</html>