<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/activity.css"  />

</head>
<body>

<form action="./actAdd" method="post" enctype="multipart/form-data" >
<!--start of body top-->
<div class="top"> 
<input type="image" class="back" src="/APP/Home/View/image/back.png" onclick="history.back();"/>
 <span class="title">发布活动</span>
 <input type="image" class="save" src="/APP/Home/View/image/save.png" /> 
</div >
<!--end of body top-->
<center>
  <table style="padding:8px;">
    <tr>
      <td> 活动名称</td>
      <td><input type="text" class="text1" name="name" value=""/></td>
    </tr>
    
    <tr>
      <td>活动类型</td>
      <td ><select name="kind" class="select1">
      <option value="1">班级活动</option>
      <option value="2">团日活动</option>
      <option value="3">联谊活动</option>
      <option value="4">主题班会</option>
      <option value="5">其他</option>
      </select> </td>
      </tr>
      
		<tr>
      <td>活动时间</td>
      <td><input type="text" class="text1" name="actime" value=""/></td>
    </tr>
    
	<tr>
      <td>活动地点</td>
      <td><input type="text" class="text1" name="address" value=""/></td>
    </tr>
    <tr>
      <td>图片：</td>
      <td><font color="gray" size="1%">相片大小在4M以内</font></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="file" class="file1" name="pic" /></td>
    </tr>

	<tr>
      <td> 活动准备</td>
      <td><textarea class="ta1" name="actprepare" value=""></textarea></td>
    </tr>
	
    <tr>
      <td> 活动流程</td>
      <td><textarea class="ta1" name="actprocess" value=""></textarea></td>
    </tr>
    
	<tr>
      <td> 注意事项</td>
      <td><textarea class="ta1" name="notice" value=""></textarea></td>
    </tr>
    
  </table>
</center>
</form>


</body>
</html>