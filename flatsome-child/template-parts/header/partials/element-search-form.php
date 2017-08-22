		<?php /* mods - use google custom search */ ?>
		<li class="header-search-form search-form html relative has-icon">
	<div class="header-search-form-wrapper zigg">
		<?php /* echo do_shortcode('[search style="'.flatsome_option('header_search_form_style').'"]'); */ ?>
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
</li>
