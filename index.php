<?php
/**
 * La plantilla principal de respaldo (Index)
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
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'site-article mb-4 p-4' ); ?> style="background: var(--sys-surface); border: 1px solid var(--sys-border);">
                <header class="entry-header mb-3">
                    <h2 style="font-family: 'Orbitron', sans-serif; font-size: 1.4rem;" class="h5"><a href="<?php the_permalink(); ?>" class="text-decoration-none"><?php the_title(); ?></a></h2>
                </header>

                <div class="entry-content" style="color: var(--sys-text);">
                    <?php 
                    if ( is_singular() ) {
                        the_content();
                    } else {
                        the_excerpt();
                    }
                    ?>
                </div>
            </article>
            <?php
        endwhile;

        the_posts_navigation();

    else :
        ?>
        <p style="color: var(--sys-text-dim);" class="text-center"><?php esc_html_e( '// ERROR: 404_NO_DATA_FOUND //', 'system' ); ?></p>
        <?php
    endif;
    ?>
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