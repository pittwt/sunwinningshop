function active(){
	var Tween = {
			Quart: {
				easeIn: function(t,b,c,d){
					return c*(t/=d)*t*t*t + b;
				},
				easeOut: function(t,b,c,d){
					return -c * ((t=t/d-1)*t*t*t - 1) + b;
				},
				easeInOut: function(t,b,c,d){
					if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
					return -c/2 * ((t-=2)*t*t*t - 2) + b;
				}
			}
	}
	//t: current time（当前时间）；b: beginning value（初始值/当前位置）；c: change in value（变化量/移动量=到到达的位置-初始位置）；d: duration（持续时间）。

	var div=document.getElementById("getout");
	//var xtable=div.getElementsByTagName("table")[0];
	var xtable=document.getElementById("mm");
	var number=document.getElementById("number").getElementsByTagName("a");
	var p=0;
	var time;
	var f=0;
	var pand=true;
		function run(){
			var d=30;//多少步完成；
			var w=document.getElementById("getout").clientWidth;//显示窗口的宽度；
			var t=0;//初始步；
			var b=p;
			var c=f*w-b;
			function runr(){
				var n= Math.ceil(Tween.Quart.easeOut(t,b,c,d));
				xtable.style.left =-n + "px";
				 if(t<d){t++;p=n; time=setTimeout(runr, 50);}
				 else{
				 t=0;p=n;//随时把n的值传出去，因为每次运动中b值不能改变所以不能直接b=n;
				 clearTimeout(time);}
			 }		
			 function runn(){
				if (typeof(time)!="undefined"){clearTimeout(time);}
				runr()
			}
			runn()
		}

	function tabchange(){
			for(var i=0;i<number.length;i++){
			//addEventHandler(number[i],"mouseover",function (){change(this);});
			number[i].onmouseover=function(){change(this);}
		}
	}
	function change(oa){

		for(i=0;i<number.length;i++){
			number[i].className="";
			if (oa==number[i]){	
					var i=i;
					 f=i;//传递数组下标改变c参数的值
					 run();
					oa.className="first";	
				}
		}	
	}
	tabchange();//执行函数tabchange
	function change1(){
		run();
		for(i=0;i<number.length;i++){
			number[i].className="";
			}
		number[f].className="first";
		}
	function panduan(){ 
		div.onmouseover=function(){pand=false;clearInterval(time1);}
		div.onmouseout=function(){pand=true;time1=setInterval(panduan,3000);}
		if(pand){
			f++;
			if(f>number.length-1){f=0;}
			change1();
		}
	}
	var time1=setInterval(panduan,3000);
}

////////////////////////////////////////////////////////////
function js_active(){
	var strike=document.getElementById("strike");
	var memu=document.getElementById("memu");
	function show(){
		memu.style.display=memu.style.display=="block"?"none":"block";//运算符意思是display是block的时候执行none  如果不是的话执行block；
	}
	document.onclick = function(e){
		e = e || window.event;
		var target = e.srcElement || e.target;
		if(target.tagName.toLowerCase()!='a'){//if中的条件是点击页面中标签名不是a的执行下面的display：none;
			memu.style.display="none";
		}
	}
	strike.onclick=function(){show();}
	strike.onmouseover=function(){show();}
}

//////////////////////////////////////////////
function jq_tab(){
	(function($){
		$(document).ready(function(){
			$(".nav .nav_li").mouseover(function(){
				$(this).addClass("change");
				$($(".nav .nav_a")[$(".nav .nav_li").index(this)]).css("color","#efefef");
				$($(".nav .li_one")[$(".nav .nav_li").index(this)]).show();
			})
			$(".nav .nav_li").mouseout(function(){
				$(this).removeClass("change");
				$($(".nav .nav_a")[$(".nav .nav_li").index(this)]).css("color","#737373");
				$($(".nav .li_one")[$(".nav .nav_li").index(this)]).hide();
			})
		})
	})(jQuery);
}
///////////////////////////////////////
function cate_tab(){
	(function($){
		$(document).ready(function(){
			$(".cate_con .h3_tit").mouseover(function(){
				$(this).addClass("cate_change");
				$($(".cate_con .h3_a")[$(".cate_con .h3_tit").index(this)]).addClass("a_change");
				$($(".cate_con .cate_ol")[$(".cate_con .h3_tit").index(this)]).show();
			})
			$(".cate_con .h3_tit").mouseout(function(){
				$(this).removeClass("cate_change");
				$($(".cate_con .h3_a")[$(".cate_con .h3_tit").index(this)]).removeClass("a_change");
				$($(".cate_con .cate_ol")[$(".cate_con .h3_tit").index(this)]).hide();
			})
		})
	})(jQuery);
}

///////////////////////////////
function sub_change(){
	var sear=document.getElementById("search_sub");
	sear.onmouseover=function(){
		sear.className="sub_cheng";
	}
	sear.onmouseout=function(){
		sear.className="sub";
	}
}
//////////////////////////////////////
function fd_change(){
	var sear=document.getElementById("fd_submit");
	sear.onmouseover=function(){
		sear.className="fd_enter";
	}
	sear.onmouseout=function(){
		sear.className="fd_sub";
	}
}
window.onload=function(){js_active();active();jq_tab();cate_tab();sub_change();fd_change();}