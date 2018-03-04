<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport"
	content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>好班手</title>
<link href="/APP/Home/View/css/user.css" rel="stylesheet" />

<script type="text/javascript" src="/APP/Home/View/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/APP/Home/View/js/city.js"></script>
<script type="text/javascript" src="/APP/Home/View/js/register.js"></script>
<script type="text/javascript">
   	function changePic(){
   		var verPic=document.getElementById("verPic");
   		verPic.src="./verifyPic?"+Math.random();
 	}

</script>
</head>

<body>
	<div class="top">
		<!--start of 蓝色横条-->
		<?php if($_COOKIE['hbs_kind']==1){ ?>
<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMainM';"/>
<?php }else{ ?>

<img class="back" src="/APP/Home/View/image/back.png" onclick="location.href='/index.php/Home/Index/showMain';"/>
<?php } ?>
<span class="title">注册</span>
	</div>
	<!--end of 蓝色横条-->

	<center>
		<form action="./register" method="post" id="registerForm">
			<!--start of 注册表单-->
			<table>
				<tr>
					<td>姓名<font color="red">*</font>：
					</td>
					<td><input type="text" class="text2" id="name" name="username"
						value="" onchange="checkName()" /></td>
				</tr>
				<tr>
					<td></td>
					<td><font id="nameError" color="red" size="1%"></font></td>
				</tr>
				<tr>
					<td>性别<font color="red">*</font>：
					</td>
					<td><input type="radio" name="gender" value="1"
						checked="checked" />男 <input type="radio" name="gender" value="0" />女</td>
				</tr>

				<tr>
					<td>手机<font color="red">*</font>：
					</td>
					<td><input id="phone" type="text" class="text2" name="phone"
						value="" onchange="checkPhone()"/></td>
				</tr>
				<tr>
					<td></td>
					<td><font id="phoneError" color="red" size="1%"></font></td>
				</tr>
				<tr>
					<td>职位：
						<td><input type="radio" name="kind" value="1"
							checked="checked" />班委 <input type="radio" name="kind" value="0" />同学</td>
					</td>
				</tr>

				<tr>
					<td>学号<font color="red">*</font>：
					</td>
					<td><input type="text" class="text2" name="stuid" value="" /></td>
				</tr>
				<tr>
					<td></td>
					<td><font color="red" size="1%"><?php echo ($stuidError); ?></font></td>
				</tr>
				<tr>
					<td>宿舍号<font color="red">*</font>：
					</td>
					<td><input type="text" class="text2" name="room" value="" />
					</td>
				</tr>
				<tr>
					<td>家地址<font color="red">*</font>：
					</td>
					<td><select id="selProvince" name="province" class="select2"
						value="" onchange="provinceChange();"></select> <select
						id="selCity" name="city" class="select2" value=""></select></td>
				</tr>

				<tr>
					<td>QQ：</td>
					<td><input type="text" class="text2" name="qq" value="" /></td>
				</tr>

				<tr>
					<td>微信号：</td>
					<td><input type="text" class="text2" name="wechat" value="" />
					</td>
				</tr>

				<tr>
					<td>密码<font color="red">*</font>：
					</td>
					<td><input type="password" class="text2" name="password"
						id="password" onchange="checkPass()" /></td>
				</tr>
				<tr>
					<td></td>
					<td><font id="pwdError" color="red" size="1%"></font></td>
				</tr>
				<tr>
					<td>确认密码<font color="red">*</font>：
					</td>
					<td><input id="repassword" type="password" class="text2" name="repassword" onchange="checkRePass()"/></td>
				</tr>
				<tr>
					<td></td>
					<td><font id="repwdError" color="red" size="1%"></font></td>
				</tr>
				<tr>
					<td>验证码<font color="red">*</font>：
					</td>
					<td><input type="text" class="code1" name="code" id="code"/>
					 <img id="verPic"
						align="absmiddle" src="./verifyPic"
						style="height: 40px; width: 80px; border: 1px solid gray; line-height: 64px;"
						onclick="changePic()" alt="" /></td>
				</tr>

				<tr>
					<td></td>
					<td><font id="codeError" color="red" size="1%"><?php echo ($codeError); ?></font></td>
				</tr>

			</table>
			<p>
				<input type="button" class="bt1" value="登录"
					onclick="location.href='./showLogin'" /> <input type="submit"
					class="bt2" value="注册" />
			</p>
		</form>
		<!--end of 注册表单-->
	</center>
</body>
</html>