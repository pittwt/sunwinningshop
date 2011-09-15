var tanchu=document.getElementById("tanchu");
var mask=document.getElementById("mask");
var hid=document.getElementById("hidde");
var close=document.getElementById("close");
var jersey=document.getElementById("jersey_one");
var change=document.getElementById("change");
function picture(){	
									/*js_one*/
	var lf=document.getElementById("lf_one");
	var rig=document.getElementById("rig_one");
	var fa_one=document.getElementById("father_one");
	var main_one=document.getElementById("two");
	var pic_one=document.getElementById("two").getElementsByTagName("img");
	var top_pic=document.getElementById("top_pic");
	var b=0;
	var imgwidth_one=60;
	var one_width=document.getElementById("jersey_one").clientWidth;
	var one_height=document.getElementById("jersey_one").clientHeight;

	for(var j=0;j<pic_one.length;j++){
		pic_one[j].onmouseover=function(){movee(this);}
	}
	function movee(obj){
		for(var j=0;j<pic_one.length;j++){
			if(obj==pic_one[j]){
				top_pic.src=pic_one[j].src;
				pic_one[j].className="special_img";
				b=j;//此处相对于tab切换来说不写也行，是为了下面其他特效的使用而定义的，是把数组的下标值赋给a;
			}
			else{pic_one[j].className="";}
		}
	}//tab切换；
	function reducee(){
		if(b<=0){}
		else{
			pic_one[b-1].className="special_img";
			pic_one[b].className="";
			top_pic.src=pic_one[b-1].src;	
			b--;
			fa_one.scrollLeft=fa_one.scrollLeft-imgwidth_one;
		}
	}
	lf.onclick=function(){reducee();}//向左翻页
	function addd(){
		if(b>=pic_one.length-1){
			pic_one[b].className="";
			b=0;
			fa_one.scrollLeft=0;
			top_pic.src=pic_one[b+1].src;
			pic_one[b].className="special_img";	
		}
		else{
			pic_one[b+1].className="special_img";
			pic_one[b].className="";
			top_pic.src=pic_one[b+1].src;
			b++;
			fa_one.scrollLeft=fa_one.scrollLeft+imgwidth_one;
		}
	}
	rig.onclick=function(){addd();}//向右翻页
	bili(top_pic,one_width,one_height);

											/*js_two*/
	var inputlf=document.getElementById("lf");
	var inputrig=document.getElementById("rig");
	var fa=document.getElementById("father");
	var main=document.getElementById("one");
	var pic=document.getElementById("one").getElementsByTagName("img");
	var lg_click=document.getElementById("lf_click");
	var a=0;
	var imgwidth=167;
	for(var j=0;j<pic.length;j++){
		pic[j].onmouseover=function(){move(this);}
	}
	function move(aa){
		for(var i=0;i<pic.length;i++){
			if(aa==pic[i]){
				change.src=pic[i].src;
				pic[i].className="special";
				a=i;//此处相对于tab切换来说不写也行，是为了下面其他特效的使用而定义的，是把数组的下标值赋给a;
			}
			else{pic[i].className="";}
		}
	}//tab切换；
	function reduce(){
		if(a<=0){}
		else{
			pic[a-1].className="special";
			pic[a].className="";
			change.src=pic[a-1].src;
			a--;
			fa.scrollLeft=fa.scrollLeft-imgwidth;
		}
	}
	inputlf.onclick=function(){reduce();}//向左翻页

	function add(){
		if(a>=pic.length-1){
			pic[a].className="";
			a=0;
			fa.scrollLeft=0;
			change.src=pic[a].src;
			pic[a].className="special";
		}
		else{
			pic[a+1].className="special";
			pic[a].className="";
			change.src=pic[a+1].src;
			a++;
			fa.scrollLeft=fa.scrollLeft+imgwidth;
		}
	}
	inputrig.onclick=function(){add();}//向右翻页

	lg_click.onclick=function(e){
		e=e||window.event;
		if(e.offsetX<change.offsetWidth/2||e.layerX<change.offsetWidth/2){//为了兼容ff
			reduce();
		}
		else{add();}
	}
	
}
picture();

jersey.onclick=function(){
	
	tanchu.style.display="block";
	mask.style.display="block";
	close.style.display="block";
	hid.style.display="none";
	var two_width=document.getElementById("lf_click").clientWidth;
	var two_hieght=document.getElementById("lf_click").clientHeight;
	bili(change,two_width,two_hieght)
}

close.onclick=function(){
	tanchu.style.display="none";
	mask.style.display="none";
	close.style.display="none";
	hid.style.display="inline";
}
function bili(obj,trueWidth,trueHeight){
	w = obj.getAttribute("w");
	h = obj.getAttribute("h");
	var bili= w/h ;
	if(w <= trueWidth && h <= trueHeight){
			if(bili >= 1){
			obj.style.width=trueWidth+"px";
		}else if(bili < 1){
			obj.style.height=trueHeight+"px";
		}
	}else if(w <= trueWidth  && h >= trueHeight){
		obj.style.height=trueHeight+"px";
	}else if(w >= trueWidth  && h <= trueHeight){
		obj.style.width=trueWidth+"px";
	}else if(w >= trueWidth  && h >= trueHeight){
		if(bili >= 1){
			obj.style.width=trueWidth+"px";
		}else if(bili < 1){
			obj.style.height=trueHeight+"px";
		}
	}
}
