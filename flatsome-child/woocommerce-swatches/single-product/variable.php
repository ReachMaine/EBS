<?php
/**
 * Variable Product Add to Cart
 */
global $woocommerce, $product, $post;

$variation_params = woocommerce_swatches_get_variation_form_args();

/* do_action('woocommerce_before_add_to_cart_form'); */
?>
<form action="<?php echo esc_url($product->add_to_cart_url()); ?>" 
      class="variations_form cart swatches zig3" 
      method="post" 
      enctype='multipart/form-data' 
      data-product_id="<?php echo $post->ID; ?>" 
      data-product_variations="<?php echo esc_attr(json_encode($available_variations)) ?>"
      data-product_attributes="<?php echo esc_attr(json_encode($variation_params['attributes_renamed'])); ?>"
      data-product_variations_flat="<?php echo esc_attr(json_encode($variation_params['available_variations_flat'])); ?>"
      >
	<div class="variation_form_section zig">
		<?php
		$woocommerce_variation_control_output = new WC_Swatch_Picker($product->id, $attributes, $selected_attributes);
		$woocommerce_variation_control_output->picker();
		?>

		<div class="clear"></div><a id="variations_clear" href="#reset" style="display:none;"><?php _e('Reset selection', 'woocommerce'); ?></a>

	</div>


</form>


