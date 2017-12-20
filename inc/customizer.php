<?php
/**
 * amora Theme Customizer
 *
 * @package amora
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amora_customize_register( $wp_customize ) {
		
	$wp_customize->get_section( 'colors' )->description	= __( 'Background may only be visible on wide screens.', 'amora' );
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'header_textcolor' )->label		= 'Site Description Color';
	$wp_customize->get_control( 'header_textcolor' )->priority	= 10; 
	
	$wp_customize->add_setting('title_color', array(
		'default'		=>	'#ffffff',
		'sanitize_callback'	=>	'sanitize_hex_color',
		'transport'		=>	'postMessage',
		)
	); 
		
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize, 'title_color', array(
			'label'		=> 'Site Title Color',
			'section'	=> 'colors',
			'settings'	=> 'title_color',
			'priority'	=> 1
			)
		)
	);
	
	$wp_customize-> add_section(
	'layout_grid',
	array(
		'title'	=> 'Layout Settings',
		'priority' => 1
		)
	);
	
	$wp_customize->add_setting(
    'layout_option',
    array(
        'default' => '2',
        'sanitize_callback'	=> 'amora_sanitize_radio',
        )
    );
 
	$wp_customize->add_control(
	    'layout_option',
	    array(
	        'type' 	=> 'radio',
	        'label' => 'Select a Layout',
	        'section' => 'layout_grid',
	        'default'	=> '1',
	        'choices' => array(
	            '3' => '2 Column Layout',
	            '2' => '3 Column Layout',
	            '1' => '4 Column layout',
	        )
	    )
	);
	
	$wp_customize-> add_setting(
	'page_layout',
	array(
		'default'	=> 'left',
		'sanitize_callback'	=> 'amora_sanitize_select',
		)
	);
	
	$wp_customize->add_control(
    'page_layout',
    array(
        'type' => 'select',
        'label' => 'Sidebar Layout',
        'section' => 'layout_grid',
        'choices' => array(
            'left' => 'Left Sidebar',
            'right' => 'Right Sidebar',
             ),
         )
    );
    
    $wp_customize-> add_setting('logo');
    
    $wp_customize-> add_control(
	new WP_Customize_Image_Control(
        $wp_customize,
        'logo',
        array(
            'label' => __('OR Logo Upload', 'amora'),
            'section' => 'title_tagline',
            'settings' => 'logo'
            )
        )
    );
    
    $wp_customize-> add_section(
    'amora_social',
    array(
    	'title'			=> __('Social Settings','amora'),
    	'description'	=> __('Manage the Social Icon Settings of your site.','amora'),
    	'priority'		=> 3,
    	)
    );
    
    $wp_customize-> add_setting(
    'social',
    array(
    	'sanitize_callback'	=> 'amora_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'social',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Enable Social Icons','amora'),
    	'section'	=> 'amora_social',
    	'priority'	=> 1,
    	)
    );
    
    $wp_customize->add_setting(
    'iconset',
    array(
        'default' => 'def',
        'sanitize_callback'	=> 'amora_sanitize_list',
        )
    );
 
	$wp_customize->add_control(
	    'iconset',
	    array(
	        'type' => 'select',
	        'label' => 'Choose the iconset:',
	        'section' => 'amora_social',
	        'priority'=> 2,
	        'choices' => array(
	            'def' => 'Default',
	            'soshion' => 'Soshions',
	            'glossy' => 'Glossy',
	        )
	    )
	);


    $wp_customize-> add_setting(
    'facebook',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'facebook',
    array(
    	'label'		=> __('Facebook URL','amora'),
    	'section'	=> 'amora_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'twitter',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'twitter',
    array(
    	'label'		=> __('Twitter URL','amora'),
    	'section'	=> 'amora_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'google',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'google',
    array(
    	'label'		=> __('Google Plus URL','amora'),
    	'section'	=> 'amora_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'instagram',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'instagram',
    array(
    	'label'		=> __('Instagram URL','amora'),
    	'section'	=> 'amora_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'pinterest',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'pinterest',
    array(
    	'label'		=> __('Pinterest URL','amora'),
    	'section'	=> 'amora_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'rss',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'rss',
    array(
    	'label'		=> __('RSS URL','amora'),
    	'section'	=> 'amora_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'vimeo',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'vimeo',
    array(
    	'label'		=> __('Vimeo URL','amora'),
    	'section'	=> 'amora_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'mail',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'mail',
    array(
    	'label'		=> __('Your E-Mail Info','amora'),
    	'section'	=> 'amora_social',
    	'type'		=> 'text',
    	)
    );
    
   /*
 $wp_customize->add_setting(
    'site_color',
    	array(
	        'default' => '#6669d2',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	
	$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'site_color',
	        array(
	            'label' => 'Site Title Color',
	            'section' => 'color',
	            'settings' => 'site_color',
	        )
	    )
	);
*/
    
    $wp_customize-> add_panel(
    'slider', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Slider Settings', 'amora'),
    'description'    => '',
    ));
    
    $wp_customize-> add_section(
    'slides',
    array(
    	'title'			=> __('Enable Slider','amora'),
    	'priority'		=> 3,
    	'panel'			=> 'slider',
    	)
    );
    
    $wp_customize-> add_setting(
    'slide_enable',
    array(
    	'sanitize_callback'	=> 'amora_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'slide_enable',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Enable Slider','amora'),
    	'section'	=> 'slides',
    	'priority'	=> 1,
    	)
    );
    
    $wp_customize-> add_section(
    'slide-1', array(
    	'title'		=> __('Slide 1', 'amora'),
    	'panel'		=> 'slider',
    	)
    );
    
    $wp_customize->add_setting( 
    'slide_1', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'slide_1',
	        array(
	            'label' => 'Slide Upload',
	            'section' => 'slide-1',
	            'settings' => 'slide_1',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'desc-1', array(
			'sanitize_callback'	=> 'amora_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'desc-1', array(
		'label'		=> __('Description','amora'),
		'section'	=> 'slide-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_section(
    'slide-2', array(
    	'title'		=> __('Slide 2', 'amora'),
    	'panel'		=> 'slider',
    	)
    );
    
	$wp_customize->add_setting( 
    'slide_2', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'slide_2',
	        array(
	            'label' => 'Slide Upload',
	            'section' => 'slide-2',
	            'settings' => 'slide_2',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'desc-2', array(
			'sanitize_callback'	=> 'amora_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'desc-2', array(
		'label'		=> __('Description','amora'),
		'section'	=> 'slide-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_section(
    'slide-3', array(
    	'title'		=> __('Slide 3', 'amora'),
    	'panel'		=> 'slider',
    	)
    );
    
	$wp_customize->add_setting( 
    'slide_3', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'slide_3',
	        array(
	            'label' => 'Slide Upload',
	            'section' => 'slide-3',
	            'settings' => 'slide_3',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'desc-3', array(
			'sanitize_callback'	=> 'amora_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'desc-3', array(
		'label'		=> __('Description','amora'),
		'section'	=> 'slide-3',
		'type'		=> 'text',
		)
	);
    
    function amora_sanitize_text( $t ) {
    return wp_kses_post( force_balance_tags( $t ) );
    }
    
     function amora_sanitize_radio($a) {
		$valid = array(
			'3' => '2 Column Layout',
	        '2' => '3 Column Layout',
	        '1' => '4 Column layout',
	        );
	        
	        if (array_key_exists($a, $valid)) {
		        return $a;
		        } 
		        else {
		        return '';
		        }
	    }
	    
	   function amora_sanitize_select($a) {
		$valid = array(
			'left' => 'Left Sidebar',
	        'right' => 'Right Sidebar',
	        );
	        
	        if (array_key_exists($a, $valid)) {
		        return $a;
		        } 
		        else {
		        return '';
		        }
	    }
	    
    function amora_sanitize_list( $input ) {
    $valid = array(
        'def' => 'Default',
	    'soshion' => 'Soshions',
	    'glossy' => 'Glossy',

    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
        } 
        else {
        return '';
       	 }
     }
     
    function amora_sanitize_checkbox( $i ) {
	    if ( $i == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	if ( $wp_customize->is_preview() ) {
	    add_action( 'wp_footer', 'amora_customize_preview', 21);
	}
	
	function amora_customize_preview() {
    ?>
    <script type="text/javascript">
        ( function( jQuery ) {
            wp.customize('header_textcolor',function( value ) {
                value.bind(function(to) {
                    jQuery('.site-description').css('color', to );
                });
            });
             wp.customize('title_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.site-title a').css('color', to );
                });
            });
        } )( jQuery )
    </script>
    <?php
}  // End function amora_customize_preview()
}
add_action( 'customize_register', 'amora_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amora_customize_preview_js() {
	wp_enqueue_script( 'amora_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'amora_customize_preview_js' );
