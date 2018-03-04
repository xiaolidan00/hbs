<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手——班级</title>
<link href="/APP/Home/View/css/class.css" rel="stylesheet" />
</head>

<body class="graybg">
<div class="top"> <!--start of 蓝色横条-->
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">班级</span>
</div><!--end of 蓝色横条-->

<div class="content1"><!--start of 图片-->
		<center>			
 		<p>	<span class="title1"><?php echo ($class); ?></span></p>			
		<p>	<span class="title2"><?php echo ($school); ?></span></p>
		<p>	<span class="title2"><?php echo ($college); ?></span></p>
		<p>	<span class="title2"><?php echo ($grade); ?>级<?php echo ($major); ?></span></p>
		</div>			
</div><!--end of 图片-->

		<div class="part">
		<p class="subtitle">
			<img src="/APP/Home/View/image/sun.png" class="icon" /> 
			<span class="subtitle"> 班级简介 </span>
			</p>
		<?php echo ($summery); ?>		
		</div>

		<div class="part">
		<p class="subtitle">
			<img src="/APP/Home/View/image/sun.png" class="icon" /> 
			<span class="subtitle"> 考勤奖励 </span>
			</p>
			<?php echo ($rewards); ?>
		</div>
		<div class="kuang" ><a class="noline" href="/index.php/Home/Activity/showClassDetail?id=<?php echo ($id); ?>">班级详情 》》》</a></div>
		<div class="kuang" ><a class="noline" href="./showTaked">参加过的活动 》》》</a></div>
		<div class="kuang" ><a class="noline" href="./showClassReg">注册新班级 》》》</a></div>
		<div class="kuang" ><a class="noline" href="./showContact">通讯录 》》》</a></div>
		<div class="kuang" ><a class="noline" href="./showCourse">课程表 》》》</a></div>
</body>
</html>