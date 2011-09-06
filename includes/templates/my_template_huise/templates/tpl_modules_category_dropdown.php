<?php
$categories = $db->Execute("SELECT c.categories_id, c.parent_id, cd.categories_name as name FROM " . TABLE_CATEGORIES . " AS c, " . TABLE_CATEGORIES_DESCRIPTION . " AS cd WHERE categories_status=1 AND c.categories_id = cd.categories_id AND cd.language_id=" . (int)$_SESSION['languages_id']);

$category_parent = array();
$category_subtemp = array();
$category_sub_byparent = array();

while (!$categories->EOF){
	if($categories->fields['parent_id'] == 0){
		$category_parent[] = $categories->fields;
	}else{
		$category_subtemp[] = $categories->fields;
	}
	$categories->MoveNext();
}
foreach($category_subtemp as $value){
	$category_sub_byparent[$value['parent_id']][] = $value;
}

$content .= '<ul class="nav">' . "\n";
$i = 1;
foreach($category_parent as $item){
	$content .= '<li class="nav_li">';
	if($cPath == $item['categories_id']){
		$nowclass = ' change';
	}else{
		$nowclass = '';
	}
	$content .= '<a href="' . zen_href_link(FILENAME_DEFAULT, "cPath=".$item['categories_id']."") . '" class="nav_a ' . $nowclass . '">' . $item['name'] . '</a>';
	if(count($category_sub_byparent[$item['categories_id']]) > 0){
		if($i>1){
			$lic = ' li_' . $i;
		}else{
			$lic = '';
		}
		$content .= '<div class="li_one' . $lic . '"><ol class="nav_one">';
		
		foreach($category_sub_byparent[$item['categories_id']] as $value){
			$content .= '<li><a href="' . zen_href_link(FILENAME_DEFAULT, "cPath=".$value['categories_id']."") . '">' . $value['name'] . '</a></li>';
		}
		
		$content .= '</ol></div>';
	}
	$i++;
}

$content .= '</ul>';

echo $content;
?>



