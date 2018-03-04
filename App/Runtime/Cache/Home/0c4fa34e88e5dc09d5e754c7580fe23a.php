<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手</title>
<link rel="stylesheet" type="text/css" href="/APP/Home/View/css/attend.css"  />
<script type="text/javascript">
function exportExcel(){
	var kind=document.getElementById("kind").value;
	var rang=document.getElementById("rang").value;
	location.href="/index.php/Home/Attend/ExportExcel?kind="+kind+"&&rang="+rang;
}
</script>
</head>

<body>
<!--start of body top-->
<div class="top"> 
 <form action="./showCount" method="get">
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">考勤统计</span>
 <a onclick="exportExcel()" class="a1">导出</a>
</div >
<!--end of body top-->



 <p style="text-align: center;">
 <select name="kind" id="kind" value="<?php echo ($kind); ?>" >
 <?php if($kind == 30): ?><option value="30" selected="selected" >当月</option>
 <?php else: ?>
 <option value="30" >当月</option><?php endif; ?>
 <?php if($kind == 7): ?><option value="7" selected="selected">当周</option> 
  <?php else: ?>
  <option value="7">当周</option><?php endif; ?>
  <?php if($kind == 1): ?><option value="1" selected="selected">当天</option>
 <?php else: ?>
 <option value="1">当天</option><?php endif; ?>
 </select> 
 <select name="rang" id="rang" value="<?php echo ($rang); ?>" >
  <?php if($rang == 0): ?><option value="0" selected="selected">个人</option>
  <?php else: ?>
  <option value="0">个人</option><?php endif; ?>
  <?php if($rang == 1): ?><option value="1" selected="selected">班级</option>
  <?php else: ?>
  <option value="1">班级</option><?php endif; ?>
 </select>
 <input  type="submit" value="查询" class="bt1"/>
 </p>
 
 </form>
<center><font color="gray" size="1%">正常出勤1，请假0，旷课-1</font></center>
<table style="width:100%;">

<tr >
<th class="head">学号</th>
<th class="head">姓名</th>
<th class="head">时间</th>
<th class="head">状态</th>
</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
<td><?php echo ($vo["uid"]); ?></td>
<td><?php echo ($vo["username"]); ?></td>
<td><?php echo ($vo["time"]); ?></td>
<td><?php echo ($vo["status"]); ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</body>
</html>