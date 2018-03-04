$(function(){
	var URL="http://www.test.com:8090/index.php/Home/";
	var $menu=$('#menu'),
		$menuitem=$menu.find('div.menuitem'),
		$item=$("#item"),
		
		itemjson={
			att:'<a href="'+URL+'Attend/showCount">考勤统计</a>'+
				'<a href="'+URL+'Attend/showLeave">一键请假</a>'+
				'<a href="'+URL+'Attend/showRecord">请假记录</a>',
				
        	act:'<a href="'+URL+'Activity/showActList">活动IDEAS</a>'+
				'<a href="'+URL+'Activity/showClassList">班级联谊</a>'+
				'<a href="'+URL+'Activity/showRecList">活动回忆</a>',
				
        	user:'<a href="'+URL+'User/showLogin">登录</a>'+
				'<a href="'+URL+'User/showRegister">注册</a>'+
				'<a href="'+URL+'User/showUser">个人中心</a>',
				
        	cla:'<a href="'+URL+'Classes/showClass">班级详情</a>'+
				'<a href="'+URL+'Classes/showTaked">Taked活动</a>'+
				'<a href="'+URL+'Classes/showClassEdit">管理班级</a>',
				
			att1:'<a href="'+URL+'Attend/showCount">考勤统计</a>'+
				'<a href="'+URL+'Attend/showInhand">手动签到</a>'+
				'<a href="'+URL+'Attend/showLeave">一键请假</a>'+
				'<a href="'+URL+'Attend/showAnswer">请假回复</a>'+
				'<a href="'+URL+'Attend/showRecord">请假记录</a>'
		};
		 

		$menuitem.mouseover(function(){
			var i=$(this).index();
			$(this).addClass("active").siblings().removeClass("active");
			var content=$(this).attr("content");
			if($item.is(":hidden")){
				$item.show().css("left",60*i+1).html("<div>"+itemjson[content]+"</div>")
			}else{
				$item.stop().animate({left:60*i+1},200,function(){
					$("#item").html("<div>"+itemjson[content]+"</div>")
				})
			}
		});
		$menu.mouseleave(function(){
			$item.hide();
			$menuitem.removeClass("active");
		})
})