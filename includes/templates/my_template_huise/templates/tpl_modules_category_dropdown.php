<?php

$main_category_tree = new category_tree;
$box_categories_array = array();

// don't build a tree when no categories
$check_categories = $db->Execute("select categories_id from " . TABLE_CATEGORIES . " where categories_status=1 limit 1");
if ($check_categories->RecordCount() > 0) {
  $box_categories_array = $main_category_tree->zen_category_tree();
}
//print_r($box_categories_array);
/*<ul class="nav">
					<li class="nav_li">
						<a href="###" class="nav_a">fenlei1</a>
						<div class="li_one">
							<ol class="nav_one">
								<li><a href="###">Wholesale NHL Jerseys</a></li>
								<li><a href="###">Wholesale NHL Jerseys</a></li>
							</ol>
						</div>
					</li>*/
$content = '';

$content .= '<ul class="nav">' . "\n";

for($i=0; $i<5; $i++){
	$content .= '<li class="nav_li">
						<a href="###" class="nav_a">fenlei1</a>
						<div class="li_one">
							<ol class="nav_one">
								<li><a href="###">Wholesale NHL Jerseys</a></li>
								<li><a href="###">Wholesale NHL Jerseys</a></li>
							</ol>
						</div>
					</li>';	
}

$content .= '</ul>';


echo $content;
?>



