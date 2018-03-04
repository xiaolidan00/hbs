<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/activity.css"  />
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/slide.css"  />
    <script src="/APP/Home/View/js/jquery-3.1.1.min.js" type=""></script>
    <script src="/APP/Home/View/js/slide.js" type=""></script>
</head>

<body>
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">活动回忆</span>
</div >
<!--end of body top-->


<!-- 轮播图 -->
 <div id="slider">
 <div id="allswapImg">
        <div class="swapImg"><img  class="spic" src="<?php echo ($pic1); ?>" alt="加载失败"/></div>
        <div class="swapImg"><img  class="spic" src="<?php echo ($pic2); ?>" alt="加载失败" /></div>
        <div class="swapImg"><img  class="spic" src="<?php echo ($pic3); ?>" alt="加载失败" /></div>
        <div class="swapImg"><img  class="spic" src="<?php echo ($pic4); ?>" alt="加载失败" /></div>
    </div>
    <div class="btn btnLeft"> < </div>
    <div class="btn btnRight"> > </div>
    <div id="tabs">
        <div class="tab active">1</div>
        <div class="tab">2</div>
        <div class="tab">3</div>
        <div class="tab">4</div>
    </div>
</div>

<div style="margin-top:300px;">
<div class="content" >
<div class="tranbg">

<center><span class="bluebg"><?php echo ($title); ?></span></center>
<hr class="line1"/>


<?php echo ($content); ?><br/>

<br/>
<font color="blue" size="1%">
撰写人：<?php echo ($username); ?><br/>
班级：<?php echo ($claname); ?><br/>
</font>
<font size="1%" color="gray">发布时间：<?php echo ($time); ?></font>
<br/>
<div align="right">
<a href="/index.php/Home/Activity/showActDetail?id=<?php echo ($actid); ?>">活动详情</a>
</div>
<form action="./good" method="post">
<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
<input type="hidden" name="part" value="record"/>
<p align="right">
<input type="image" src="/APP/Home/View/image/good_on.png" class="icon"/><font color="red" size="1%">（<?php echo ($good); ?>）</font>
</p>
</form>

<span class="bluetext1">评论</span>
<hr class="line"/>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="margin-bottom:4px;">
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
<input type="hidden" name="part" value="record"/>
<input type="text" name="content" style="border-radius: 5px;border:1px solid gray;padding:4px;width:75%;margin:4px;"/>
<input type="submit" class="bt3" value="评论"/>
</form>

</div>
</body>
</html>