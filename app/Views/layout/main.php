<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Grupo Meta · Sistema de Información') ?></title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ci-primary: #0d6efd;
            --ci-primary-dark: #0a58ca;
            --ci-sidebar-bg: #1e293b;
            --ci-sidebar-hover: #334155;
            --ci-sidebar-active: #0284c7;
            --ci-bg: #f8fafc;
            --ci-card-border: #e2e8f0;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--ci-bg);
            color: #1e293b;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        #wrapper {
            display: flex;
            flex: 1;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        #sidebar {
            width: 260px;
            min-width: 260px;
            background-color: var(--ci-sidebar-bg);
            color: #cbd5e1;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 1020;
        }

        #sidebar .brand {
            padding: 1.25rem 1.5rem;
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-decoration: none;
        }

        #sidebar .brand i {
            color: #38bdf8;
            font-size: 1.5rem;
        }

        #sidebar .nav-list {
            list-style: none;
            padding: 1rem 0.75rem;
            margin: 0;
            flex: 1;
        }

        #sidebar .nav-header {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            padding: 0.75rem 0.75rem 0.35rem 0.75rem;
            font-weight: 600;
        }

        #sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.65rem 0.85rem;
            color: #94a3b8;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.92rem;
            transition: all 0.2s ease;
            text-decoration: none;
            margin-bottom: 0.2rem;
        }

        #sidebar .nav-link:hover {
            color: #ffffff;
            background-color: var(--ci-sidebar-hover);
        }

        #sidebar .nav-link.active {
            color: #ffffff;
            background: linear-gradient(90deg, #0284c7, #0369a1);
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);
        }

        #sidebar .nav-link i {
            font-size: 1.15rem;
        }

        /* Content Area */
        #content {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* Top Header */
        .top-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid var(--ci-card-border);
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .main-container {
            padding: 1.75rem;
            flex: 1;
        }

        /* Card Styles */
        .card {
            border: 1px solid var(--ci-card-border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            background-color: #ffffff;
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid var(--ci-card-border);
            padding: 1rem 1.25rem;
            font-weight: 600;
        }

        /* Navigation Toolbar Styles */
        .nav-toolbar-card {
            background: #ffffff;
            border: 1px solid var(--ci-card-border);
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        }

        /* Table Styles */
        .table {
            vertical-align: middle;
        }

        .table thead th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            border-top: none;
        }

        /* Badges */
        .badge {
            font-weight: 500;
            padding: 0.4em 0.7em;
            border-radius: 6px;
        }

        /* Footer */
        footer {
            background-color: #ffffff;
            border-top: 1px solid var(--ci-card-border);
            padding: 1rem 1.5rem;
            font-size: 0.85rem;
            color: #64748b;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <!-- Sidebar -->
    <aside id="sidebar">
        <a href="<?= base_url() ?>" class="brand">
            <i class="bi bi-person-badge-fill"></i>
            <div>
                <span class="d-block leading-tight">Grupo Meta</span>
                <small class="text-info fw-normal" style="font-size: 0.72rem;">Sistema de Información Web</small>
            </div>
        </a>

        <ul class="nav-list">
            <li class="nav-header">Principal</li>
            <li>
                <a href="<?= base_url() ?>" class="nav-link <?= (!isset($module) || $module === 'home') ? 'active' : '' ?>">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-header">Gestión de Personas</li>
            <li>
                <a href="<?= base_url('persona') ?>" class="nav-link <?= (isset($module) && $module === 'persona') ? 'active' : '' ?>">
                    <i class="bi bi-people-fill"></i>
                    <span>Persona</span>
                </a>
            </li>

            <li class="nav-header">Catálogos Relacionados</li>
            <li>
                <a href="<?= base_url('sexo') ?>" class="nav-link <?= (isset($module) && $module === 'sexo') ? 'active' : '' ?>">
                    <i class="bi bi-gender-ambiguous"></i>
                    <span>Sexo</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('estadocivil') ?>" class="nav-link <?= (isset($module) && $module === 'estadocivil') ? 'active' : '' ?>">
                    <i class="bi bi-heart-fill"></i>
                    <span>Estado Civil</span>
                </a>
            </li>

            <li class="nav-header">Datos de Contacto</li>
            <li>
                <a href="<?= base_url('direccion') ?>" class="nav-link <?= (isset($module) && $module === 'direccion') ? 'active' : '' ?>">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Dirección</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('correoelectronico') ?>" class="nav-link <?= (isset($module) && ($module === 'correoelectronico' || $module === 'correo')) ? 'active' : '' ?>">
                    <i class="bi bi-envelope-at-fill"></i>
                    <span>Correo Electrónico</span>
                </a>
            </li>
        </ul>

        <div class="p-3 mt-auto border-top border-secondary border-opacity-25 text-center">
            <small class="text-muted d-block">CodeIgniter 4.5.1</small>
            <span class="badge bg-success-subtle text-success mt-1">Conectado a MySQL</span>
        </div>
    </aside>

    <!-- Main Content -->
    <div id="content">
        <!-- Top Navbar -->
        <header class="top-navbar">
            <div class="d-flex align-items-center gap-3">
                <span class="fw-bold text-dark fs-5">
                    <?= esc($title ?? 'Sistema de Información') ?>
                </span>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-plus-circle me-1"></i> Acceso Rápido
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="<?= base_url('persona/add') ?>"><i class="bi bi-person-plus me-2 text-primary"></i>Nueva Persona</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('direccion/add') ?>"><i class="bi bi-geo-alt me-2 text-info"></i>Nueva Dirección</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('correoelectronico/add') ?>"><i class="bi bi-envelope me-2 text-success"></i>Nuevo Correo</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url('sexo/add') ?>"><i class="bi bi-gender-ambiguous me-2 text-warning"></i>Nuevo Sexo</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('estadocivil/add') ?>"><i class="bi bi-heart me-2 text-danger"></i>Nuevo Estado Civil</a></li>
                    </ul>
                </div>

                <div class="text-end d-none d-md-block">
                    <span class="badge bg-primary text-white"><i class="bi bi-calendar3 me-1"></i><?= date('d/m/Y') ?></span>
                </div>
            </div>
        </header>

        <!-- Container for View Content -->
        <main class="main-container">
            <!-- Alertas Flash -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div><?= session()->getFlashdata('success') ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                    <div><?= session()->getFlashdata('error') ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-exclamation-circle-fill me-2 fs-5"></i>
                        <strong class="me-auto">Por favor revise los siguientes errores:</strong>
                    </div>
                    <ul class="mb-0 ps-4">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Contenido Inyectado -->
            <?= $this->renderSection('content') ?>
        </main>

        <!-- Footer -->
        <footer>
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <strong>Sistema de Información Grupo Meta</strong> &copy; <?= date('Y') ?> | Ingeniería de Software I · Tecnología de la Información · 5to B.
                </div>
                <div>
                    <span class="badge bg-light text-secondary border">CodeIgniter 4 + MariaDB</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Modal Universal de Confirmación de Borrado -->
<div class="modal fade" id="modalUniversalDelete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="formUniversalDelete" action="">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill me-2"></i>Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">¿Está seguro de que desea eliminar este registro?</p>
                    <div class="alert alert-warning mb-0 small">
                        <i class="bi bi-info-circle me-1"></i> <span id="modalDeleteText">Esta operación no se puede deshacer.</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash-fill me-1"></i> Sí, Eliminar Definitivamente
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap 5.3 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Configurar URL dinámicamente en modal de borrado
    function confirmarBorrado(url, descripcion) {
        document.getElementById('formUniversalDelete').action = url;
        if (descripcion) {
            document.getElementById('modalDeleteText').textContent = descripcion;
        } else {
            document.getElementById('modalDeleteText').textContent = 'Esta operación no se puede deshacer.';
        }
        var modal = new bootstrap.Modal(document.getElementById('modalUniversalDelete'));
        modal.show();
    }
</script>

<?= $this->renderSection('scripts') ?>
</body>
</html>
