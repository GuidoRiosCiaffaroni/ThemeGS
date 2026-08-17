<?php
/**
 * Funciones y definiciones del tema System Cyber v3.3 (Sidebars Colapsables)
 *
 * @package System
 */

if ( ! defined( 'SYSTEM_VERSION' ) ) {
    define( 'SYSTEM_VERSION', '3.3.0' );
}

function system_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'system_setup' );

function system_scripts() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3' );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true );
    wp_enqueue_style( 'system-style', get_stylesheet_uri(), array('bootstrap-css'), SYSTEM_VERSION );
}
add_action( 'wp_enqueue_scripts', 'system_scripts' );

function system_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar Izquierdo', 'system' ),
        'id'            => 'sidebar-left',
        'description'   => __( 'Añade widgets para la barra lateral izquierda colapsable.', 'system' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title h6">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar Derecho', 'system' ),
        'id'            => 'sidebar-right',
        'description'   => __( 'Añade widgets para la barra lateral derecha colapsable.', 'system' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title h6">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'system_widgets_init' );

function system_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'system_color_scheme_section', array(
        'title'    => __( 'Esquema de Color del Sistema', 'system' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'system_color_scheme', array(
        'default'           => 'cyber-yellow',
        'sanitize_callback' => 'sanitize_key',
    ) );

    $wp_customize->add_control( 'system_color_scheme', array(
        'label'    => __( 'Seleccionar Estilo Visual', 'system' ),
        'section'  => 'system_color_scheme_section',
        'type'     => 'select',
        'choices'  => array(
            'cyber-yellow' => __( 'Negro y Amarillo (Cyberpunk)', 'system' ),
            'grayscale'    => __( 'Blanco y Negro (Escala de Grises Pura)', 'system' ),
        ),
    ) );
}
add_action( 'customize_register', 'system_customize_register' );

function system_body_classes( $classes ) {
    $scheme = get_theme_mod( 'system_color_scheme', 'cyber-yellow' );
    $classes[] = 'theme-' . $scheme;
    return $classes;
}
add_filter( 'body_class', 'system_body_classes' );