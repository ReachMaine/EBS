<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package flatsome
 */
/* mods
	11Nov14 zig - Make 404 page & add google custom search here.
	28Jun17 zig - add some links
	28jun18 zig - remove google custom search script & put get_search_form back
*/
get_header(); ?>

<div  class="page-wrapper">
<div class="row">
<div id="content" class="large-12 left columns" role="main">
		<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'flatsome' ); ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content">


		<p><?php _e( 'It looks like nothing was found at this location. Prehaps try one of the links below or a search?', 'flatsome' ); ?></p>

							 <?php get_search_form(); ?>
							<ul>
							 	<li><a href="https://www.ebsbuild.com/">Our home page</a></li>
							 	<li><a href="https://www.ebsbuild.com/design-center/">Design Center</a></li>
							 	<li><a href="https://www.ebsbuild.com/hardware-store/">Hardware Store</a></li>
							 	<li><a href="https://www.ebsbuild.com/lumber-building-supplies/">Lumber &amp; Build Supplies</a></li>
							</ul>
							<p>Check out our <a href="https://www.ebsbuild.com/deals">current sales flyer</a></p>

							<p>Or drop us a line...</p>

							<?php echo do_shortcode("[ninja_forms id=1]"); ?>
								</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->


</div><!-- end #content large-9 left -->

</div><!-- end row -->
</div><!-- end page-right-sidebar container -->


<?php get_footer(); ?>
