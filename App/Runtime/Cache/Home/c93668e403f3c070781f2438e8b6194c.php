<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/attend.css"  />
</head>

<body>
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">一键请假</span>
</div >
<!--end of body top-->
<center>
 <form action="./attLeave" method="post">
 <div class="bg1">请假理由</div>
 <p></p>
<textarea class="ta1" name="reason" value=""></textarea>
<p></p>
<div class="bg1">请假时间</div>
<p>从
<input type="date" name="start1" value="" class="text1"/>
<input type="time" name="start2" value="" class="text1"/>
</p>
<p>
到
<input type="date" name="end1" value="" class="text1"/>
<input type="time" name="end2" value="" class="text1"/>
</p>
<p>
<input type="submit" name="submit" class="btcircile" value="一键请假">
</p>
</form>

</center>
</body>
</html>