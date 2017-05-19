<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
/*
 * zig mods:
 * - comment out add to cart button & min & max prices.
 *
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product;

if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	$availability = $product->get_availability();

	if ($availability['availability']) :
		echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] );
    endif;
?>
<?php /* zig put the catalog mode product (i'm interested) here
		global $flatsome_opt;
		echo '<div class="catalog-product-text">';
		echo do_shortcode($flatsome_opt['catalog_mode_product']);
		echo '</div>'; */ 
?>
<?php if ( $product->is_in_stock() ) : ?>
	

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>


	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	 	<?php /* zig <button type="submit" class="single_add_to_cart_button button secondary"><?php echo $product->single_add_to_cart_text(); ?></button> */ ?>

		 	<?php /* zig
	 		if ( ! $product->is_sold_individually() )
	 			woocommerce_quantity_input( array(
	 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
	 			) );
	 	*/ ?>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>


	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

<?php endif; ?>