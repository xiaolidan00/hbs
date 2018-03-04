/// <reference path="_references.js" />

var i = 0;//全局变量
//定义一个变量用来获取轮播的过程
var max=4;
var time;
$(function ()
{
    //1.页面加载后,找到Class等于swapImg的第一个对象，让它显示，它的兄弟元素隐藏
    $("div.swapImg").eq(0).show().siblings().hide();
    showTime();
    //当鼠标放到下标上显示该图片，鼠标移走继续轮播
    $("div.tab").hover(
        function ()
        {
            //获取到当前鼠标所在的下标的索引
            i = $(this).index();
            show();
            //鼠标放上去之后，怎么停止呢？获取到变量的过程，清除轮播，把变量传进去
            clearInterval(time);
        }, function ()
        {
            showTime();
        });

    //要求四，当我点击左右切换
    $("div.btnLeft").click(function ()
    {
        //1.点击之前要停止轮播
        clearInterval(time);
        //点了之后，-1
        if (i == 0)
        {
            i =max;
        }
        i--;
        show();
        showTime();
    });
    $("div.btnRight").click(function () {
        //1.点击之前要停止轮播
        clearInterval(time);
        //点了之后，-1
        if (i == (max-1)) {
            i = -1;
        }
        i++;
        show();
        showTime();
    });
   

});

function show() {
    //$("#allswapImg").hover(function ()
    //{
    //    $(".btn").show();
    //}, function ()
    //{
    //    $(".btn").hide();
    //});
    //fadeIn(300)淡入，fadeout(300)淡出，过滤时间0.3s
    $("div.swapImg").eq(i).fadeIn(300).siblings().fadeOut();
    $("div.tab").eq(i).addClass("active").siblings().removeClass("active");
}

function showTime()
{
    time = setInterval(function () {
        i++;
        if (i == max) {
            //只有6张图片，所以i不能超过6，如果i等于6时，我们就让它等于第一张
            i = 0;
        }
        show();
    }, 3000);
}