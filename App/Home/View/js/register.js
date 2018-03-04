
   	function checkName(){
   		var name=document.getElementById("name").value;
   		if(!name.match('[\u4e00-\u9fa5]{2,}')){
   			document.getElementById("nameError").innerHTML="必须为中文真实姓名";
   		}else{
   			document.getElementById("nameError").innerHTML="";
   		}
   	}
   	function checkPass(){
   		var pass=document.getElementById("password").value;
   		if(!pass.match('[0-9]+')||!pass.match('[a-zA-Z]+')||!pass.match('[0-9a-zA-Z]{6,20}');){
   			document.getElementById("pwdError").innerHTML="必须含数字和字母的6-20个字符";
   		}else{
   			document.getElementById("pwdError").innerHTML="";
   		}
   	}
   	function checkRePass(){
   		var pass=document.getElementById("password").value;
   		var pass1=document.getElementById("repassword").value;
   		if(pass!=pass1){
   			document.getElementById("repwdError").innerHTML="两次密码不一致";
   		}else{
   			document.getElementById("repwdError").innerHTML="";
   		}
   	}
   	
   	function checkPhone(){
   		var value=document.getElementById("phone").value;
   		if(!value.match('^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\\d{8}$')){
   			document.getElementById("phoneError").innerHTML="请输入正确的手机号";
   		}else{
   			document.getElementById("phoneError").innerHTML="";
   		}
   	}