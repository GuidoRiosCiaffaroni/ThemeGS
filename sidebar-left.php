<?php
/**
 * El sidebar izquierdo colapsado hacia el borde.
 *
 * @package System
 */
?>

<div class="mb-3 text-start">
    <button class="btn btn-cyber-toggle w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLeftSidebar" aria-expanded="true" aria-controls="collapseLeftSidebar">
        [ &lt; IZQ ]
    </button>
</div>

<aside id="collapseLeftSidebar" class="collapse show widget-area system-sidebar mb-4">
    <?php 
    if ( is_active_sidebar( 'sidebar-left' ) ) {
        dynamic_sidebar( 'sidebar-left' );
    } else {
        echo '<p class="text-muted small m-0">[ Sidebar Izq Vacío ]</p>';
    }
    ?>
</aside>