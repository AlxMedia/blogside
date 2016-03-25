<?php

/*  Initialize the options before anything else. 
/* ------------------------------------ */
add_action( 'admin_init', 'custom_theme_options', 1 );


/*  Build the custom settings & update OptionTree.
/* ------------------------------------ */
function custom_theme_options() {
	
	// Get a copy of the saved settings array.
	$saved_settings = get_option( 'option_tree_settings', array() );

	// Custom settings array that will eventually be passed to the OptionTree Settings API Class.
	$custom_settings = array(

/*  Help pages
/* ------------------------------------ */	
	'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => esc_html__( 'Documentation', 'blogline' ),
          'content'   => '
			<h1>Blogline</h1>
			<ul>
				<li><a target="_blank" href="'.get_template_directory_uri().'/functions/documentation/documentation.html">' . esc_html__( 'Theme Documentation', 'blogline' ) . '</a></li>
			</ul>
		'
        )
      )
    ),
	
/*  Admin panel sections
/* ------------------------------------ */	
	'sections'        => array(
		array(
			'id'		=> 'general',
			'title'		=> esc_html__( 'General', 'blogline' ),
		),
		array(
			'id'		=> 'blog',
			'title'		=> esc_html__( 'Blog', 'blogline' ),
		),
		array(
			'id'		=> 'header',
			'title'		=> esc_html__( 'Header', 'blogline' ),
		),
		array(
			'id'		=> 'footer',
			'title'		=> esc_html__( 'Footer', 'blogline' ),
		),
		array(
			'id'		=> 'layout',
			'title'		=> esc_html__( 'Layout', 'blogline' ),
		),
		array(
			'id'		=> 'sidebars',
			'title'		=> esc_html__( 'Sidebars', 'blogline' ),
		),
		array(
			'id'		=> 'social-links',
			'title'		=> esc_html__( 'Social Links', 'blogline' ),
		),
		array(
			'id'		=> 'styling',
			'title'		=> esc_html__( 'Styling', 'blogline' ),
		),
	),
	
/*  Theme options
/* ------------------------------------ */
	'settings'        => array(
		
		// General: Custom CSS
		array(
			'id'		=> 'custom',
			'label'		=> esc_html__( 'Custom Stylesheet', 'blogline' ),
			'desc'		=> esc_html__( 'Load custom stylesheet (custom.css)', 'blogline' ),
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// General: Responsive Layout
		array(
			'id'		=> 'responsive',
			'label'		=> esc_html__( 'Responsive Layout', 'blogline' ),
			'desc'		=> esc_html__( 'Mobile and tablet optimizations (responsive.css)', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// General: Mobile Sidebar
		array(
			'id'		=> 'mobile-sidebar-hide',
			'label'		=> esc_html__( 'Mobile Sidebar Content', 'blogline' ),
			'desc'		=> esc_html__( 'Sidebar content on low-resolution mobile devices (320px)', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// General: RSS Feed
		array(
			'id'		=> 'rss-feed',
			'label'		=> esc_html__( 'FeedBurner URL', 'blogline' ),
			'desc'		=> esc_html__( 'Enter your full FeedBurner URL (or any other preferred feed URL) if you wish to use FeedBurner over the standard WordPress feed e.g. http://feeds.feedburner.com/yoururlhere', 'blogline' ),
			'type'		=> 'text',
			'section'	=> 'general'
		),
		// General: Post Comments
		array(
			'id'		=> 'post-comments',
			'label'		=> esc_html__( 'Post Comments', 'blogline' ),
			'desc'		=> esc_html__( 'Comments on posts', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// General: Page Comments
		array(
			'id'		=> 'page-comments',
			'label'		=> esc_html__( 'Page Comments', 'blogline' ),
			'desc'		=> esc_html__( 'Comments on pages', 'blogline' ),
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// General: Recommended Plugins
		array(
			'id'		=> 'recommended-plugins',
			'label'		=> esc_html__( 'Recommended Plugins', 'blogline' ),
			'desc'		=> esc_html__( 'Enable or disable the recommended plugins notice', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// Blog: Blog Layout
		array(
			'id'		=> 'blog-layout',
			'label'		=> esc_html__( 'Blog Layout', 'blogline' ),
			'desc'		=> '',
			'std'		=> 'blog-standard',
			'type'		=> 'radio',
			'section'	=> 'blog',
			'choices'	=> array(
				array( 
					'value' => 'blog-standard',
					'label' => 'Standard'
				),
				array( 
					'value' => 'blog-grid',
					'label' => 'Grid'
				),
				array( 
					'value' => 'blog-list',
					'label' => 'List'
				)
			)
		),
		// Blog: Heading
		array(
			'id'		=> 'blog-heading',
			'label'		=> esc_html__( 'Heading', 'blogline' ),
			'desc'		=> esc_html__( 'Your blog heading', 'blogline' ),
			'type'		=> 'text',
			'section'	=> 'blog'
		),
		// Blog: Subheading
		array(
			'id'		=> 'blog-subheading',
			'label'		=> esc_html__( 'Subheading', 'blogline' ),
			'desc'		=> esc_html__( 'Your blog subheading', 'blogline' ),
			'type'		=> 'text',
			'section'	=> 'blog'
		),
		// Blog: Excerpt Length
		array(
			'id'			=> 'excerpt-length',
			'label'			=> esc_html__( 'Excerpt Length', 'blogline' ),
			'desc'			=> esc_html__( 'Max number of words', 'blogline' ),
			'std'			=> '26',
			'type'			=> 'numeric-slider',
			'section'		=> 'blog',
			'min_max_step'	=> '0,100,1'
		),
		// Blog: Featured Posts
		array(
			'id'		=> 'featured-posts-include',
			'label'		=> esc_html__( 'Featured Posts', 'blogline' ),
			'desc'		=> esc_html__( 'To show featured posts in the slider AND the content below. Usually not recommended.', 'blogline' ),
			'type'		=> 'checkbox',
			'section'	=> 'blog',
			'choices'	=> array(
				array( 
					'value' => '1',
					'label' => esc_html__( 'Include featured posts in content area', 'blogline' ),
				)
			)
		),
		// Blog: Featured Category
		array(
			'id'		=> 'featured-category',
			'label'		=> esc_html__( 'Featured Category', 'blogline' ),
			'desc'		=> esc_html__( 'By not selecting a category, it will show your latest post(s) from all categories', 'blogline' ),
			'type'		=> 'category-select',
			'section'	=> 'blog'
		),
		// Blog: Featured Category Count
		array(
			'id'			=> 'featured-posts-count',
			'label'			=> esc_html__( 'Featured Post Count', 'blogline' ),
			'desc'			=> esc_html__( 'Max number of featured posts to display. Set it to 0 to disable.', 'blogline' ),
			'std'			=> '3',
			'type'			=> 'numeric-slider',
			'section'		=> 'blog',
			'min_max_step'	=> '0,12,1'
		),
		// Blog: Frontpage Widgets Top
		array(
			'id'		=> 'frontpage-widgets-top',
			'label'		=> esc_html__( 'Frontpage Widgets Top', 'blogline' ),
			'desc'		=> esc_html__( '2 columns of widgets', 'blogline' ),
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Frontpage Widgets Bottom
		array(
			'id'		=> 'frontpage-widgets-bottom',
			'label'		=> esc_html__( 'Frontpage Widgets Bottom', 'blogline' ),
			'desc'		=> esc_html__( '2 columns of widgets', 'blogline' ),
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Comment Count
		array(
			'id'		=> 'comment-count',
			'label'		=> esc_html__( 'Thumbnail Comment Count', 'blogline' ),
			'desc'		=> esc_html__( 'Comment count on thumbnails', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Post Format Icon
		array(
			'id'		=> 'format-icon',
			'label'		=> esc_html__( 'Post Format Icons', 'blogline' ),
			'desc'		=> esc_html__( 'Circle icons', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Single - Sharrre
		array(
			'id'		=> 'sharrre',
			'label'		=> esc_html__( 'Single &mdash; Share Bar', 'blogline' ),
			'desc'		=> esc_html__( 'Social sharing buttons for each article', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Twitter Username
		array(
			'id'		=> 'twitter-username',
			'label'		=> esc_html__( 'Single &mdash; Share Bar &mdash; Twitter Username', 'blogline' ),
			'desc'		=> esc_html__( 'Your @username will be added to share-tweets of your posts (optional)', 'blogline' ),
			'type'		=> 'text',
			'section'	=> 'blog'
		),
		// Blog: Single - Authorbox
		array(
			'id'		=> 'author-bio',
			'label'		=> esc_html__( 'Single &mdash; Author Bio', 'blogline' ),
			'desc'		=> esc_html__( 'Shows post author description, if it exists', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Single - Related Posts
		array(
			'id'		=> 'related-posts',
			'label'		=> esc_html__( 'Single &mdash; Related Posts', 'blogline' ),
			'desc'		=> esc_html__( 'Shows randomized related articles below the post', 'blogline' ),
			'std'		=> 'categories',
			'type'		=> 'radio',
			'section'	=> 'blog',
			'choices'	=> array(
				array( 
					'value' => '1',
					'label' => esc_html__( 'Disable', 'blogline' ),
				),
				array( 
					'value' => 'categories',
					'label' => esc_html__( 'Related by categories', 'blogline' ),
				),
				array( 
					'value' => 'tags',
					'label' => esc_html__( 'Related by tags', 'blogline' ),
				)
			)
		),
		// Blog: Single - Post Navigation Location
		array(
			'id'		=> 'post-nav',
			'label'		=> esc_html__( 'Single &mdash; Post Navigation', 'blogline' ),
			'desc'		=> esc_html__( 'Shows links to the next and previous article', 'blogline' ),
			'std'		=> 's1',
			'type'		=> 'radio',
			'section'	=> 'blog',
			'choices'	=> array(
				array( 
					'value' => '1',
					'label' => esc_html__( 'Disable', 'blogline' ),
				),
				array( 
					'value' => 's1',
					'label' => esc_html__( 'Sidebar Primary', 'blogline' ),
				),
				array( 
					'value' => 'content',
					'label' => esc_html__( 'Below content', 'blogline' ),
				)
			)
		),
		// Header: Custom Logo
		array(
			'id'		=> 'custom-logo',
			'label'		=> esc_html__( 'Custom Logo', 'blogline' ),
			'desc'		=> esc_html__( 'Upload your custom logo image, 120px height recommended', 'blogline' ),
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		// Header: Site Description
		array(
			'id'		=> 'site-description',
			'label'		=> esc_html__( 'Site Description', 'blogline' ),
			'desc'		=> esc_html__( 'The description that appears next to your logo', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'header'
		),
		// Header: Enable profile section.
		array(
			'id'		=> 'enable-profile',
			'label'		=> esc_html__( 'Enable profile', 'blogline' ),
			'desc'		=> esc_html__( 'Display profile section and social links in the top of sidebar', 'blogline' ),
			'type'		=> 'on-off',
			'section'	=> 'header',
			'std'		=> 'on',
		),
		// Header: Profile Avatar
		array(
			'id'		=> 'profile-image',
			'label'		=> esc_html__( 'Profile Image', 'blogline' ),
			'desc'		=> esc_html__( 'Minimum width 400px.', 'blogline' ),
			'type'		=> 'upload',
			'section'	=> 'header',
			'condition'	=> 'enable-profile:is(on)',
		),
		// Header: Profile Name
		array(
			'id'		=> 'profile-name',
			'label'		=> esc_html__( 'Profile Name', 'blogline' ),
			'desc'		=> esc_html__( 'Your name appears below the image', 'blogline' ),
			'type'		=> 'text',
			'section'	=> 'header',
			'condition'	=> 'enable-profile:is(on)',
		),
		// Header: Profile Description
		array(
			'id'		=> 'profile-description',
			'label'		=> esc_html__( 'Profile Description', 'blogline' ),
			'desc'		=> esc_html__( 'A short description of you', 'blogline' ),
			'type'		=> 'text',
			'section'	=> 'header',
			'condition'	=> 'enable-profile:is(on)',
		),
		// Footer: Ads
		array(
			'id'		=> 'footer-ads',
			'label'		=> esc_html__( 'Footer Ads', 'blogline' ),
			'desc'		=> esc_html__( 'Footer widget ads area', 'blogline' ),
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'footer'
		),
		// Footer: Widget Columns
		array(
			'id'		=> 'footer-widgets',
			'label'		=> esc_html__( 'Footer Widget Columns', 'blogline' ),
			'desc'		=> esc_html__( 'Select columns to enable footer widgets. Recommended number: 3', 'blogline' ),
			'std'		=> '0',
			'type'		=> 'radio-image',
			'section'	=> 'footer',
			'class'		=> '',
			'choices'	=> array(
				array(
					'value'		=> '0',
					'label'		=> esc_html__( 'Disable', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> '1',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/footer-widgets-1.png'
				),
				array(
					'value'		=> '2',
					'label'		=> esc_html__( '2 Columns', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/footer-widgets-2.png'
				),
				array(
					'value'		=> '3',
					'label'		=> esc_html__( '3 Columns', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/footer-widgets-3.png'
				),
				array(
					'value'		=> '4',
					'label'		=> esc_html__( '4 Columns', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/footer-widgets-4.png'
				)
			)
		),
		// Footer: Copyright
		array(
			'id'		=> 'copyright',
			'label'		=> esc_html__( 'Footer Copyright', 'blogline' ),
			'desc'		=> esc_html__( 'Replace the footer copyright text', 'blogline' ),
			'type'		=> 'text',
			'section'	=> 'footer'
		),
		// Footer: Credit
		array(
			'id'		=> 'credit',
			'label'		=> esc_html__( 'Footer Credit', 'blogline' ),
			'desc'		=> esc_html__( 'Footer credit text', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'footer'
		),
		// Layout : Global
		array(
			'id'		=> 'layout-global',
			'label'		=> esc_html__( 'Global Layout', 'blogline' ),
			'desc'		=> esc_html__( 'Other layouts will override this option if they are set', 'blogline' ),
			'std'		=> 'col-2cl',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'col-1c',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> esc_html__( '2 Column Left', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> esc_html__( '2 Column Right', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Home
		array(
			'id'		=> 'layout-home',
			'label'		=> esc_html__( 'Home', 'blogline' ),
			'desc'		=> esc_html__( '(is_home) Posts homepage layout', 'blogline' ),
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> esc_html__( 'Inherit Global Layout', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> esc_html__( '2 Column Left', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> esc_html__( '2 Column Right', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Single
		array(
			'id'		=> 'layout-single',
			'label'		=> esc_html__( 'Single', 'blogline' ),
			'desc'		=> esc_html__( '(is_single) Single post layout - If a post has a set layout, it will override this.', 'blogline' ),
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> esc_html__( 'Inherit Global Layout', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> esc_html__( '2 Column Left', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> esc_html__( '2 Column Right', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Archive
		array(
			'id'		=> 'layout-archive',
			'label'		=> esc_html__( 'Archive', 'blogline' ),
			'desc'		=> esc_html__( '(is_archive) Category, date, tag and author archive layout', 'blogline' ),
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> esc_html__( 'Inherit Global Layout', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> esc_html__( '2 Column Left', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> esc_html__( '2 Column Right', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Archive - Category
		array(
			'id'		=> 'layout-archive-category',
			'label'		=> esc_html__( 'Archive &mdash; Category', 'blogline' ),
			'desc'		=> esc_html__( '(is_category) Category archive layout', 'blogline' ),
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> esc_html__( 'Inherit Global Layout', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> esc_html__( '2 Column Left', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> esc_html__( '2 Column Right', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Search
		array(
			'id'		=> 'layout-search',
			'label'		=> esc_html__( 'Search', 'blogline' ),
			'desc'		=> esc_html__( '(is_search) Search page layout', 'blogline' ),
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> esc_html__( 'Inherit Global Layout', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> esc_html__( '2 Column Left', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> esc_html__( '2 Column Right', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Error 404
		array(
			'id'		=> 'layout-404',
			'label'		=> esc_html__( 'Error 404', 'blogline' ),
			'desc'		=> esc_html__( '(is_404) Error 404 page layout', 'blogline' ),
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> esc_html__( 'Inherit Global Layout', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> esc_html__( '2 Column Left', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> esc_html__( '2 Column Right', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Default Page
		array(
			'id'		=> 'layout-page',
			'label'		=> esc_html__( 'Default Page', 'blogline' ),
			'desc'		=> esc_html__( '(is_page) Default page layout - If a page has a set layout, it will override this.', 'blogline' ),
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> esc_html__( 'Inherit Global Layout', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> esc_html__( '1 Column', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> esc_html__( '2 Column Left', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> esc_html__( '2 Column Right', 'blogline' ),
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Sidebars: Create Areas
		array(
			'id'		=> 'sidebar-areas',
			'label'		=> esc_html__( 'Create Sidebars', 'blogline' ),
			'desc'		=> esc_html__( 'You must save changes for the new areas to appear below. Warning: Make sure each area has a unique ID.', 'blogline' ),
			'type'		=> 'list-item',
			'section'	=> 'sidebars',
			'choices'	=> array(),
			'settings'	=> array(
				array(
					'id'		=> 'id',
					'label'		=> esc_html__( 'Sidebar ID', 'blogline' ),
					'desc'		=> esc_html__( 'This ID must be unique, for example "sidebar-about"', 'blogline' ),
					'std'		=> 'sidebar-',
					'type'		=> 'text',
					'choices'	=> array()
				)
			)
		),
		// Sidebar 1 & 2
		array(
			'id'		=> 's1-home',
			'label'		=> esc_html__( 'Home', 'blogline' ),
			'desc'		=> esc_html__( '(is_home) Primary', 'blogline' ),
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-single',
			'label'		=> esc_html__( 'Single', 'blogline' ),
			'desc'		=> esc_html__( '(is_single) Primary - If a single post has a unique sidebar, it will override this.', 'blogline' ),
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-archive',
			'label'		=> esc_html__( 'Archive', 'blogline' ),
			'desc'		=> esc_html__( '(is_archive) Primary', 'blogline' ),
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-archive-category',
			'label'		=> esc_html__( 'Archive &mdash; Category', 'blogline' ),
			'desc'		=> esc_html__( '(is_category) Primary', 'blogline' ),
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-search',
			'label'		=> esc_html__( 'Search', 'blogline' ),
			'desc'		=> esc_html__( '(is_search) Primary', 'blogline' ),
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-404',
			'label'		=> esc_html__( 'Error 404', 'blogline' ),
			'desc'		=> esc_html__( '(is_404) Primary', 'blogline' ),
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-page',
			'label'		=> esc_html__( 'Default Page', 'blogline' ),
			'desc'		=> esc_html__( '(is_page) Primary - If a page has a unique sidebar, it will override this.', 'blogline' ),
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		// Social Links : List
		array(
			'id'		=> 'social-links',
			'label'		=> esc_html__( 'Social Links', 'blogline' ),
			'desc'		=> esc_html__( 'Create and organize your social links', 'blogline' ),
			'type'		=> 'list-item',
			'section'	=> 'social-links',
			'choices'	=> array(),
			'settings'	=> array(
				array(
					'id'		=> 'social-icon',
					'label'		=> esc_html__( 'Icon Name', 'blogline' ),
					'desc'		=> esc_html__( 'Font Awesome icon names:', 'blogline' ) . ' <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><strong>' . esc_html__( 'View All', 'blogline' ) . ' </strong></a>',
					'std'		=> 'fa-',
					'type'		=> 'text',
					'choices'	=> array()
				),
				array(
					'id'		=> 'social-link',
					'label'		=> esc_html__( 'Link', 'blogline' ),
					'desc'		=> esc_html__( 'Enter the full url for your icon button', 'blogline' ),
					'std'		=> 'http://',
					'type'		=> 'text',
					'choices'	=> array()
				),
				array(
					'id'		=> 'social-color',
					'label'		=> esc_html__( 'Icon Color', 'blogline' ),
					'desc'		=> esc_html__( 'Set a unique color for your icon (optional)', 'blogline' ),
					'std'		=> '',
					'type'		=> 'colorpicker',
					'section'	=> 'styling'
				),
				array(
					'id'		=> 'social-target',
					'label'		=> esc_html__( 'Link Options', 'blogline' ),
					'desc'		=> '',
					'std'		=> '',
					'type'		=> 'checkbox',
					'choices'	=> array(
						array( 
							'value' => '_blank',
							'label' => esc_html__( 'Open in new window', 'blogline' ),
						)
					)
				)
			)
		),
		// Styling: Enable
		array(
			'id'		=> 'dynamic-styles',
			'label'		=> esc_html__( 'Dynamic Styles', 'blogline' ),
			'desc'		=> esc_html__( 'Turn on to use the styling options below', 'blogline' ),
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'styling'
		),
		// Styling: Font
		array(
			'id'		=> 'font',
			'label'		=> esc_html__( 'Font', 'blogline' ),
			'desc'		=> esc_html__( 'Select font for the theme', 'blogline' ),
			'type'		=> 'select',
			'std'		=> 'raleway',
			'section'	=> 'styling',
			'choices'	=> array(
				array( 
					'value' => 'titillium-web',
					'label' => 'Titillium Web, Latin (Self-hosted)'
				),
				array( 
					'value' => 'titillium-web-ext',
					'label' => 'Titillium Web, Latin-Ext'
				),
				array( 
					'value' => 'droid-serif',
					'label' => 'Droid Serif, Latin'
				),
				array( 
					'value' => 'source-sans-pro',
					'label' => 'Source Sans Pro, Latin-Ext'
				),
				array( 
					'value' => 'lato',
					'label' => 'Lato, Latin'
				),
				array( 
					'value' => 'raleway',
					'label' => 'Raleway, Latin'
				),
				array( 
					'value' => 'ubuntu',
					'label' => 'Ubuntu, Latin-Ext'
				),
				array( 
					'value' => 'ubuntu-cyr',
					'label' => 'Ubuntu, Latin / Cyrillic-Ext'
				),
				array( 
					'value' => 'roboto',
					'label' => 'Roboto, Latin-Ext'
				),
				array( 
					'value' => 'roboto-cyr',
					'label' => 'Roboto, Latin / Cyrillic-Ext'
				),
				array( 
					'value' => 'roboto-condensed',
					'label' => 'Roboto Condensed, Latin-Ext'
				),
				array( 
					'value' => 'roboto-condensed-cyr',
					'label' => 'Roboto Condensed, Latin / Cyrillic-Ext'
				),
				array( 
					'value' => 'roboto-slab',
					'label' => 'Roboto Slab, Latin-Ext'
				),
				array( 
					'value' => 'roboto-slab-cyr',
					'label' => 'Roboto Slab, Latin / Cyrillic-Ext'
				),
				array( 
					'value' => 'playfair-display',
					'label' => 'Playfair Display, Latin-Ext'
				),
				array( 
					'value' => 'playfair-display-cyr',
					'label' => 'Playfair Display, Latin / Cyrillic'
				),
				array( 
					'value' => 'open-sans',
					'label' => 'Open Sans, Latin-Ext'
				),
				array( 
					'value' => 'open-sans-cyr',
					'label' => 'Open Sans, Latin / Cyrillic-Ext'
				),
				array( 
					'value' => 'pt-serif',
					'label' => 'PT Serif, Latin-Ext'
				),
				array( 
					'value' => 'pt-serif-cyr',
					'label' => 'PT Serif, Latin / Cyrillic-Ext'
				),
				array( 
					'value' => 'arial',
					'label' => 'Arial'
				),
				array( 
					'value' => 'georgia',
					'label' => 'Georgia'
				),
				array( 
					'value' => 'verdana',
					'label' => 'Verdana'
				),
				array( 
					'value' => 'tahoma',
					'label' => 'Tahoma'
				)
			)
		),
		// Styling: Container Width
		array(
			'id'			=> 'container-width',
			'label'			=> esc_html__( 'Website Max-width', 'blogline' ),
			'desc'			=> esc_html__( 'Max-width of the container. Note: Set it to 1120 for default 620px content.', 'blogline' ),
			'std'			=> '1120',
			'type'			=> 'numeric-slider',
			'section'		=> 'styling',
			'min_max_step'	=> '1024,1600,1'
		),
		// Styling: Primary Color
		array(
			'id'		=> 'color-1',
			'label'		=> esc_html__( 'Primary Color', 'blogline' ),
			'std'		=> '#55acee',
			'type'		=> 'colorpicker',
			'section'	=> 'styling',
			'class'		=> ''
		),
		// Styling: Image Border Radius
		array(
			'id'			=> 'image-border-radius',
			'label'			=> esc_html__( 'Image Border Radius', 'blogline' ),
			'desc'			=> esc_html__( 'Give your thumbnails and layout images rounded corners', 'blogline' ),
			'std'			=> '3',
			'type'			=> 'numeric-slider',
			'section'		=> 'styling',
			'min_max_step'	=> '0,15,1'
		),
		// Styling: Body Background
		array(
			'id'		=> 'body-background',
			'label'		=> esc_html__( 'Body Background', 'blogline' ),
			'desc'		=> esc_html__( 'Set background color and/or upload your own background image', 'blogline' ),
			'type'		=> 'background',
			'section'	=> 'styling'
		)
	)
);

/*  Settings are not the same? Update the DB
/* ------------------------------------ */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings ); 
	} 
}
