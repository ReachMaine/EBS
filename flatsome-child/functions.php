<?php

  require_once(get_stylesheet_directory().'/custom/language.php');
  
/* remove the displaying of price in the loop (for archives & search ) */
 remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
/* nope - remove_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 ); */
/* hide the category count  */
add_filter( 'woocommerce_subcategory_count_html', 'jk_hide_category_count' );
	function jk_hide_category_count() {
		// No count
	}

add_filter( 'woocommerce_product_subcategories_hide_empty', 'show_empty_categories', 20, 1 ); //show empy categoies
function show_empty_categories ( $show_empty ) {
    $show_empty  =  false;
    // You can add other logic here too
    return $show_empty;
}


/* add the catalog mode single product stuff from theme options */
function zcatalog_mode_product(){
    global $flatsome_opt;
    echo '<div class="catalog-product-text">';
    echo do_shortcode($flatsome_opt['catalog_mode_product']);
    echo '</div>';
}
//add_action('woocommerce_single_product_summary', 'zcatalog_mode_product', 30);

/* add a meta/custom field to the product categories for category help that we'll output in product summary */
if(function_exists('get_term_meta')){
	function ebs_taxonomy_edit_meta_field($term) {
		// put the term ID into a variable
		$t_id = $term->term_id;
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_term_meta($t_id,'cat_meta');
		if(!$term_meta){$term_meta = add_term_meta($t_id, 'cat_meta', '');}
		 ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[cat_help]">Category Help</label></th>
			<td>
					<?php

					$content = esc_attr( $term_meta[0]['cat_help'] ) ? esc_attr( $term_meta[0]['cat_help'] ) : '';
					echo '<textarea id="term_meta[cat_help]" name="term_meta[cat_help]">'.$content.'</textarea>'; ?>
				<p class="description">Enter a value for this field. Shortcodes are allowed. This will be displayed in the product description in this category.</p>
			</td>
		</tr>
	<?php
	}
	add_action( 'product_cat_edit_form_fields', 'ebs_taxonomy_edit_meta_field', 10, 2 );


	/* SAVE CUSTOM META*/
	function save_taxonomy_custom_metaEBS( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_term_meta($t_id,'cat_meta');
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_term_meta($term_id, 'cat_meta', $term_meta);

		}
	}
	add_action( 'edited_product_cat', 'save_taxonomy_custom_metaEBS', 10, 2 );
}

/* add the category help description to the product description */
add_action('woocommerce_single_product_summary', 'ebs_category_help', 35); /* priority of 35 puts it before Category (after desc) */
function ebs_category_help () {
	echo "<!-- category_help -->";
	if (function_exists('get_term_meta')) {
		global $post;
		$terms = get_the_terms( $post->ID, 'product_cat' );
		if ($terms ) {
			foreach($terms as $term) {
				$catID =  $term -> term_id;
			}
			//	echo "<!-- catID = ".$catID." -->";
			$content = get_term_meta($catID, 'cat_meta');
			if (isset($content[0]['cat_help'])) {
				echo '<div class="product-cat-help"> ';
				echo do_shortcode($content[0]['cat_help']);
				echo '</div>';
			} else {
				// echo "<!-- cat_help not set -->";
			}


		} else {
			// echo "<!-- no terms -->";
		}
	} else {
		// echo "<!-- get_term_meta doenst exist -->";
	}
}

/* after theme setup */
add_action('after_setup_theme', ea_setup);
	/**  ea_setup
	*  init stuff that we have to init after the main theme is setup.
	*
	*/
	function ea_setup() {
	 /* do stuff here afte theme is setup, can call it's functions, etc */


	}

	/* add filter to allow empty product categories to show in woo_product_categories() */
add_filter('woocommerce_product_subcategories_hide_empty', 'my_woo_cats_1');
function my_woo_cats_1 () {
	return true;
}

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {
 //remove generator meta tag
remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

	 //first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {
	 	//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			/*	 wp_dequeue_style( 'woocommerce_frontend_styles' );
			 wp_dequeue_style( 'woocommerce_fancybox_styles' );
			 wp_dequeue_style( 'woocommerce_chosen_styles' );
			 wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			 wp_dequeue_script( 'wc_price_slider' );
			 wp_dequeue_script( 'wc-single-product' );
			 wp_dequeue_script( 'wc-add-to-cart' );
			 wp_dequeue_script( 'wc-cart-fragments' );
			 wp_dequeue_script( 'wc-checkout' );
			 wp_dequeue_script( 'wc-add-to-cart-variation' );
			 wp_dequeue_script( 'wc-single-product' );
			 wp_dequeue_script( 'wc-cart' );
			 wp_dequeue_script( 'wc-chosen' );
			 wp_dequeue_script( 'woocommerce' );
		 	 wp_dequeue_script( 'prettyPhoto' );
			 wp_dequeue_script( 'prettyPhoto-init' );
			 wp_dequeue_script( 'jquery-blockui' );
			 wp_dequeue_script( 'jquery-placeholder' );
			 wp_dequeue_script( 'fancybox' );
			 wp_dequeue_script( 'jqueryui' );*/
		}
	}

}
