<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Encabezado de Bienvenida -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h2 class="h3 fw-bold text-dark mb-1">
            <i class="bi bi-speedometer2 text-primary me-2"></i>Panel de control · Grupo Meta
        </h2>
        <p class="text-muted mb-0">Bienvenido al sistema de información del Grupo Meta: administre personas, catálogos y datos de contacto desde un solo lugar.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= base_url('persona/add') ?>" class="btn btn-primary">
            <i class="bi bi-person-plus-fill me-1"></i> Registrar persona
        </a>
        <a href="<?= base_url('persona/listar') ?>" class="btn btn-outline-secondary">
            <i class="bi bi-list-ul me-1"></i> Ver personas
        </a>
    </div>
</div>

<!-- Tarjetas de Resumen (5 Entidades) -->
<div class="row g-3 mb-4">
    <!-- 1. Personas -->
    <div class="col-sm-6 col-lg">
        <div class="card h-100 border-start border-primary border-4 shadow-sm hover-shadow transition">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold text-uppercase">Personas</span>
                    <div class="bg-primary bg-opacity-10 p-2 rounded text-primary">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1"><?= esc($stats['totalPersonas']) ?></h3>
                <a href="<?= base_url('persona') ?>" class="small text-primary text-decoration-none fw-medium">
                    Gestionar Personas <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Sexos -->
    <div class="col-sm-6 col-lg">
        <div class="card h-100 border-start border-warning border-4 shadow-sm hover-shadow transition">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold text-uppercase">Sexos</span>
                    <div class="bg-warning bg-opacity-10 p-2 rounded text-warning">
                        <i class="bi bi-gender-ambiguous fs-4"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1"><?= esc($stats['totalSexos']) ?></h3>
                <a href="<?= base_url('sexo') ?>" class="small text-warning text-decoration-none fw-medium">
                    Ver Catálogo <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 3. Estados Civiles -->
    <div class="col-sm-6 col-lg">
        <div class="card h-100 border-start border-danger border-4 shadow-sm hover-shadow transition">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold text-uppercase">Estados Civiles</span>
                    <div class="bg-danger bg-opacity-10 p-2 rounded text-danger">
                        <i class="bi bi-heart-fill fs-4"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1"><?= esc($stats['totalEC']) ?></h3>
                <a href="<?= base_url('estadocivil') ?>" class="small text-danger text-decoration-none fw-medium">
                    Ver Catálogo <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 4. Direcciones -->
    <div class="col-sm-6 col-lg">
        <div class="card h-100 border-start border-info border-4 shadow-sm hover-shadow transition">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold text-uppercase">Direcciones</span>
                    <div class="bg-info bg-opacity-10 p-2 rounded text-info">
                        <i class="bi bi-geo-alt-fill fs-4"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1"><?= esc($stats['totalDirecciones']) ?></h3>
                <a href="<?= base_url('direccion') ?>" class="small text-info text-decoration-none fw-medium">
                    Ver Direcciones <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 5. Correos Electrónicos -->
    <div class="col-sm-6 col-lg">
        <div class="card h-100 border-start border-success border-4 shadow-sm hover-shadow transition">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold text-uppercase">Correos Elec.</span>
                    <div class="bg-success bg-opacity-10 p-2 rounded text-success">
                        <i class="bi bi-envelope-at-fill fs-4"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1"><?= esc($stats['totalCorreos']) ?></h3>
                <a href="<?= base_url('correoelectronico') ?>" class="small text-success text-decoration-none fw-medium">
                    Ver Correos <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Tablas de Distribución y Recientes -->
<div class="row g-4 mb-4">
    <!-- Últimas Personas Registradas -->
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fw-bold"><i class="bi bi-clock-history me-2 text-primary"></i>Últimas Personas Registradas</span>
                <a href="<?= base_url('persona/listar') ?>" class="btn btn-sm btn-outline-primary">Ver todas</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Apellidos y Nombres</th>
                                <th>Sexo</th>
                                <th>Estado Civil</th>
                                <th class="text-end">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($stats['ultimasPersonas'])): ?>
                                <?php foreach ($stats['ultimasPersonas'] as $p): ?>
                                    <tr>
                                        <td>
                                            <span class="badge bg-light text-dark border">
                                                <i class="bi bi-card-heading me-1"></i><?= esc($p['cedula']) ?>
                                            </span>
                                        </td>
                                        <td class="fw-semibold">
                                            <?= esc($p['apellidos'] . ' ' . $p['nombres']) ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning-subtle text-warning-emphasis">
                                                <?= esc($p['sexo_nombre'] ?? 'N/A') ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger-subtle text-danger-emphasis">
                                                <?= esc($p['estadocivil_nombre'] ?? 'N/A') ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?= base_url('persona/actual/' . $p['idpersona']) ?>" class="btn btn-sm btn-outline-primary" title="Ver Ficha">
                                                <i class="bi bi-eye-fill"></i> Ver Ficha
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        No hay personas registradas aún.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Distribuciones -->
    <div class="col-lg-4">
        <!-- Distribución por Sexo -->
        <div class="card mb-3">
            <div class="card-header fw-bold">
                <i class="bi bi-pie-chart-fill me-2 text-warning"></i>Distribución por Sexo
            </div>
            <div class="card-body">
                <?php if (!empty($stats['distSexo'])): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($stats['distSexo'] as $ds): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span><?= esc($ds['categoria']) ?></span>
                                <span class="badge bg-primary rounded-pill"><?= esc($ds['total']) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted small mb-0">Sin datos registrados.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Distribución por Estado Civil -->
        <div class="card">
            <div class="card-header fw-bold">
                <i class="bi bi-pie-chart-fill me-2 text-danger"></i>Distribución por Estado Civil
            </div>
            <div class="card-body">
                <?php if (!empty($stats['distEC'])): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($stats['distEC'] as $dec): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span><?= esc($dec['categoria']) ?></span>
                                <span class="badge bg-danger rounded-pill"><?= esc($dec['total']) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted small mb-0">Sin datos registrados.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
