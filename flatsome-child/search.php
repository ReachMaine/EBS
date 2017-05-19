<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package flatsome
 */
 /* mods 
	12Nov14 zig - add google custom search code for search results.
*/

get_header();
if(!isset($flatsome_opt['blog_layout'])){$flatsome_opt['blog_layout'] = '';}
?>

<?php // ADD BLOG HEADER IF SET
if(isset($flatsome_opt['blog_header'])){ echo do_shortcode($flatsome_opt['blog_header']);}
?>
<div class="page-wrapper page-<?php if($flatsome_opt['blog_layout']){ echo $flatsome_opt['blog_layout'];} else {echo 'right-sidebar';} ?>">
	<div class="row">

		<?php if($flatsome_opt['blog_layout'] == 'left-sidebar') {
		 	echo '<div id="content" class="large-9 right columns" role="main">';
		 } else if($flatsome_opt['blog_layout'] == 'right-sidebar'){
		 	echo '<div id="content" class="large-9 left columns" role="main">';
		 } else if($flatsome_opt['blog_layout'] == 'no-sidebar'){
		 	echo '<div id="content" class="large-10 columns large-offset-1" role="main">';
		 } else {
		 	echo '<div id="content" class="large-9 left columns" role="main">';
		 }
		?>

		<div class="page-inner">
	
		

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'flatsome' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* <script>
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
			</script> */ ?>
			<gcse:searchresults-only></gcse:searchresults-only>

			<?php flatsome_content_nav( 'nav-below' ); ?>

		
	</div><!-- .page-inner -->
	</div><!-- #content -->

	<div class="large-3 columns left">
		<?php if($flatsome_opt['blog_layout'] == 'left-sidebar' || $flatsome_opt['blog_layout'] == 'right-sidebar'){
			get_sidebar();
		}?>
	</div><!-- end sidebar -->

</div><!-- end row -->	
</div><!-- end page-wrapper -->

<?php get_footer(); ?>