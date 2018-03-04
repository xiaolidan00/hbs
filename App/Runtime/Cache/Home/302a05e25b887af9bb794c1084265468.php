<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/activity.css"  />
</head>

<body>
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>

 <span class="title">活动详情</span>
</div >
<!--end of body top-->

<div class="content">
<div class="tranbg">
<center>
<b><?php echo ($name); ?></b><br/>
<img src="<?php echo ($pic); ?>" style="padding:4px;width:240px;height:180px;" />
</center>

<span class="bluetext1 ">活动类型</span> 

<?php if($kind == 1): ?>班级活动
<?php elseif($kind == 2): ?>团日活动
<?php elseif($kind == 3): ?>联谊活动
<?php elseif($kind == 4): ?>主题班会
<?php elseif($kind == 5): ?>其他<?php endif; ?>

<hr class="line1"/>
<br/>
<span class="bluebg">活动地点</span>  <?php echo ($address); ?>
<hr class="line1"/>
<br/>

<span class="bluetext1 ">活动时间</span> <?php echo ($actime); ?>
<hr class="line1"/>

<br/>

<span class="bluebg">活动准备</span>
<hr class="line1"/>
<?php echo ($actprepare); ?><br/>

<br/>

<span class="bluetext1">活动流程</span>
<hr class="line1"/>
<?php echo ($actprocess); ?><br/>

<br/>


<span class="bluebg">注意事项</span>
<hr class="line1"/>
<?php echo ($notice); ?><br/>

<form action="./good" method="post">
<div style="text-align:right;">
<input type="hidden" name="id" value="<?php echo ($id); ?>"/>
<input type="hidden" name="part" value="activity"/>
<input type="image" src="/APP/Home/View/image/good_on.png" class="icon" /><font color="red" size="1%">（<?php echo ($good); ?>）</font>
</div>
</form>
<span class="bluetext1">评论</span>
<hr class="line"/>

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="padding:4px;margin-bottom:4px;">
<?php echo ($vo["username"]); ?>:<font color="brown"><?php echo ($vo["content"]); ?></font><br/>
<div style="text-align:right;">
<font color="gray" size="1%"><?php echo ($vo["time"]); ?></font>
<form action="./good" method="post">
<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
<input type="hidden" name="part" value="comment"/>
<input type="image" src="/APP/Home/View/image/good_on.png" class="icon"/><font color="red" size="1%">（<?php echo ($vo["good"]); ?>）</font>
</form>
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
</div>
<form action="./comment" method="post" >
<input type="hidden" name="pid" value="<?php echo ($id); ?>"/>
<input type="hidden" name="part" value="activity"/>
<input type="text" name="content" style="border-radius: 5px;border:1px solid gray;padding:4px;width:75%;margin:4px;"/>
<input type="submit" class="bt3" value="评论"/>
</form>
</body>
</html>