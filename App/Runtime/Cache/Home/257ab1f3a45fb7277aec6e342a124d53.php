<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>班级详情</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/activity.css"  />
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/slide.css"  />
<script src="/APP/Home/View/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">班级详情</span>
</div >
<!--end of body top-->

<div class="content">
<div style="text-align: center;"><span style="background:#03C;color:#FFF;padding:8px;"><?php echo ($claname); ?></span>
<hr class="line1"/>
</div>

<div class="tranbg">
<div style="text-align:center;">
<img src="<?php echo ($photo); ?>" style="width:240px;height:180px;padding:4px;" />
</div>
<br/>

<span class="bluetext1 textleft">班级</span>
<hr class="line"/>
学校：<font color="blue"><?php echo ($school); ?>	</font><br/>
学院：<font color="blue"><?php echo ($college); ?></font>	<br/>
专业：<font color="blue"><?php echo ($grade); ?>级<?php echo ($major); ?></font><br/>
<br />
<span class="bluetext1 textleft">班级简介</span>
<hr class="line"/>
<?php echo ($summery); ?><br/>
<br/>
<span class="bluetext1 textleft">参加过的活动</span>
<hr class="line"/>
<?php if(is_array($actlist)): $i = 0; $__LIST__ = $actlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Activity/showActDetail?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>
<br/>
<div style="text-align:right;">
<form action="./good" method="post">
<input type="hidden" name="id" value="<?php echo ($id); ?>"/>
<input type="hidden" name="part" value="classes"/>
<input type="image" src="/APP/Home/View/image/good_on.png" class="icon" /><font color="red" size="1%">（<?php echo ($good); ?>）</font>
</form>
</div>

<div style="text-align: center;">
<input type="button" value="邀请联谊" class="bt2" onclick="location.href='./showInvite'"/>
</div>
<br/>
<span class="bluetext1 textleft">评论</span>
<hr class="line"/>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form action="./good" method="post">
<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
<input type="hidden" name="part" value="classes"/>
<?php echo ($vo["username"]); ?>:<font color="brown"><?php echo ($vo["content"]); ?></font><br/>
<div style="text-align:right;">
<font color="gray" size="1%"><?php echo ($vo["time"]); ?></font>
<input type="image" src="/APP/Home/View/image/good_on.png" class="icon"/><font color="red" >（<?php echo ($vo["good"]); ?>）</font>
</div>
</form><?php endforeach; endif; else: echo "" ;endif; ?>


</div>
<form action="./comment" method="post" >
<input type="hidden" name="pid" value="<?php echo ($id); ?>"/>
<input type="hidden" name="part" value="classes"/>
<input type="text" name="content" style="border-radius: 5px;border:1px solid gray;padding:4px;width:75%;margin:4px;"/>
<input type="submit" class="bt3" value="评论"/>
</form>

</body>
</html>