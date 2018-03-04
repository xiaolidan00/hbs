<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link href="/APP/Home/View/css/class.css" rel="stylesheet"/>
</head>

<body class="graybg">

<form action="./saveClass" method="post">
<div class="top"> <!--start of 蓝色横条-->
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">班级管理</span>
 <input type="image" class="save" src="/APP/Home/View/image/save.png" />
</div><!--end of 蓝色横条-->

<div class="content1"><!--start of 图片-->
		<center>			
 		<p><font color="#FFF">班级：</font><input type="text" class="text2" name="claname" value="<?php echo ($claname); ?>"/>
 		<font color="red" size="1%"><?php echo ($classError); ?></font>
 		</p>			
		<p><font color="#FFF">学校：</font><input type="text" class="text2" name="school" value="<?php echo ($school); ?>"/></p>
		<p><font color="#FFF">学院：</font><input type="text" class="text2" name="college" value="<?php echo ($college); ?>"/></p>
		<p><input type="text" class="text3" name="grade" value="<?php echo ($grade); ?>"/>
		<font color="#FFF">级</font>
		<input type="text" class="text2" name="major" value="<?php echo ($major); ?>"/></p>
		</div>			
		</div><!--end of 图片-->

		<div class="part">
		<p class="subtitle">
		<img src="/APP/Home/View/image/sun.png" class="icon" /> 
		班级成员 
		</p>
			班委 ……同学……<br/>
			<a href="./showMember" style="text-decoration: none;">成员管理……</a><br/>
			<a href="./showNew" style="text-decoration: none;">新成员……</a><br/>
		</div>

		<div class="part">
		<p class="subtitle">
			<img src="/APP/Home/View/image/sun.png" class="icon" /> 
			<span class="subtitle"> 班级简介 </span>
			</p>
		<textarea name="summery" class="ta1"><?php echo ($summery); ?></textarea>	
		</div>

		<div class="part">
		<p class="subtitle">
			<img src="/APP/Home/View/image/sun.png" class="icon" /> 
			<span class="subtitle"> 考勤奖励 </span>
			</p>
		<textarea name="rewards" class="ta1"><?php echo ($rewards); ?></textarea>
		</div>
		<p align="right"><fontcolor="gray"><?php echo ($time); ?></font></p>
				<div class="kuang" "><a class="noline" href="./showUpload">上传资料 》》》</a></div>
		<div class="kuang" ><a class="noline" href="/index.php/Home/Activity/showClassDetail?id=<?php echo ($id); ?>">班级详情 》》》</a></div>
		<div class="kuang" ><a class="noline" href="./showTaked">参加过的活动 》》》</a></div>
		<div class="kuang" ><a class="noline" href="./showClassReg">注册新班级 》》》</a></div>
		<div class="kuang" ><a class="noline" href="/index.php/Home/Activity/showInvStatus">邀请状态 》》》</a></div>
		<div class="kuang" ><a class="noline" href="/index.php/Home/Activity/showInvAnswer">邀请回复 》》》</a></div>
		<div class="kuang" ><a class="noline" href="./showContact">通讯录 》》》</a></div>
		<div class="kuang" ><a class="noline" href="./showCourse">课程表 》》》</a></div>
		</form>
</body>
</html>