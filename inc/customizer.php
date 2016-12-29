<?php
/**
 * Himalayas Theme Customizer
 *
 * @package ThemeGrill
 * @subpackage Himalayas
 * @since Himalayas 1.0
 */
function himalayas_customize_register($wp_customize) {

	// Start of the Header Options
   $wp_customize->add_panel('himalayas_header_options', array(
	  'capabitity' => 'edit_theme_options',
	  'description' => __('Contain all the Header related options', 'himalayas'),
	  'priority' => 300,
	  'title' => __('Himalayas Header Options', 'himalayas')
   ));

   // Sticky Option
	$wp_customize->add_section('himalayas_sticky_section', array(
		'priority' => 310,
	  'title' => __('Header Sticky/non-sticky', 'himalayas'),
	  'description' => __('Header is sticky by default.', 'himalayas'),
	  'panel' => 'himalayas_header_options'
   ));

	$wp_customize->add_setting('himalayas_sticky_on_off',	array(
		'default' => 0,
	  'capability' => 'edit_theme_options',
		'sanitize_callback' => 'himalayas_sanitize_checkbox'
	));
	$wp_customize->add_control('himalayas_sticky_on_off',	array(
		'type' => 'checkbox',
		'label' => __('Check to make header non-sticky', 'himalayas' ),
		'section' => 'himalayas_sticky_section'
	));

	// Header non-transparent Option
	$wp_customize->add_section('himalayas_transparent_section', array(
		'priority' => 315,
	  'title' => __('Header Transparency', 'himalayas'),
	  'description' => __('By default Header is transparent when slider is used.', 'himalayas'),
	  'panel' => 'himalayas_header_options'
   ));

	$wp_customize->add_setting('himalayas_trans_off',	array(
		'default' => 0,
	  'capability' => 'edit_theme_options',
		'sanitize_callback' => 'himalayas_sanitize_checkbox'
	));
	$wp_customize->add_control('himalayas_trans_off',	array(
		'type' => 'checkbox',
		'label' => __('Make header non transparent.', 'himalayas' ),
		'section' => 'himalayas_transparent_section'
	));

   // Logo Option
	$wp_customize->add_section('himalayas_header_title_logo', array(
		'title'     => __( 'Header Title/Tagline and Logo', 'himalayas' ),
		'priority'  => 320,
		'panel' => 'himalayas_header_options'
	));

	if ( ! function_exists('the_custom_logo') ) {
		$wp_customize->add_setting('himalayas_logo', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'himalayas_sanitize_url',
			'sanitize_js_callback' => 'himalayas_sanitize_js_url'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'himalayas_logo', array(
				'label' 		=> __( 'Header Logo Image Upload', 'himalayas' ),
				'section' 	=> 'himalayas_header_title_logo',
				'description' => sprintf(__( '%sInfo:%s This option will be removed in upcoming update. Please go to Site Identity section to upload the theme logo.', 'himalayas'  ), '<strong>', '</strong>'),
				'settings' 	=> 'himalayas_logo'
			))
		);
	}

	$wp_customize->add_setting('himalayas_header_logo_placement', array(
	  'default' => 'header_text_only',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'himalayas_radio_sanitize'
   ));
   $wp_customize->add_control('himalayas_header_logo_placement', array(
	  'type' => 'radio',
	  'label' => __('Choose the required option', 'himalayas'),
	  'section' => 'himalayas_header_title_logo',
	  'choices' => array(
		 'header_logo_only' => __('Header Logo Only', 'himalayas'),
		 'header_text_only' => __('Header Text Only', 'himalayas'),
		 'show_both' => __('Show Both', 'himalayas'),
		 'disable' => __('Disable', 'himalayas')
	  )
   ));

   // Media Section
	$wp_customize->add_section(
		'himalayas_header_media',
		array(
			'priority'   => 325,
			'title'      => esc_html__( 'Header Media Position', 'himalayas' ),
			'panel'      => 'himalayas_header_options'
		)
	);

	// Header Media Placement
	$wp_customize->add_setting(
		'himalayas_header_media_placement',
		array(
			'default'            => 'header_media_blow_main_menu',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'himalayas_radio_sanitize'
		)
	);

	$wp_customize->add_control(
		'himalayas_header_media_placement',
		array(
			'label'    => esc_html__( 'Choose the required option', 'himalayas' ),
			'description'    => esc_html__( 'Info: Please make header non-sticky to display the Header Media just above the Site Title/Text.', 'himalayas' ),
			'section'  => 'himalayas_header_media',
			'type'     => 'radio',
			'choices'  => array(
				'header_media_above_site_title' => esc_html__( 'Position One: Display Header Media just above the site Title/Text', 'himalayas' ),
				'header_media_blow_main_menu' => esc_html__( 'Postion Two: Dispaly Header Media just below the Main/Primary Menu', 'himalayas' ),
			)
		)
	);

	// End of the Header Options

 /**************************************************************************************/

	// Start of the Slider Options
   $wp_customize->add_panel('himalayas_slider_options', array(
	'priority'  => 400,
	  'capabitity' => 'edit_theme_options',
	  'description' => __('Contain all the slider related options', 'himalayas'),
	  'title' => __('Himalayas Slider Options', 'himalayas')
   ));

   // Slider Section
	$wp_customize->add_section( 'himalayas_slider', array(
		'title'     => __( 'Slider Settings', 'himalayas' ),
		'priority'  => 410,
		'description' => '<strong>'.__( 'Note', 'himalayas').'</strong><br/>'.__( '1. To display the Slider first check Enable the slider below. Now create the page for each slider and enter title, text and featured image. Choose that pages in the dropdown options.', 'himalayas').'<br/>'.__( '2. The recommended size for the slider image is 1600 x 780 pixels. For better functioning of slider use equal size images for each slide.', 'himalayas' ).'<br/>'.__( '3. If page do not have featured Image than that page will not included in slider show.', 'himalayas' ),
	  'panel' => 'himalayas_slider_options'
	));

	// Enable or Disable the Slider
	$wp_customize->add_setting('himalayas_slide_on_off', array(
		'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'himalayas_sanitize_checkbox'
	));
	$wp_customize->add_control('himalayas_slide_on_off', array(
		'label' => __( 'Enable the slider', 'himalayas' ),
		'section' => 'himalayas_slider',
		'type'	=> 'checkbox',
		'priority' => 6
	));

   // Slider Page Select
   for( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('himalayas_slide'.$i, array(
			'default' => '',
		  'capability' => 'edit_theme_options',
		  'sanitize_callback' => 'himalayas_sanitize_integer'
		));
		$wp_customize->add_control('himalayas_slide'.$i, array(
			'label' => __( 'Slider', 'himalayas' ).$i,
			'section' => 'himalayas_slider',
			'type'	=> 'dropdown-pages',
			'priority'  => $i*20+1
		));
	}
	// End of the Slider Options

 /**************************************************************************************/

	// Start of the Design Options
   $wp_customize->add_panel('himalayas_design_options', array(
	'priority'  => 500,
	  'capabitity' => 'edit_theme_options',
	  'description' => __('Contain all the Design related options', 'himalayas'),
	  'title' => __('Himalayas Design Options', 'himalayas')
   ));

   class HIMALAYAS_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {

			if ( empty( $this->choices ) )
				return;

			$name = '_customize-radio-' . $this->id;

			?>
			<style>
				#himalayas-img-container .himalayas-radio-img-img {
					border: 3px solid #DEDEDE;
					margin: 0 5px 5px 0;
					cursor: pointer;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}
				#himalayas-img-container .himalayas-radio-img-selected {
					border: 3px solid #AAA;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}
				input[type=checkbox]:before {
					content: '';
					margin: -3px 0 0 -4px;
				}
			</style>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<ul class="controls" id = 'himalayas-img-container'>
			<?php
				foreach ( $this->choices as $value => $label ) :
					$class = ($this->value() == $value)?'himalayas-radio-img-selected himalayas-radio-img-img':'himalayas-radio-img-img';
					?>
					<li style="display: inline;">
					<label>
						<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
						<img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo $class; ?>' />
					</label>
					</li>
					<?php
				endforeach;
			?>
			</ul>
			<script type="text/javascript">

				jQuery(document).ready(function($) {
					$('.controls#himalayas-img-container li img').click(function(){
						$('.controls#himalayas-img-container li').each(function(){
							$(this).find('img').removeClass ('himalayas-radio-img-selected') ;
						});
						$(this).addClass ('himalayas-radio-img-selected') ;
					});
				});

			</script>
			<?php
		}
	}

	// default layout setting
	$wp_customize->add_section('himalayas_default_layout_setting', array(
		'priority' => 520,
		'title' => __('Default layout', 'himalayas'),
		'panel'=> 'himalayas_design_options'
	));

	$wp_customize->add_setting('himalayas_default_layout', array(
		'default' => 'right_sidebar',
	  'capability' => 'edit_theme_options',
		'sanitize_callback' => 'himalayas_radio_sanitize'
	));
	$wp_customize->add_control(
		new HIMALAYAS_Image_Radio_Control($wp_customize, 'himalayas_default_layout', array(
			'type' => 'radio',
			'label' => __('Select default layout. This layout will be reflected in whole site archives, categories, search page etc. The layout for a single post and page can be controlled from below options', 'himalayas'),
			'section' => 'himalayas_default_layout_setting',
			'settings' => 'himalayas_default_layout',
			'choices' => array(
				'right_sidebar' => HIMALAYAS_ADMIN_IMAGES_URL . '/right-sidebar.png',
				'left_sidebar' => HIMALAYAS_ADMIN_IMAGES_URL . '/left-sidebar.png',
				'no_sidebar_full_width'	=> HIMALAYAS_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered'	=> HIMALAYAS_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
			)
		))
	);

	// default layout for pages
	$wp_customize->add_section('himalayas_default_page_layout_setting', array(
		'priority' => 521,
		'title' => __('Default layout for pages only', 'himalayas'),
		'panel'=> 'himalayas_design_options'
	));

	$wp_customize->add_setting('himalayas_default_page_layout', array(
		'default' => 'right_sidebar',
	  'capability' => 'edit_theme_options',
		'sanitize_callback' => 'himalayas_radio_sanitize'
	));
	$wp_customize->add_control(
		new HIMALAYAS_Image_Radio_Control($wp_customize, 'himalayas_default_page_layout', array(
			'type' => 'radio',
			'label' => __('Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page', 'himalayas'),
			'section' => 'himalayas_default_page_layout_setting',
			'settings' => 'himalayas_default_page_layout',
			'choices' => array(
				'right_sidebar' => HIMALAYAS_ADMIN_IMAGES_URL . '/right-sidebar.png',
				'left_sidebar' => HIMALAYAS_ADMIN_IMAGES_URL . '/left-sidebar.png',
				'no_sidebar_full_width'	=> HIMALAYAS_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered'	=> HIMALAYAS_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
			)
		))
	);

	// default layout for single posts
	$wp_customize->add_section('himalayas_default_single_posts_layout_setting', array(
		'priority' => 522,
		'title' => __('Default layout for single posts only', 'himalayas'),
		'panel'=> 'himalayas_design_options'
	));

	$wp_customize->add_setting('himalayas_default_single_posts_layout', array(
		'default' => 'right_sidebar',
	  'capability' => 'edit_theme_options',
		'sanitize_callback' => 'himalayas_radio_sanitize'
	));
	$wp_customize->add_control(
		new HIMALAYAS_Image_Radio_Control($wp_customize, 'himalayas_default_single_posts_layout', array(
			'type' => 'radio',
			'label' => __('Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post', 'himalayas'),
			'section' => 'himalayas_default_single_posts_layout_setting',
			'settings' => 'himalayas_default_single_posts_layout',
			'choices' => array(
				'right_sidebar' => HIMALAYAS_ADMIN_IMAGES_URL . '/right-sidebar.png',
				'left_sidebar' => HIMALAYAS_ADMIN_IMAGES_URL . '/left-sidebar.png',
				'no_sidebar_full_width'	=> HIMALAYAS_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered'	=> HIMALAYAS_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
			)
		))
	);

	// primary color options
   $wp_customize->add_section('himalayas_primary_color_setting', array(
	  'panel' => 'himalayas_design_options',
	  'priority' => 530,
	  'title' => __('Primary color option', 'himalayas')
   ));

   $wp_customize->add_setting('himalayas_primary_color', array(
	  'default' => '#32c4d1',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'himalayas_color_option_hex_sanitize',
	  'sanitize_js_callback' => 'himalayas_color_escaping_option_sanitize'
   ));

   $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'himalayas_primary_color', array(
	  'label' => __('This will reflect in links, buttons and many others. Choose a color to match your site', 'himalayas'),
	  'section' => 'himalayas_primary_color_setting',
	  'settings' => 'himalayas_primary_color'
   )));

   // Footer Layout
	$wp_customize->add_section('himalayas_footer_layout_setting', array(
		'priority' => 540,
		'title' => __('Footer Layout Options', 'himalayas'),
		'panel'=> 'himalayas_design_options'
	));

	$wp_customize->add_setting('himalayas_footer_layout', array(
		'default' => 'footer-layout-one',
	  'capability' => 'edit_theme_options',
		'sanitize_callback' => 'himalayas_radio_sanitize'
	));
	$wp_customize->add_control('himalayas_footer_layout', array(
		'type' => 'radio',
		'label' => __('Select the Footer Layout', 'himalayas'),
		'section' => 'himalayas_footer_layout_setting',
		'settings' => 'himalayas_footer_layout',
		'choices' => array(
			'footer-layout-one' => __('Choose Footer Layout One', 'himalayas'),
			'footer-layout-two' => __('Choose Footer Layout Two', 'himalayas')
		)
	));

	// Custom CSS setting
	if ( ! function_exists( 'wp_update_custom_css_post' ) ) {
	    class HIMALAYAS_Custom_CSS_Control extends WP_Customize_Control {

			public $type = 'custom_css';

			public function render_content() {
			?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				</label>
				<?php
			}
		}

		$wp_customize->add_section('himalayas_custom_css_setting', array(
			'priority' => 550,
			'title' => __('Custom CSS', 'himalayas'),
			'panel' => 'himalayas_design_options'
		));

		$wp_customize->add_setting('himalayas_custom_css', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		));
		$wp_customize->add_control(
			new HIMALAYAS_Custom_CSS_Control($wp_customize, 'himalayas_custom_css', array(
				'label' => __('Write your Custom CSS', 'himalayas'),
				'section' => 'himalayas_custom_css_setting',
				'settings' => 'himalayas_custom_css'
			))
		);
	}
   // End of the Design Options

 /**************************************************************************************/

	// Start of the Additional Options
   $wp_customize->add_panel('himalayas_additional_options', array(
	  'capabitity' => 'edit_theme_options',
	  'description' => __('Contain additional options', 'himalayas'),
	  'priority' => 600,
	  'title' => __('Himalayas Additional Options', 'himalayas')
   ));

   // FrontPage setting
	$wp_customize->add_section('himalayas_blog_on_front', array(
		'priority'  => 605,
	  'title' => __('Hide Blog posts from the front page', 'himalayas'),
	  'panel' => 'himalayas_additional_options'
   ));

	$wp_customize->add_setting('himalayas_hide_blog_front',	array(
		'default' => 0,
	  'capability' => 'edit_theme_options',
		'sanitize_callback' => 'himalayas_sanitize_checkbox'
	));
	$wp_customize->add_control('himalayas_hide_blog_front',	array(
		'type' => 'checkbox',
		'label' => __('Check to hide blog posts/static page on front page', 'himalayas' ),
		'section' => 'himalayas_blog_on_front'
	));

   // Excerpts or Full Posts setting
	$wp_customize->add_section('himalayas_content_setting', array(
		'priority' => 610,
		'title' => __('Excerpts or Full Posts option', 'himalayas'),
		'panel'=> 'himalayas_additional_options'
	));

	$wp_customize->add_setting('himalayas_content_show', array(
		'default' => 'show_full_post_content',
	  'capability' => 'edit_theme_options',
		'sanitize_callback' => 'himalayas_radio_sanitize'
	));
	$wp_customize->add_control('himalayas_content_show', array(
		'type' => 'radio',
		'label' => __('Toggle between displaying excerpts and full posts on your blog and archives.', 'himalayas'),
		'section' => 'himalayas_content_setting',
		'settings' => 'himalayas_content_show',
		'choices' => array(
			'show_full_post_content' => __('Show full post content', 'himalayas'),
			'show_excerpt' => __('Show excerpt', 'himalayas')
		)
	));
	// End of the Additional Options

	// Theme important links started
   class HIMALAYAS_Important_Links extends WP_Customize_Control {

	  public $type = "himalayas-important-links";

	  public function render_content() {
		 //Add Theme instruction, Support Forum, Demo Link, Rating Link
		 $important_links = array(
			'view-pro' => array(
			   'link' => esc_url('http://themegrill.com/themes/himalayas-pro/'),
			   'text' => __('View Pro', 'himalayas'),
			),
			'theme-info' => array(
               'link' => esc_url('http://themegrill.com/themes/himalayas/'),
               'text' => esc_html__('Theme Info', 'himalayas'),
            ),
			'support' => array(
			   'link' => esc_url('http://themegrill.com/support-forum/'),
			   'text' => __('Support Forum', 'himalayas'),
			),
			'documentation' => array(
			   'link' => esc_url('http://docs.themegrill.com/himalayas/'),
			   'text' => __('Documentation', 'himalayas'),
			),
			'demo' => array(
			   'link' => esc_url('http://demo.themegrill.com/himalayas/'),
			   'text' => __('View Demo', 'himalayas'),
			),
			'rating' => array(
			   'link' => esc_url('http://wordpress.org/support/view/theme-reviews/himalayas?filter=5'),
			   'text' => __('Rate this theme', 'himalayas'),
			),
		 );
		 foreach ($important_links as $important_link) {
			echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
		 }
	  }

   }

   $wp_customize->add_section('himalayas_important_links', array(
	  'priority' => 1,
	  'title' => __('Himalayas Important Links', 'himalayas'),
   ));

   /**
	* This setting has the dummy Sanitizaition function as it contains no value to be sanitized
	*/
   $wp_customize->add_setting('himalayas_important_links', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'himalayas_links_sanitize'
   ));

   $wp_customize->add_control(new HIMALAYAS_Important_Links($wp_customize, 'important_links', array(
	  'label' => __('Important Links', 'himalayas'),
	  'section' => 'himalayas_important_links',
	  'settings' => 'himalayas_important_links'
   )));
   // Theme Important Links Ended

 /**************************************************************************************/

	function himalayas_sanitize_checkbox($input) {
	  if ( $input == 1 ) {
		 return 1;
	  } else {
		 return '';
	  }
   }
   function himalayas_sanitize_url( $input ) {
		$input = esc_url_raw( $input );
		return $input;
	}
	function himalayas_sanitize_js_url ( $input ) {
		$input = esc_url( $input );
		return $input;
	}
	function himalayas_sanitize_integer( $input ) {
		if( is_numeric( $input ) ) {
		return intval( $input );
	}
	}
   // color sanitization
   function himalayas_color_option_hex_sanitize($color) {
	  if ($unhashed = sanitize_hex_color_no_hash($color))
		 return '#' . $unhashed;

	  return $color;
   }

   function himalayas_color_escaping_option_sanitize($input) {
	  $input = esc_attr($input);
	  return $input;
   }
   function himalayas_radio_sanitize( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	// sanitization of links
   function himalayas_links_sanitize() {
	  return false;
   }
}
add_action('customize_register', 'himalayas_customize_register');

/*****************************************************************************************/

/*
 * Custom Scripts
 */
add_action( 'customize_controls_print_footer_scripts', 'himalayas_customizer_custom_scripts' );

function himalayas_customizer_custom_scripts() { ?>
<style>
	/* Theme Instructions Panel CSS */
	li#accordion-section-himalayas_important_links h3.accordion-section-title, li#accordion-section-himalayas_important_links h3.accordion-section-title:focus { background-color: #32C4D1 !important; color: #fff !important; }
	li#accordion-section-himalayas_important_links h3.accordion-section-title:hover { background-color: #32C4D1 !important; color: #fff !important; }
	li#accordion-section-himalayas_important_links h3.accordion-section-title:after { color: #fff !important; }
	/* Upsell button CSS */
	.customize-control-himalayas-important-links a {
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#8fc800+0,8fc800+100;Green+Flat+%232 */
		background: #008EC2;
		color: #fff;
		display: block;
		margin: 15px 0 0;
		padding: 5px 0;
		text-align: center;
		font-weight: 600;
	}

	.customize-control-himalayas-important-links a{
		padding: 8px 0;
	}

	.customize-control-himalayas-important-links a:hover {
		color: #ffffff;
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#006e2e+0,006e2e+100;Green+Flat+%233 */
		background:#2380BA;
	}
</style>
<?php
}
