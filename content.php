<?php $format = get_post_format(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>	

	<div class="pad group">
		
		<?php if ( ot_get_option('format-icon') != 'off' ): ?>
			<div class="format-circle"><a href="<?php echo get_post_format_link($format); ?>"><i class="fa"></i></a></div>
		<?php endif; ?>
		
		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2><!--/.post-title-->
		
		<ul class="post-meta group">
			<li><?php the_category(' / '); ?></li>
			<li><i class="fa fa-clock-o"></i><?php the_time('j M, Y'); ?></li>
			<?php if ( comments_open() ): ?><li><a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i><?php comments_number( '0', '1', '%' ); ?></a></li><?php endif; ?>
		</ul><!--/.post-meta-->
		
		<?php get_template_part('inc/post-formats'); ?>

		<div class="entry">
			<?php 
				if ( is_search() ) { the_excerpt(); } 
				else the_content(__('Continue reading...','blogline'));
			?>
		</div><!--/.entry-->
		
	</div><!--/.pad-->

</article><!--/.post-->	