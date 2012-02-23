<script>
function submit_currencies(val){
	var forms = document.getElementById('currencies_form_sam');
	forms.elements['currency'].value = val;
	//alert(forms.elements['currency'].value);
	forms.submit();
}
</script>
<?php
//* Template designed by 
//*  - Free ecommerce templates and design services

// test if box should display
  $show_currencies= true;

  if ($show_currencies == true) {
    if (isset($currencies) && is_object($currencies)) {

      reset($currencies->currencies);
      $currencies_array = array();
      while (list($key, $value) = each($currencies->currencies)) {
        $currencies_array[] = array('id' => $key, 'text' => $value['title']);
      }

      $hidden_get_variables = '';
      reset($_GET);
      while (list($key, $value) = each($_GET)) {
        if ( ($key != 'currency') && ($key != zen_session_name()) && ($key != 'x') && ($key != 'y') ) {
          $hidden_get_variables .= zen_draw_hidden_field($key, $value);
        }
      }
                  	
    }
  }
                
    $content = "";
    //$content .= zen_draw_form('currencies_form', zen_href_link(basename(ereg_replace('.php','', $PHP_SELF)), 'ssssss', $request_type, false), 'get');
	$content .= '<form method="get" action="'.zen_href_link(basename(ereg_replace('.php','', $PHP_SELF)), '', $request_type, false).'" name="currencies_form" id="currencies_form_sam">';
    $content .= zen_draw_pull_down_menu('currency', $currencies_array, $_SESSION['currency'], '') . $hidden_get_variables . zen_hide_session_id();
    $content .= '</form>';
?>