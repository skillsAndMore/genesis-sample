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

//* Aggiungo le mie Personalizzazioni
function am_reg_impostazioni( $wp_customize ) {
    $wp_customize->add_section( 'custom_css', array(
      'title' => __( 'CSS Editor' ),
      'description' => __( 'Aggiungi le tue regole CSS.' ),
      'priority' => 160,
    ));

    $wp_customize->add_setting( 'font_size', array(
      'default' => __( '16' ),
    ));

    $wp_customize->add_control( 'font_size', array(
      'label' => __( 'Imposta la grandezza del carattere.' ),
      'section' => 'custom_css',
      'type' => 'number',
        'input_attrs' => array( //Utile per impostare dei limiti
        'min' => 12,
        'max' => 36
      ),
    ));
}
add_action( 'customize_register', 'am_reg_impostazioni' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );
