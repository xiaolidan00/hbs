<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>好班手</title>
<link href="/APP/Home/View/css/user.css" rel="stylesheet"/>
<script type="text/javascript">
   	function changePic(){
   		var verPic=document.getElementById("verPic");
   		verPic.src="./verifyPic?"+Math.random();
 	}

</script>
</head>

<body>
<!--start of 蓝色横条-->
<div class="top"> 
<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
 <span class="title">登录</span>
</div>
<!--end of 蓝色横条-->

	<center>
	<img  src="/APP/Home/View/image/icon.png" />
	
	<form action="./login" method="post"><!--start of 登录表单-->
    <table>
    <tr>
	  <td>学号：</td>
		<td><input type="text" class="text1" name="stuid" value=""/> </td>
		</tr>
        <tr>
		<td>密码：</td>
		<td><input type="password" class="text1" name="password" value=""/></td>
        </tr>
        <tr>
		<td>验证码：</td>
		<td><input  type="text" class="code" name="verify">
		<img  id="verPic" align="absmiddle" src="./verifyPic" style="height:40px;width:80px;border:1px solid gray;line-height:64px;" onclick="changePic()" />        
        </td>
         </tr>
        <tr>
        <td><a href="./forget" >忘记密码</a></td>
        <td><font color="red" size="1%"><?php echo ($codeError); ?></font></td>
        </tr>
	</table>
	
     <p>
     <input type="submit" class="bt1"  name="login" value="登录" />
     
     <!-- 跳转到注册页面 -->
     <input type="button" class="bt2" name="register" value="注册"  onclick="location.href='./showRegister'">
     </p>
    </form><!--end of 登录表单-->
</center>    


</body>
</html>
;