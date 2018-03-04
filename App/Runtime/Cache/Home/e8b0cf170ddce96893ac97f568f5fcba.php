<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link href="/APP/Home/View/css/main.css" rel="stylesheet" />
<link href="/APP/Home/View/css/slide.css" rel="stylesheet" />
<link href="/APP/Home/View/css/menu.css" rel="stylesheet" />
    <script src="/APP/Home/View/js/jquery-3.1.1.min.js" type=""></script>
    <script src="/APP/Home/View/js/slide.js" type=""></script>
<script src="/APP/Home/View/js/menu.js" type=""></script>
</head>

<body class="graybg">
<!-- 导航栏 -->
	<div id="nav">
		<div id="topnavbar" style="display: block;">
			<div id="topnanv" style="width: 100%;">
				<div class="first">
					<a href="#" target="_self">首页</a>
				</div>
				<div id="menu">
					<div content="att" class="menuitem">
						<a href="#">考勤</a>
					</div>
					<div content="act" class="menuitem">
						<a href="#">活动</a>
					</div>
					<div content="user" class="menuitem">
						<a href="#">个人</a>
					</div>
					<div id="item" class="itemcon" style="display: none; left: 1px;">
						<div></div>
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<!-- 轮播图 -->
 <div id="slider">
 <div id="allswapImg">
        <div class="swapImg"><img  class="spic" src="/Uploads/silder/1.jpg" alt="加载失败" onclick="<?php echo ($link1); ?>"/></div>
        <div class="swapImg"><img  class="spic" src="/Uploads/silder/2.jpg" alt="加载失败" onclick="<?php echo ($link2); ?>"/></div>
        <div class="swapImg"><img  class="spic" src="/Uploads/silder/3.jpg" alt="加载失败" onclick="<?php echo ($link3); ?>"/></div>
        <div class="swapImg"><img  class="spic" src="/Uploads/silder/4.jpg" alt="加载失败" onclick="<?php echo ($link4); ?>"/></div>
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

<!-- 讨论列表 -->
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="part">
<p><span class="title1"><?php echo ($vo["title"]); ?></span></p>
<img src="<?php echo ($vo["pic"]); ?>" width="100%" height="200px" alt="加载失败" onclick="location.href='/index.php/Home/Index/showDiscuss?id='+<?php echo ($vo["id"]); ?>"/>
<p style="text-align: right;"><font color="gray" size="1%"><?php echo ($vo["time"]); ?></font>
<img src="/APP/Home/View/image/good_on.png" class="icon" onclick="" alt=""/>
<font color="red" size="1%"><?php echo ($good); ?></font></p>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>