<?php
/**
 * El sidebar derecho colapsado hacia el borde.
 *
 * @package System
 */
?>

<div class="mb-3 text-end">
    <button class="btn btn-cyber-toggle w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRightSidebar" aria-expanded="true" aria-controls="collapseRightSidebar">
        [ DER &gt; ]
    </button>
</div>

<aside id="collapseRightSidebar" class="collapse show widget-area system-sidebar mb-4">
    <?php 
    if ( is_active_sidebar( 'sidebar-right' ) ) {
        dynamic_sidebar( 'sidebar-right' );
    } else {
        echo '<p class="text-muted small m-0">[ Sidebar Der Vacío ]</p>';
    }
    ?>
</aside>