<?php  
function get_file($url, $folder, $imgname){     
    set_time_limit (24 * 60 * 60);    
    $destination_folder = $folder ? $folder.'/' : '';//文件下载保存目录  
    $newfname = $destination_folder . $imgname;     
    $file = fopen ($url . $imgname, "rb");     
    if ($file) {     
    $newf = fopen ($newfname, "wb");     
    if ($newf)     
   	 while(!feof($file)) {     
			fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );     
		}     
    }     
    if ($file) {     
        fclose($file);
    }     
    if ($newf) {     
        fclose($newf);     
    }     
}     

$folder = "";
$url = "http://livedemo00.template-help.com/zencart_36152/includes/templates/theme552/buttons/english/";

$imglist = explode("\n", file_get_contents('imglist.txt'));
foreach($imglist as $value){
	if(strlen(trim($value)) > 0){
		get_file($url, $folder, trim($value));
	}
}
echo "finished";
?> 