<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>好班手——个人中心</title>
<link href="/APP/Home/View/css/user.css" rel="stylesheet"/>
</head>

<body>
<form action="./saveUser" method="post"  >

<div class="top"> <!--start of 蓝色横条-->
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">个人中心</span>
<input type="image" class="save" src="/APP/Home/View/image/save.png" /> 
  </div><!--end of 蓝色横条-->
  
<div class="content">
<div class="transp">
<center>

  <table>
  <tr>
      <td> 学号：</td>
      <td><?php echo ($stuid); ?><input type="hidden" name="stuid" value="<?php echo ($stuid); ?>"></td>
    </tr>
    <tr>
      <td> 姓名：</td>
      <td><input type="text" class="text2" name="username" value="<?php echo ($username); ?>"/>
      </td>
    </tr>
    <tr>
      <td>性别：</td>
      <td>
      <?php if(($gender == 1) ): ?>男
      <?php else: ?> 
	女<?php endif; ?>
       </td>
        </tr>
		<tr>
      <td> 手机：</td>
      <td><input type="text" class="text2" name="phone" value="<?php echo ($phone); ?>"/>   
      </td>
    </tr>
        <tr>
      <td> QQ：</td>
      <td><input type="text" class="text2" name="qq" value="<?php echo ($qq); ?>" />
      </td>
    </tr>
	
	 <tr>
      <td> 微信号：</td>
      <td><input type="text" class="text2" name="wechat" value="<?php echo ($wechat); ?>" />
      </td>
    </tr>
	<tr>
      <td> 职位：<td >
      <?php if(($kind == 1) ): ?>班委      
	       <?php else: ?> 
        	同学<?php endif; ?>
        </td>
    </tr>
      <td> 班级：</td>
      <td><?php echo ($class); ?></td>
    </tr>

	<tr>
      <td> 宿舍号：</td>
      <td><input type="text" class="text2" name="room" value="<?php echo ($room); ?>"/></td>
    </tr>
	<tr>
      <td> 家地址：</td>
      <td>
      <input type="text"  name="province" class="code1" value="<?php echo ($province); ?>" ">
	  <input type="text" name="city" class="code1" value="<?php echo ($city); ?>">
	  </td>
    </tr>
	  <tr>
      <td class="text1"> 正常考勤天数</td>
      <td class="text2"><?php echo ($attendday); ?></td>
    </tr>
	<tr>
      <td class="text2"> 请假天数</td>
      <td class="text1"><?php echo ($leaveday); ?></td>
    </tr>
	<tr>
      <td class="text1"> 积分</td>
      <td class="text2"><?php echo ($score); ?></td>
    </tr>
	
  </table>
  <p>
  <input type="button" class="bt1" value="退出"  onclick="location.href='./logout'"/>
  <input type="button" class="bt2" value="班级"  onclick="location.href='/index.php/Home/Classes/showClass'"/>
  </p>

 </center>
  </div> 
 </div> 
</form>
</body>
</html>