<?php get_header(); ?>

<div class="content">
		
	<?php get_template_part('inc/page-title'); ?>
			
	<?php if ( ! is_paged() ) : ?>
		<?php the_archive_description( '<div class="pad pad-top group"><div class="notebox">', '</div></div>' ); ?>
	<?php endif; ?>
	
	<?php if ( have_posts() ) : ?>
			
		<?php if ( get_theme_mod('blog-layout') == 'blog-grid' ) : ?>
			
			<div class="post-grid group">
				<?php $i = 1; echo '<div class="post-row">'; while ( have_posts() ): the_post(); ?>
					<?php get_template_part('content-grid'); ?>
				<?php if($i % 2 == 0) { echo '</div><div class="post-row">'; } $i++; endwhile; echo '</div>'; ?>
			</div><!--/.post-list-->
			
		<?php elseif ( get_theme_mod('blog-layout') == 'blog-list' ) : ?>
			
			<?php while ( have_posts() ): the_post(); ?>
				<?php get_template_part('content-list'); ?>
			<?php endwhile; ?>
			
		<?php else: ?>
		
			<?php while ( have_posts() ): the_post(); ?>
				<?php get_template_part('content'); ?>
			<?php endwhile; ?>
			
		<?php endif; ?>
		
		<?php get_template_part('inc/pagination'); ?>
		
	<?php endif; ?>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>