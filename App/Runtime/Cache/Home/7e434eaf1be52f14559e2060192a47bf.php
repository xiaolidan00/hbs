<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>记录活动</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/activity.css"  />
</head>



<body>
<form action="./actRecAdd" method="post"  enctype="multipart/form-data">
<!--start of body top-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">记录活动</span>
 <input type="image" class="save" src="/APP/Home/View/image/save.png"  /> 
</div >
<!--end of body top-->

<center><span class="bluetext1">活动名称</span>
   <hr class="line"/>
<p><input type="text" class="text2" name="title" value=""/></p>
</center>

<center>
<span class="bluetext1">活动照片</span>
   <hr class="line"/>
   <br/>
   <p><input type="file" class="file1" name="pic1"/></p>
    <p><input type="file" class="file1" name="pic2"/></p>       
      <p><input type="file" class="file1" name="pic3"/></p>  
      <p><input type="file"  class="file1" name="pic4"/></p>  
      </center> 
      <br/>
	<center><span class="bluetext1">活动回忆</span>
   <hr class="line"/>
   <br/>
      <textarea class="ta2" name="content" value=""></textarea>
      </center>  
 <span class="bluetext1">活动详情</span>
   <hr class="line"/>
   <select name="actid" class="select1">
   <?php if(is_array($actlist)): $i = 0; $__LIST__ = $actlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
   </select>
 </center>
 
</form>


</body>
</html>