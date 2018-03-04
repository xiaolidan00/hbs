<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/main.css"  />

</head>

<body class="graybg">
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">讨论</span>
</div >
<div class="part">
<p><span class="title1"><?php echo ($title); ?></span></p>
<img src="<?php echo ($pic); ?>" width="100%" height="200px" alt="加载失败" onclick="location.href='/index.php/Home/Activity/showActDetail'"/>
<p><?php echo ($content); ?></p>
<p style="text-align:right;"><font color="gray" size="1%"><?php echo ($time); ?></font>
<img src="/APP/Home/View/image/good_on.png" class="icon"/>
<font color="red" size="1%"><?php echo ($good); ?></font></p>
</div>

<span class="bluetext1">评论</span>
<hr class="line"/>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form action="./good" method="post">
<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
<input type="hidden" name="pid" value="<?php echo ($id); ?>"/>
<div style="margin-bottom:4px;padding:8px;width:96%;background:#FFF;">
<?php echo ($vo["username"]); ?>:<font color="#642100"><?php echo ($vo["content"]); ?></font><br/>
<div style="text-align:right;"><font color="gray" size="1%"><?php echo ($vo["time"]); ?></font>
<input type="image" src="/APP/Home/View/image/good_on.png" class="icon" />
<font color="red" size="1%">（<?php echo ($vo["good"]); ?>）</font>
</div>
</div>
</form><?php endforeach; endif; else: echo "" ;endif; ?>
<form action="./comment" method="post" >
<input type="hidden" name="part" value="discuss"/>
<input type="hidden" name="pid" value="<?php echo ($id); ?>"/>
<input type="text" name="content" style="border-radius: 5px;border:1px solid gray;padding:4px;width:75%;margin:4px;"/>
<input type="submit" class="bt1" value="评论"/>
</form>
</body>
</html>