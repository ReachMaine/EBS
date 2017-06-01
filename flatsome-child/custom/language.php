<?php
/* languages customizations
*/
	if ( !function_exists('reach_change_theme_text') ){
		function reach_change_theme_text( $translated_text, $text, $domain ) {
			 /* if ( is_singular() ) { */
			    switch ($domain) {
						case 'woocommerce':
							switch ( $translated_text ) {
					            case 'No products were found matching your selection.' :
					                $translated_text = __( '',  'woocommerce'  );
					                break;
					           /* case 'Add to cart':
					            	$translated_text = __( 'Continue to Checkout',  'woocommerce'  );
					            	break;*/
					        }
							break;
						default:
							switch ( $translated_text ) {
								case 'Category Archives: %s' :
									$translated_text = __( '%s',  $domain  );
									break;
								case  'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.':
									$translated_text = __( 'This entry was posted in %1$s.',  $domain  );
									break;
								case 'No products were found matching your selection.':
									$translated_text = __( '',  $domain  );
									break;
				        }

				}

	    	return $translated_text;
		} // end function reach_change_theme_text
		add_filter( 'gettext', 'reach_change_theme_text', 20, 3 );
	} // end if not exists reach_change_theme_text
?>
