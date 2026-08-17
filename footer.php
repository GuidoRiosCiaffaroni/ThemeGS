<?php
/**
 * El footer actualizado con script de expansión dinámica del contenido central.
 *
 * @package System
 */
?>
    </div><!-- .row -->
</div><!-- .container-fluid-custom -->

<footer id="colophon" class="site-footer container-fluid py-4 mt-5">
    <div class="site-info text-center">
        &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> // DYNAMIC_EDGE_EXPANSION_ACTIVE //
    </div>
</footer>

<?php wp_footer(); ?>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const leftSidebar = document.getElementById('collapseLeftSidebar');
    const rightSidebar = document.getElementById('collapseRightSidebar');
    const mainContent = document.getElementById('primary');

    if (!mainContent) return;

    function updateMainLayout() {
        let leftVisible = leftSidebar ? leftSidebar.classList.contains('show') : false;
        let rightVisible = rightSidebar ? rightSidebar.classList.contains('show') : false;

        // Remover clases previas de Bootstrap de ancho
        mainContent.className = mainContent.className.replace(/\bcol-lg-\d+\b/g, '');

        // Lógica de asignación de columnas según qué sidebars estén activos/visibles
        if (leftVisible && rightVisible) {
            mainContent.classList.add('col-lg-6'); // 3 izq + 6 centro + 3 der
        } else if (leftVisible || rightVisible) {
            mainContent.classList.add('col-lg-9'); // 3 lateral + 9 centro
        } else {
            mainContent.classList.add('col-lg-12'); // Centro expandido al 100%
        }
    }

    // Escuchar eventos de Bootstrap collapse
    const collapsibles = document.querySelectorAll('.collapse');
    collapsibles.forEach(function (el) {
        el.addEventListener('shown.bs.collapse', updateMainLayout);
        el.addEventListener('hidden.bs.collapse', updateMainLayout);
    });

    // Ejecutar al cargar la página
    updateMainLayout();
});
</script>
</body>
</html>