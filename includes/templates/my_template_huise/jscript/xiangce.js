function picture(){	

										/*js_one*/
	var lf=document.getElementById("lf_one");
	var rig=document.getElementById("rig_one");
	var tanchu=document.getElementById("tanchu");
	var fa_one=document.getElementById("father_one");
	var main_one=document.getElementById("two");
	var pic_one=document.getElementById("two").getElementsByTagName("img");
	var top_pic=document.getElementById("top_pic");
	var mask=document.getElementById("mask");
	var hid=document.getElementById("hidde");
	var b=0;
	var imgwidth_one=55;

	for(var j=0;j<pic_one.length;j++){
		pic_one[j].onclick=function(){movee(this);}
	}
	function movee(obj){
		for(var j=0;j<pic_one.length;j++){
			if(obj==pic_one[j]){
				top_pic.src=pic_one[j].src;
				pic_one[j].className="special_img";
				b=j;//此处相对于tab切换来说不写也行，是为了下面其他特效的使用而定义的，是把数组的下标值赋给a;
			}
			else{
				pic_one[j].className="";
			}
		}
	}//tab切换；
	function reducee(){
		if(b<=0){
			alert("这已是第一张");
		}
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
			addd();
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

	top_pic.onclick=function(){
		
		tanchu.style.display="block";
		mask.style.display="block";
		close.style.display="block";
		hid.style.display="none";
	
	}

											/*js_two*/
	var inputlf=document.getElementById("lf");
	var inputrig=document.getElementById("rig");
	var fa=document.getElementById("father");
	var main=document.getElementById("one");
	var pic=document.getElementById("one").getElementsByTagName("img");
	var change=document.getElementById("change");
	var close=document.getElementById("close");
	var a=0;
	var imgwidth=107;
	for(var j=0;j<pic.length;j++){
		pic[j].onclick=function(){move(this);}
	}
	function move(aa){
		for(var i=0;i<pic.length;i++){
			if(aa==pic[i]){
				change.src=pic[i].src;
				pic[i].className="special";
				a=i;//此处相对于tab切换来说不写也行，是为了下面其他特效的使用而定义的，是把数组的下标值赋给a;
			}
			else{
				pic[i].className="";
			}
		}
	}//tab切换；
	function reduce(){
		if(a<=0){
			alert("这已是第一张");
		}
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
			add();
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

	change.onclick=function(e){
		e=e||window.event;
		if(e.offsetX<change.offsetWidth/2||e.layerX<change.offsetWidth/2){//为了兼容ff
			reduce();
		}
		else{
			add();
		}
	}
	close.onclick=function(){
		tanchu.style.display="none";
		mask.style.display="none";
		close.style.display="none";
		hid.style.display="inline";
	}
}

picture();