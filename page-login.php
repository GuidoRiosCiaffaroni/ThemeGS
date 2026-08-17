<?php
/**
 * Template Name: System Dual Page with Edge Sidebars
 *
 * @package System
 */

get_header(); 

if ( is_user_logged_in() ) :
    ?>
    <div class="col-lg-3">
        <?php get_sidebar('left'); ?>
    </div>
    <?php
endif;

$main_classes = is_user_logged_in() ? 'col-lg-6' : 'col-lg-12';
?>

<main id="primary" class="site-main <?php echo esc_attr( $main_classes ); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header text-center mb-4">
            <h2 style="font-family: 'Orbitron', sans-serif; letter-spacing: 2px; color: var(--sys-primary);" class="h4"><?php the_title(); ?></h2>
        </header>

        <div class="entry-content">
            <?php
            if ( is_user_logged_in() ) {
                $current_user = wp_get_current_user();
                echo '<div class="text-center p-4" style="background: var(--sys-surface); border: 1px solid var(--sys-border); box-shadow: inset 0 0 20px var(--sys-surface-glow);">';
                echo '<p style="color: var(--sys-primary);" class="mb-3">' . sprintf( esc_html__( 'AUTORIZADO: %s', 'system' ), esc_html( strtoupper($current_user->display_name) ) ) . '</p>';
                echo '<a href="' . esc_url( wp_logout_url( home_url() ) ) . '" class="btn btn-outline-warning text-uppercase font-monospace px-4 py-2" style="border-color: var(--sys-primary); color: var(--sys-primary);">' . esc_html__( 'DESCONECTAR', 'system' ) . '</a>';
                echo '</div>';
            } else {
                $args = array(
                    'redirect'       => home_url(),
                    'form_id'        => 'loginform-system',
                    'label_username' => __( 'Identificador de Usuario', 'system' ),
                    'label_password' => __( 'Clave de Acceso', 'system' ),
                    'label_remember' => __( 'Mantener enlace activo', 'system' ),
                    'label_log_in'   => __( 'ESTABLECER CONEXIÓN', 'system' ),
                    'remember'       => true,
                );
                wp_login_form( $args );
            }
            ?>
        </div>
    </article>
</main>

<?php 
if ( is_user_logged_in() ) :
    ?>
    <div class="col-lg-3">
        <?php get_sidebar('right'); ?>
    </div>
    <?php
endif;

get_footer();