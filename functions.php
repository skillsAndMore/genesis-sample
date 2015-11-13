<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.2.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

include_once('inc/theme-customizer/theme-customizer-demo.php');

//* Inserisco modifiche breadcrumb
add_action('customize_register', 'breadcrumb_add_gfont' );

function breadcrumb_add_gfont( $wp_customize ){
	require_once dirname(__FILE__) . '/inc/theme-customizer/select/google-font-dropdown-custom-control.php';
	$wp_customize->add_setting( 'google_font_setting', array(
			'default'        => 'Roboto',
	) );
	$wp_customize->add_control( new Google_Font_Dropdown_Custom_Control( $wp_customize, 'google_font_setting', array(
			'label'   => 'Google Font Setting',
			'section' => 'genesis_breadcrumbs',
			'settings'   => 'google_font_setting',
			'type' => 'select',
			'priority' => 1
	) ) );
}

//* Aggiungo il Font Google per le Breadcrumb
function am_inserisco_css()
{
	?>
		<style type="text/css">
			.breadcrumb { font-family: <?php echo get_theme_mod('google_font_setting', 'Arial'); ?>; }
		</style>
	<?php
}
add_action( 'wp_head', 'am_inserisco_css');
