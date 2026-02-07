<div id="layoutSidenav_nav">
    <style>
        /* ===== SIDEBAR HOVER EFFECTS ===== */

.sb-sidenav .nav-link {
    position: relative;
    border-radius: 6px;
    margin: 2px 6px;
    transition: 
        background-color 0.25s ease,
        color 0.25s ease,
        transform 0.15s ease,
        box-shadow 0.25s ease;
}

/* Hover general */
.sb-sidenav .nav-link:hover {
    background: linear-gradient(
        90deg,
        rgba(29, 39, 68, 0.12),
        rgba(29, 39, 68, 0.04)
    );
    color: <?= setting('primary_color') ?? '#1d2744' ?>;
    transform: translateX(4px);
    box-shadow: inset 4px 0 0 <?= setting('primary_color') ?? '#1d2744' ?>;
}

/* Íconos reaccionan */
.sb-sidenav .nav-link:hover .sb-nav-link-icon i {
    transform: scale(1.1);
    color: <?= setting('primary_color') ?? '#1d2744' ?>;
}

/* Transición de iconos */
.sb-nav-link-icon i {
    transition: transform 0.2s ease, color 0.2s ease;
}

/* Submenú (nested) hover */
.sb-sidenav-menu-nested .nav-link {
    padding-left: 2.4rem;
    font-size: 0.92rem;
}

.sb-sidenav-menu-nested .nav-link:hover {
    background-color: rgba(0, 0, 0, 0.04);
    transform: translateX(6px);
    box-shadow: inset 3px 0 0 <?= setting('primary_color') ?? '#1d2744' ?>;
}

/* Link activo */
.sb-sidenav .nav-link.active {
    background: <?= setting('primary_color') ?? '#1d2744' ?>;
    color: #fff !important;
    box-shadow: inset 4px 0 0 rgba(255,255,255,0.35);
}

.sb-sidenav .nav-link.active .sb-nav-link-icon i {
    color: #fff;
}

/* Flecha del collapse */
.sb-sidenav-collapse-arrow i {
    transition: transform 0.25s ease;
}

a.nav-link[aria-expanded="true"] .sb-sidenav-collapse-arrow i {
    transform: rotate(180deg);
}

    </style>
    <span class="close-mobile-nav"><i class="fa-solid fa-close"></i></span>
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">

        <div class="sidebar-user position-relative">

            <!-- Fondo superior con color del sistema -->
            <div
                style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 69px;
            background-color: <?= setting('primary_color') ?? '#1d2744' ?>;
            z-index: -1;
            border-radius: 6px 6px 0 0;
        ">
            </div>

            <a href="<?= base_url('dashboard') ?>" class="text-center d-block pt-3">

                <!-- LOGO EMPRESA -->
                <?php if (setting('logo')): ?>
                    <img class="logo shadow-sm"
                        src="<?= base_url('upload/settings/' . setting('logo')) ?>"
                        alt="logo-company"
                        height="60">
                <?php else: ?>
                    <h5 class="text-white font-weight-bold">
                        <?= esc(setting('company_name') ?? 'Empresa') ?>
                    </h5>
                <?php endif; ?>

                <!-- SUCURSAL -->
                <div class="nav-link text-dark mt-2 p-0">
                    <?= esc($session->get('branch_name') ?? 'N/A') ?>
                </div>

            </a>
        </div>


        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">NAVEGACION</div>

                <a class="nav-link" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                    Inicio
                </a>

                <?php if (
                    tienePermiso('ver_facturas') ||
                    tienePermiso('crear_venta')
                ): ?>

                    <a class="nav-link collapsed" href="#"
                        data-toggle="collapse"
                        data-target="#sellings"
                        aria-expanded="false"
                        aria-controls="sellings">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        Ventas
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="sellings" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            <?php if (tienePermiso('ver_facturas')): ?>
                                <a class="nav-link" href="/invoices">Facturas historicas</a>
                            <?php endif; ?>

                            <?php if (tienePermiso('crear_facturas')): ?>
                                <a class="nav-link" href="/invoices/new">Crear venta</a>
                            <?php endif; ?>

                        </nav>
                    </div>
                <?php endif; ?>

                <?php if (
                    tienePermiso('ver_productos') ||
                    tienePermiso('Inventario_movimientos')
                ): ?>

                    <a class="nav-link collapsed" href="#"
                        data-toggle="collapse"
                        data-target="#inventario"
                        aria-expanded="false"
                        aria-controls="inventario">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-warehouse"></i>
                        </div>
                        Inventario
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="inventario" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            <?php if (tienePermiso('ver_facturas')): ?>
                                <a class="nav-link" href="/invoices">Productos</a>
                            <?php endif; ?>

                            <?php if (tienePermiso('crear_facturas')): ?>
                                <a class="nav-link" href="/invoices/new">Movimientos de inventario</a>
                            <?php endif; ?>

                        </nav>
                    </div>
                <?php endif; ?>

                <?php if (
                    tienePermiso('ver_transacciones') ||
                    tienePermiso('ver_cajas') ||
                    tienePermiso('crear_caja') ||
                    tienePermiso('ver_cuentas')
                ): ?>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cash" aria-expanded="false"
                        aria-controls="cash">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-wallet"></i></div>
                        Finanzas
                        <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="cash" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            <!-- SUBMENÚ CAJAS -->
                            <?php if (
                                tienePermiso('ver_cajas') ||
                                tienePermiso('ver_historicos_de_caja') ||
                                tienePermiso('crear_caja')
                            ): ?>

                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subCajas"
                                    aria-expanded="false" aria-controls="subCajas">
                                    Cajas
                                    <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-down"></i></div>
                                </a>

                                <div class="collapse" id="subCajas" data-parent="#cash">
                                    <nav class="sb-sidenav-menu-nested nav">

                                        <?php if (tienePermiso('ver_cajas')): ?>
                                            <a class="nav-link" href="/cashiers">Lista de Cajas</a>
                                        <?php endif; ?>

                                        <?php if (tienePermiso('crear_caja')): ?>
                                            <a class="nav-link" href="/cashiers/new">Creación de caja</a>
                                        <?php endif; ?>

                                        <?php if (tienePermiso('ver_historicos_de_caja')): ?>
                                            <a class="nav-link" href="/cashier/transactions">Movimientos de caja</a>
                                        <?php endif; ?>
                                    </nav>
                                </div>

                            <?php endif; ?>

                            <?php if (tienePermiso('ver_transacciones')): ?>
                                <a class="nav-link" href="/transactions">Movimientos históricos</a>
                            <?php endif; ?>

                            <?php if (tienePermiso('ver_cuentas')): ?>
                                <a class="nav-link" href="/accounts">Cuentas</a>
                            <?php endif; ?>

                        </nav>
                    </div>
                <?php endif; ?>

                <?php if (
                    tienePermiso('ver_configuracion') ||
                    tienePermiso('ver_sucursales') ||
                    tienePermiso('ver_usuarios') ||
                    tienePermiso('ver_roles')
                ): ?>
                    <div class="sb-sidenav-menu-heading">Ajustes del sistema</div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#company_settings"
                        aria-expanded="false" aria-controls="company_settings">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-cog"></i></div>
                        Ajustes del sistema
                        <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="company_settings"
                        aria-labelledby="headingOne"
                        data-parent="#sidenavAccordion">

                        <nav class="sb-sidenav-menu-nested nav">

                            <?php if (tienePermiso('ver_usuarios') || tienePermiso('ver_roles')): ?>

                                <a class="nav-link collapsed" href="#"
                                    data-toggle="collapse"
                                    data-target="#staffs"
                                    aria-expanded="false"
                                    aria-controls="staffs">
                                    Gestión de usuarios
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                </a>

                                <div class="collapse" id="staffs">
                                    <nav class="sb-sidenav-menu-nested nav">

                                        <?php if (tienePermiso('ver_usuarios')): ?>
                                            <a class="nav-link" href="/users">Lista de usuarios</a>
                                        <?php endif; ?>

                                        <?php if (tienePermiso('ver_roles')): ?>
                                            <a class="nav-link" href="/roles">Roles</a>
                                        <?php endif; ?>

                                    </nav>
                                </div>

                            <?php endif; ?>

                            <?php if (tienePermiso('ver_sucursales')): ?>
                                <a class="nav-link" href="/branches">Listado de sucursales</a>
                            <?php endif; ?>
                            <?php if (tienePermiso('ajustes_multimedia')): ?>
                                <a class="nav-link" href="/content">Multimedia</a>
                            <?php endif; ?>
                            <?php if (tienePermiso('ver_configuracion')): ?>
                                <a class="nav-link" href="/settings">Información de Sistema</a>
                            <?php endif; ?>
                        </nav>
                    </div>

                <?php endif; ?>
                <?php if (tienePermiso('ver_reportes')): ?>
                    <a class="nav-link" href="/reports">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                        Reportería
                    </a>
                <?php endif; ?>
                <?php if (tienePermiso('ver_bitacora')): ?>
                    <a class="nav-link" href="/logs">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>Bitácora
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>

<!-- Lógica de activación de Sidebar (requiere jQuery y Bootstrap JS) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener la ruta actual, normalizada para eliminar la barra inicial si existe, 
        // y limpiar parámetros de consulta si los hay.
        let currentPath = window.location.pathname;

        // Si estás en la raíz (/), el path será solo /.
        if (currentPath === '/') {
            currentPath = '/dashboard'; // Asume que la raíz lleva al dashboard
        } else {
            // Eliminar la barra inicial para coincidencias más flexibles (e.g. /packages/new -> packages/new)
            currentPath = currentPath.startsWith('/') ? currentPath.substring(1) : currentPath;
            // Eliminar parámetros de consulta y hashes (e.g. /tracking?filter=1 -> tracking)
            currentPath = currentPath.split('?')[0].split('#')[0];
        }

        // 1. Iterar sobre todos los enlaces de navegación
        document.querySelectorAll('.nav-link').forEach(link => {
            let linkHref = link.getAttribute('href');

            if (linkHref) {
                // Eliminar la barra inicial de la URL del enlace (e.g. /packages -> packages)
                let normalizedLink = linkHref.startsWith('/') ? linkHref.substring(1) : linkHref;
                // Eliminar el hash inicial de las URLs que usan solo anclas (e.g. #/reports -> /reports)
                normalizedLink = normalizedLink.startsWith('#') ? normalizedLink.substring(1) : normalizedLink;

                // Si la URL del enlace coincide exactamente con el path actual:
                if (currentPath === normalizedLink) {
                    // 2. Resaltar el enlace
                    link.classList.add('active');

                    // 3. Expandir el menú padre si es un sub-enlace
                    // Buscar el contenedor de colapso padre (div.collapse)
                    let parentCollapse = link.closest('.collapse');

                    if (parentCollapse) {
                        // Añadir la clase 'show' para abrir el submenú
                        parentCollapse.classList.add('show');

                        // Encontrar el enlace padre que controla este colapso (a.nav-link.collapsed)
                        // Usamos el ID del colapso para encontrar el data-target coincidente
                        const targetId = '#' + parentCollapse.id;
                        const parentLink = document.querySelector(`a[data-target="${targetId}"]`);

                        if (parentLink) {
                            // Marcar el enlace padre como no colapsado y activo visualmente
                            parentLink.classList.remove('collapsed');
                            parentLink.setAttribute('aria-expanded', 'true');
                            // Opcional: podrías agregar la clase 'active' también al enlace padre si deseas resaltarlo, 
                            // pero solo 'active' en el subenlace es más común.
                        }
                    }
                }
            }
        });
    });
</script>