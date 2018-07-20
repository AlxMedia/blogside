<?php 
	$sidebar = blogline_sidebar_primary();
	$layout = blogline_layout_class();
	if ( $layout != 'col-1c'):
?>

	<div class="sidebar s1">
		
		<a class="sidebar-toggle" title="<?php esc_html_e('Expand Sidebar','blogline'); ?>"><i class="fa icon-sidebar-toggle"></i></a>
		
		<div class="sidebar-content">
		
			
			<?php if ( get_theme_mod('profile-image') ): ?>
				<div id="profile-image"><div id="profile-overlay"></div><img src="<?php echo get_theme_mod('profile-image'); ?>" alt="" /></div>
			<?php endif; ?>
			<div id="profile" class="group">
				<?php if ( get_theme_mod('profile-name') ): ?>
					<div id="profile-name"><?php echo get_theme_mod('profile-name'); ?></div>
				<?php endif; ?>
				<?php if ( get_theme_mod('profile-description') ): ?>
					<div id="profile-description"><?php echo get_theme_mod('profile-description'); ?></div>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'header-social', 'on' ) == 'on' ): ?>
					<?php blogline_social_links() ; ?>
				<?php endif; ?>
			</div>
			
			<?php if ( get_theme_mod( 'post-nav', 's1' ) == 's1') { get_template_part('inc/post-nav'); } ?>
			
			<?php if( is_page_template('page-templates/child-menu.php') ): ?>
			<ul class="child-menu group">
				<?php wp_list_pages('title_li=&sort_column=menu_order&depth=3'); ?>
			</ul>
			<?php endif; ?>
			
			<?php dynamic_sidebar($sidebar); ?>
			
		</div><!--/.sidebar-content-->
		
	</div><!--/.sidebar-->
	
<?php endif; ?>