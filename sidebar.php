<?php 
	$sidebar = alx_sidebar_primary();
	$layout = alx_layout_class();
	if ( $layout != 'col-1c'):
?>

	<div class="sidebar s1">
		
		<a class="sidebar-toggle" title="<?php esc_html_e('Expand Sidebar','blogline'); ?>"><i class="fa icon-sidebar-toggle"></i></a>
		
		<div class="sidebar-content">
		
			
			<?php if ( ot_get_option('profile-image') ): ?>
				<div id="profile-image"><div id="profile-overlay"></div><img src="<?php echo ot_get_option('profile-image'); ?>" alt="" /></div>
			<?php endif; ?>
			<div id="profile" class="group">
				<?php if ( ot_get_option('profile-name') ): ?>
					<div id="profile-name"><?php echo ot_get_option('profile-name'); ?></div>
				<?php endif; ?>
				<?php if ( ot_get_option('profile-description') ): ?>
					<div id="profile-description"><?php echo ot_get_option('profile-description'); ?></div>
				<?php endif; ?>
				<?php alx_social_links() ; ?>
			</div>
			
			<?php if ( ot_get_option( 'post-nav' ) == 's1') { get_template_part('inc/post-nav'); } ?>
			
			<?php if( is_page_template('page-templates/child-menu.php') ): ?>
			<ul class="child-menu group">
				<?php wp_list_pages('title_li=&sort_column=menu_order&depth=3'); ?>
			</ul>
			<?php endif; ?>
			
			<?php dynamic_sidebar($sidebar); ?>
			
		</div><!--/.sidebar-content-->
		
	</div><!--/.sidebar-->
	
<?php endif; ?>