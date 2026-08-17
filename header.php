<?php
/**
 * El header optimizado para bordes extendidos
 *
 * @package System
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header container-fluid py-4">
    <div class="site-branding">
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
        $system_description = get_bloginfo( 'description', 'display' );
        if ( $system_description || is_customize_preview() ) :
            ?>
            <p class="site-description"><?php echo esc_html( $system_description ); ?></p>
        <?php endif; ?>
    </div>
</header>

<div class="container-fluid-custom site-content-layout my-4">
    <div class="row g-4">