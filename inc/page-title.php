<div class="page-title group">
	<div class="pad group">

	<?php if ( is_home() ) : ?>
		<h2><?php echo blogside_blog_title(); ?></h2>
		
	<?php elseif ( is_single() ): ?>
		<ul class="meta-single group">
			<li class="category"><?php the_category(' <span>/</span> '); ?></li>
			<?php if ( comments_open() && ( get_theme_mod( 'comment-count', 'on' ) =='on' ) ): ?>
			<li class="comments"><a href="<?php comments_link(); ?>"><i class="fa fa-comments-o"></i><?php comments_number( '0', '1', '%' ); ?></a></li>
			<?php endif; ?>
		</ul>
		
	<?php elseif ( is_page() ): ?>
		<h2><?php the_title(); ?></h2>

	<?php elseif ( is_search() ): ?>
		<h1>
			<?php if ( have_posts() ): ?><i class="fa fa-search"></i><?php endif; ?>
			<?php if ( !have_posts() ): ?><i class="fa fa-exclamation-circle"></i><?php endif; ?>
			<?php $search_results=$wp_query->found_posts;
				if ($search_results==1) {
					echo $search_results.' '.esc_html__('Search result','blogside');
				} else {
					echo $search_results.' '.esc_html__('Search results','blogside');
				}
			?>
		</h1>
		
	<?php elseif ( is_404() ): ?>
		<h1><i class="fa fa-exclamation-circle"></i><?php esc_html_e('Error 404.','blogside'); ?> <span><?php esc_html_e('Page not found!','blogside'); ?></span></h1>
		
	<?php elseif ( is_author() ): ?>
		<?php $author = get_userdata( get_query_var('author') );?>
		<h1><i class="fa fa-user"></i><?php esc_html_e('Author:','blogside'); ?> <span><?php echo $author->display_name;?></span></h1>
		
	<?php elseif ( is_category() ): ?>
		<h1><i class="fa fa-folder-open"></i><?php esc_html_e('Category:','blogside'); ?> <span><?php echo single_cat_title('', false); ?></span></h1>

	<?php elseif ( is_tag() ): ?>
		<h1><i class="fa fa-tags"></i><?php esc_html_e('Tagged:','blogside'); ?> <span><?php echo single_tag_title('', false); ?></span></h1>
		
	<?php elseif ( is_day() ): ?>
		<h1><i class="fa fa-calendar"></i><?php esc_html_e('Daily Archive:','blogside'); ?> <span><?php echo esc_html( get_the_time('F j, Y') ); ?></span></h1>
		
	<?php elseif ( is_month() ): ?>
		<h1><i class="fa fa-calendar"></i><?php esc_html_e('Monthly Archive:','blogside'); ?> <span><?php echo esc_html( get_the_time('F Y') ); ?></span></h1>
			
	<?php elseif ( is_year() ): ?>
		<h1><i class="fa fa-calendar"></i><?php esc_html_e('Yearly Archive:','blogside'); ?> <span><?php echo esc_html( get_the_time('Y') ); ?></span></h1>
		
		<?php elseif ( has_post_format('audio') ): ?>
			<h1><i class="fa fa-volume-up"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Audio','blogside'); ?></span></h1>
		<?php elseif ( has_post_format('aside') ): ?>
			<h1><i class="fa fa-pen"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Aside','blogside'); ?></span></h1>
		<?php elseif ( has_post_format('chat') ): ?>
			<h1><i class="fa fa-comments-o"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Chat','blogside'); ?></span></h1>
		<?php elseif ( has_post_format('gallery') ): ?>
			<h1><i class="fa fa-picture-o"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Gallery','blogside'); ?></span></h1>
		<?php elseif ( has_post_format('image') ): ?>
			<h1><i class="fa fa-camera"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Image','blogside'); ?></span></h1>
		<?php elseif ( has_post_format('link') ): ?>
			<h1><i class="fa fa-link"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Link','blogside'); ?></span></h1>
		<?php elseif ( has_post_format('quote') ): ?>
			<h1><i class="fa fa-quote-left"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Quote','blogside'); ?></span></h1>
		<?php elseif ( has_post_format('status') ): ?>
			<h1><i class="fa fa-bullhorn"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Status','blogside'); ?></span></h1>
		<?php elseif ( has_post_format('video') ): ?>
			<h1><i class="fa fa-video-camera"></i><?php esc_html_e('Type:','blogside'); ?> <span><?php esc_html_e('Video','blogside'); ?></span></h1>
	
	<?php else: ?>
		<h2><?php the_title(); ?></h2>
	
	<?php endif; ?>
		
	</div><!--/.pad-->
</div><!--/.page-title-->