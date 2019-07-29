<?php $format = get_post_format(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>	

	<div class="pad group">
		
		<?php if ( get_theme_mod( 'format-icon', 'on' ) =='on' ): ?>
			<div class="format-circle"><a href="<?php echo get_post_format_link($format); ?>"><i class="fas"></i></a></div>
		<?php endif; ?>
		
		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2><!--/.post-title-->
		
		<ul class="post-meta group">
			<li><?php the_category(' / '); ?></li>
			<li><i class="far fa-clock"></i><?php the_time( get_option('date_format') ); ?></li>
			<?php if ( comments_open() ): ?><li><a href="<?php comments_link(); ?>"><i class="fas fa-comment"></i><?php comments_number( '0', '1', '%' ); ?></a></li><?php endif; ?>
		</ul><!--/.post-meta-->
		
		<?php get_template_part('inc/post-formats'); ?>

		<div class="entry">
			<?php 
				if ( is_search() ) { the_excerpt(); } 
				else the_content(esc_html__('Continue reading...','blogside'));
			?>
		</div><!--/.entry-->
		
	</div><!--/.pad-->

</article><!--/.post-->	