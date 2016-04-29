<?php
// $Id: search-block-form.tpl.php,v 1.6 2011/01/03 00:17:55 webchick Exp $

/**
 * @file
 * Displays the search form block.
 *
 * Available variables:
 * - $search_form: The complete search form ready for print.
 * - $search: Associative array of search elements. Can be used to print each
 *   form element separately.
 *
 * Default elements within $search:
 * - $search['search_block_form']: Text input area wrapped in a div.
 * - $search['actions']: Rendered form buttons.
 * - $search['hidden']: Hidden form elements. Used to validate forms when
 *   submitted.
 *
 * Modules can add to the search form, so it is recommended to check for their
 * existence before printing. The default keys will always exist. To check for
 * a module-provided field, use code like this:
 * @code
 *   <?php if (isset($search['extra_field'])): ?>
 *     <div class="extra-field">
 *       <?php print $search['extra_field']; ?>
 *     </div>
 *   <?php endif; ?>
 * @endcode
 *
 * @see template_preprocess_search_block_form()
 */
?>

<div class="container-inline">
  <?php if (empty($variables['form']['#block']->subject)) : ?>
    <h2 class="element-invisible"><?php print t('Search form'); ?></h2>
  <?php endif; ?>
  <?php print $search_form; ?>

<script type="text/javascript">


(function ($){
	 Drupal.behaviors.Garland1 = {
	     attach: function(context, settings) {
        /*
	     if (document.getElementById('block-user-login')){
	    		 var name_input = document.getElementById('edit-submit');
	    		 name_input.value=" ";
	   	 }
	 	 else {
	     	if (document.getElementById('edit-submit--2')){
	    	 	var name_input = document.getElementById('edit-submit--2');
			 	name_input.value=" ";
		    }
	     	else{
		 		var name_input3 = document.getElementById('edit-submit');
		 		name_input3.value=" ";			
	     	}
	 	}  */
		 	
	 	var text_input = document.getElementById('edit-search-block-form--2');
		text_input.value="Search";	
		text_input.onfocus= function() {text_input.value='';};
        text_input.onblur= function() { if (text_input.value == '') text_input.value='Search';};
	 }
	 
	 
	 };
	 })(jQuery);
</script> 


</div>
