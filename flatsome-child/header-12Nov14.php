<?php
/*  mods: 
	- remove right links in nav bar for cart & login.
	- replace it with can do just ask image
	12Nov14 zig - add Google Custom search using wordpress widget code given
*/
global $woo_options;
global $woocommerce;
global $flatsome_opt;
?>
<!DOCTYPE html>
<!--[if lte IE 9 ]><html class="ie lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<?php $wpt = wp_title('-', false); echo '<!-- '.$test.'-->';
	if (strpos($wpt, "Archives") !== false ) {
		$wpt = str_replace('Archives ', '', $wpt);
	} 
	 ?>
	<title><?php echo $wpt; /* wp_title( '|', true, 'right' ); */ ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Custom favicon-->
	<link rel="shortcut icon" href="<?php if ($flatsome_opt['site_favicon']) { echo $flatsome_opt['site_favicon']; ?>
	<?php } else { ?><?php echo get_template_directory_uri(); ?>/favicon.png<?php } ?>" />

	<!-- Retina/iOS favicon -->
	<link rel="apple-touch-icon-precomposed" href="<?php if ($flatsome_opt['site_favicon_large']) { echo $flatsome_opt['site_favicon_large']; ?>
	<?php } else { ?><?php echo get_template_directory_uri(); ?>/apple-touch-icon-precomposed.png<?php } ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Data Layer for tag manager -->
<script>
  dataLayer = [];
  dataLayer.push({'product':'non-product page'});
</script>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WPS3W9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WPS3W9');</script>
<!-- End Google Tag Manager -->

<?php 
// HTML Homepage Before Header // Set in Theme Option > HTML Blocks
if($flatsome_opt['html_intro'] && is_front_page()) echo '<div class="home-intro">'.do_shortcode($flatsome_opt['html_intro']).'</div>' ?>

	<div id="wrapper">
		<div class="header-wrapper">
		<?php do_action( 'before' ); ?>
		<?php if(!isset($flatsome_opt['topbar_show']) || $flatsome_opt['topbar_show']){ ?>
		<div id="top-bar">
			<div class="row">
				<div class="large-12 columns">
					<!-- left text -->
					<div class="left-text left">
						<div class="html"><?php echo do_shortcode( $flatsome_opt['topbar_left']);?></div><!-- .html -->
					</div>
					<!-- right text -->
					<div class="right-text right hide-for-small">
						 <?php if ( has_nav_menu( 'top_bar_nav' ) ) : ?>
						<?php  
								wp_nav_menu(array(
									'theme_location' => 'top_bar_nav',
									'menu_class' => 'top-bar-nav',
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 2,
									'fallback_cb' => false,
									'walker' => new FlatsomeNavDropdown
								));
						?>
						 <?php else: ?>
                            Define your top bar navigation in <b>Apperance > Menus</b>
                        <?php endif; ?>
					</div><!-- .pos-text -->

				</div><!-- .large-12 columns -->
			</div><!-- .row -->
		</div><!-- .#top-bar -->
		<?php }?>


		<div class="sticky-wrapper">
		<header id="masthead" class="site-header" role="banner">
			<div class="row"> 
				<div class="large-12 columns header-container">
					<div class="mobile-menu show-for-small"><a href="#open-menu"><span class="icon-menu"></span></a></div><!-- end mobile menu -->
					
					<?php if($flatsome_opt['logo_position'] == 'left') : ?> 
					<div id="logo" class="logo-left">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
							<?php if($flatsome_opt['site_logo']){
								$site_title = esc_attr( get_bloginfo( 'name', 'display' ) );
								echo '<img src="'.$flatsome_opt['site_logo'].'" class="header_logo" alt="'.$site_title.'"/>';
							} else {bloginfo( 'name' );}?>
						</a>
					</div><!-- .logo -->
					<?php endif; ?>

					<div class="left-links">
						<?php if(!isset($flatsome_opt['nav_position']) || $flatsome_opt['nav_position'] == 'top' || $flatsome_opt['body_layout'] == 'left-mode') { ?>
							<ul id="site-navigation" class="header-nav">
								<?php if ( has_nav_menu( 'primary' ) ) : ?>
								
								<?php if (!isset($flatsome_opt['search_pos']) || $flatsome_opt['search_pos'] == 'left') { ?>
								<li class="search-dropdown">
									<a href="#" class="nav-top-link icon-search" onClick="return false;"></a>
									<div class="nav-dropdown">
										<div class="search-wrapper" >
											<script>
											  (function() {
											    var cx = '000992598910587150973:wrnc3sr_qp8';
											    var gcse = document.createElement('script');
											    gcse.type = 'text/javascript';
											    gcse.async = true;
											    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
											        '//www.google.com/cse/cse.js?cx=' + cx;
											    var s = document.getElementsByTagName('script')[0];
											    s.parentNode.insertBefore(gcse, s);
											  })();
											</script>
											<gcse:searchbox-only></gcse:searchbox-only>
										</div>
											<?php /*  if(function_exists('get_product_search_form')) {
												get_product_search_form();
											} else {
												get_search_form();
											} */ ?>	
									</div><!-- .nav-dropdown -->
								</li><!-- .search-dropdown -->
								<?php } ?>

									<?php  
									wp_nav_menu(array(
										'theme_location' => 'primary',
										'container'       => false,
										'items_wrap'      => '%3$s',
										'depth'           => 0,
										'walker'          => new FlatsomeNavDropdown
									));
								?>

								<?php if (isset($flatsome_opt['search_pos']) && $flatsome_opt['search_pos'] == 'right') { ?>
								<li class="search-dropdown">
									<a href="#" class="nav-top-link icon-search"></a>
									<div class="nav-dropdown">
										<?php if(function_exists('get_product_search_form')) {
											get_product_search_form();
										} else {
											get_search_form();
										} ?>		
									</div><!-- .nav-dropdown -->
								</li><!-- .search-dropdown -->
								<?php } ?>

		                        <?php else: ?>
		                            <li>Define your main navigation in <b>Apperance > Menus</b></li>
		                        <?php endif; ?>								
							</ul>
						<?php } else { ?>
 
						<div class="wide-nav-search hide-for-small">
							<?php if($flatsome_opt['search_pos'] == 'left'){ ?>
							<div class="ztesting">
								<?php if(function_exists('get_product_search_form')) {
										get_product_search_form();
										} else {
											get_search_form();
										} ?> 

							<?php } ?>
							</div>
							<div>
								<?php echo do_shortcode($flatsome_opt['nav_position_text_top']); ?>
							</div>
						</div>
						

						<?php } ?>
					</div><!-- .left-links -->

					<?php if($flatsome_opt['logo_position'] == 'center') { ?> 
					<div id="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
							<?php if($flatsome_opt['site_logo']){
								$site_title = esc_attr( get_bloginfo( 'name', 'display' ) );
								echo '<img src="'.$flatsome_opt['site_logo'].'" class="header_logo" alt="'.$site_title.'"/>';
							} else {bloginfo( 'name' );}?>
						</a>
					</div><!-- .logo -->
					<?php } ?>
					<div class="right-links">
						<a href = "http://www.ebsbuild.com/pages/contact-us/"><img id="ebs_cando" class="hide-for-small" src="<?php echo get_stylesheet_directory_uri(); ?>/images/can_do_just_ask_header.png"></a>
					</div> <?php /* end right links */ ?>
		</div><!-- .large-12 -->
	</div><!-- .row -->


</header><!-- .header -->
</div><!-- .sticky-wrapper -->

<?php if($flatsome_opt['nav_position'] == 'bottom' || $flatsome_opt['nav_position'] == 'bottom_center') { ?>
<!-- Main navigation - Full width style -->
<div class="wide-nav hide-for-small  <?php echo $flatsome_opt['nav_position_color']; ?> <?php if($flatsome_opt['nav_position'] == 'bottom_center') {echo 'nav-center';} else {echo 'nav-left';} ?>">
	<div class="row">
		<div class="large-12 columns">
		<div class="nav-wrapper">
		<ul id="site-navigation" class="header-nav">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php  
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'container'       => false,
						'items_wrap'      => '%3$s',
						'depth'           => 3,
						'walker'          => new FlatsomeNavDropdown
					));
				?>

				<?php if($flatsome_opt['search_pos'] == 'right' && $flatsome_opt['nav_position'] == 'bottom_center'){ ?>
					<li class="search-dropdown">
					<a href="#" class="nav-top-link icon-search" onClick="return false;"></a>
					<div class="nav-dropdown">
						<?php if(function_exists('get_product_search_form')) {
							get_product_search_form();
						} else {
							get_search_form();
						} ?>	
					</div><!-- .nav-dropdown -->
				</li><!-- .search-dropdown -->
				<?php } ?>
              <?php else: ?>
                  <li>Define your main navigation in <b>Apperance > Menus</b></li>
              <?php endif; ?>								
		</ul>
		<?php if($flatsome_opt['nav_position'] == 'bottom') { ?>
		<div class="right hide-for-small">
			<div class="wide-nav-right">
				<div>
				<?php echo do_shortcode($flatsome_opt['nav_position_text']); ?>
			</div>
				<?php if($flatsome_opt['search_pos'] == 'right'){ ?>
							<div>
									<?php if(function_exists('get_product_search_form')) {
											get_product_search_form();
										} else {
											get_search_form();
										} ?>		
							</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		</div><!-- nav-wrapper -->
		</div><!-- .large-12 -->
	</div><!-- .row -->
</div><!-- .wide-nav -->
<?php } ?>
</div><!-- .header-wrapper -->


<?php if(isset($flatsome_opt['html_after_header'])){
	// AFTER HEADER HTML BLOCK
	echo do_shortcode($flatsome_opt['html_after_header']);
} ?>

<div id="main-content" class="site-main <?php echo $flatsome_opt['content_color']; ?>">
<?php 
//adds a border line if header is white
if (strpos($flatsome_opt['header_bg'],'#fff') !== false || $flatsome_opt['nav_position'] == 'top') {
		  echo '<div class="row"><div class="large-12 columns"><div class="top-divider"></div></div></div>';
} ?>

<?php if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?> 
	<!-- woocommerce message -->
	<?php  if(function_exists('wc_print_notices')) {wc_print_notices();} else {woocommerce_show_messages();} ?>
<?php } ?>