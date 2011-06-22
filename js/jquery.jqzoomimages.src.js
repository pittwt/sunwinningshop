//**************************************************************
// jQZoom allows you to realize a small magnifier window,close
// to the image or images on your web page easily.
//
// jqZoom version 2.2
// Author Doc. Ing. Renzi Marco(www.mind-projects.it)
// First Release on Dec 05 2007
// i'm looking for a job,pick me up!!!
// mail: renzi.mrc@gmail.com
//**************************************************************
(function($){
    $.fn.jqzoomimages=function(options){
        var settings={
            sImgList:[],
            lImgList:[],
            vImgList:[],
            pageNo:1,
            pagesize:3,
            imgWidth:70,
            imgHeight:70,
            bigImageId:""
        };

        var loadImages=function(pageNo){
            var outImagesHTML="";
            var startKey=(pageNo-1)*settings.pagesize;
            for(var i=0;i<settings.pagesize;i++){
				if(i<settings.pagesize){					
					var imgKey=startKey+i;
					if(settings.sImgList[imgKey]==undefined){
						outImagesHTML+='<li style="width:'+(settings.imgWidth+2)+';border:1px none;">&nbsp;</li>';
						continue;
					}
					outImagesHTML+="<li><img src=\""+settings.sImgList[imgKey]+"\" border=\"0\" width=\""+settings.imgWidth+"\" height=\""+settings.imgHeight+"\" imgKey=\""+imgKey+"\" /></li>";
                }
			}
            $("#imagesbox").html(outImagesHTML);
            $("#imagesbox").find("img").error(function(){
                $("#"+settings.bigImageId).parent().css({
                    display:"none"
                });
                $("#div_mzt_loader").css({
                    display:"block"
                })
                });
            $("#imagesbox").find("img").hover(function(){
                var imgKey=$(this).attr("imgKey");
                $("#"+settings.bigImageId).attr("src",settings.lImgList[imgKey]);
                $("#"+settings.bigImageId).attr("jqimg",settings.vImgList[imgKey]);
                $("#"+settings.bigImageId).load(function(){
                    $("#div_mzt_loader").css({
                        display:"none"
                    });
                    $("#"+settings.bigImageId).parent().css({
                        display:"block"
                    })
                    });
                $("#"+settings.bigImageId).error(function(){
                    $("#"+settings.bigImageId).parent().css({
                        display:"none"
                    });
                    $("#div_mzt_loader").css({
                        display:"block"
                    })
                    });
                $(this).parent().addClass("selected")
                },function(){
                $(this).parent().removeClass("selected")
                })
            };

        if(options){
            $.extend(settings,options)
            }
            if(settings.sImgList.length<=0){
            return
        }
        var pageCount=Math.ceil(settings.sImgList.length/settings.pagesize);
        var listWidth=(settings.imgWidth+5)*settings.pagesize;
        var btnTop=((settings.imgHeight+2)-44)/2;
        var outHTML="<div class=\"product_info_next_l\" style=\"height:"+(settings.imgHeight+2)+"px;padding-right:2px;padding-top:"+btnTop+"px;\"><img src=\"style/next_l.gif\" border=\"0\" /></div><div class=\"\" style=\"width:"+listWidth+"px;\"><ul id=\"imagesbox\">";
        outHTML+="</ul></div><div class=\"product_info_next_r\" style=\"height:"+(settings.imgHeight+2)+"px;padding-top:"+btnTop+"px;\"><img src=\"style/next_r.gif\" border=\"0\" /></div><br style=\"clear:both;\" />";
        $(this).append(outHTML);
        loadImages(settings.pageNo);
		$(".product_info_next_l").css({filter:"alpha(opacity=50)",opacity:"0.5"});
		if(settings.sImgList.length<5){
			$(".product_info_next_r").css({filter:"alpha(opacity=50)",opacity:"0.5"});	
		}
        $(this).find(".product_info_next_l").click(function(){
            if(settings.pageNo<=1){
                return
            }
			
			if(settings.pageNo-1<=1){
				$(".product_info_next_l").css({filter:"alpha(opacity=50)",opacity:"0.5"});
				$(".product_info_next_r").css({filter:"alpha(opacity=100)",opacity:"1"});
			}
			else{
				$(".product_info_next_l").css({filter:"alpha(opacity=100)",opacity:"1"});
				if(pageCount>=settings.pageNo){
					$(".product_info_next_r").css({filter:"alpha(opacity=100)",opacity:"1"});
				}
			}
			
            settings.pageNo--;
            loadImages(settings.pageNo)
            });
        $(this).find(".product_info_next_r").click(function(){
            if(settings.pageNo>=pageCount){
                return
            }
			
			if(settings.pageNo+1>=pageCount){
				$(".product_info_next_l").css({filter:"alpha(opacity=100)",opacity:"1"});
				$(".product_info_next_r").css({filter:"alpha(opacity=50)",opacity:"0.5"});				
			}
			else{
				$(".product_info_next_l").css({filter:"alpha(opacity=100)",opacity:"1"});
				$(".product_info_next_r").css({filter:"alpha(opacity=100)",opacity:"1"});
			}

            settings.pageNo++;
            loadImages(settings.pageNo)
            })
        }
    })(jQuery);
document.write("<div id='div_mzt_loader' style='position: relative;float:left;width:284px;height:284px;display:none;'><img style='margin:110px 0 0 115px;' src='images/jquery-loader.gif' /></div>");