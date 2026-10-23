<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h5 class="mb-0 fw-bold text-dark">
                <i class="bi bi-people-fill text-primary me-2"></i>Directorio de personas
            </h5>
            <small class="text-muted">Personas registradas: <?= esc($total) ?></small>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= base_url('persona/add') ?>" class="btn btn-primary btn-sm">
                <i class="bi bi-person-plus-fill me-1"></i> Nueva Persona
            </a>
            <a href="<?= base_url('persona') ?>" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-card-text me-1"></i> Ficha Registro
            </a>
        </div>
    </div>

    <!-- Barra de Búsqueda -->
    <div class="p-3 bg-light border-bottom">
        <form method="get" action="<?= base_url('persona/listar') ?>" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="q" class="form-control" placeholder="Escriba una cédula, nombre, apellido, sexo o estado civil..." value="<?= esc($search ?? '') ?>">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                <?php if (!empty($search)): ?>
                    <a href="<?= base_url('persona/listar') ?>" class="btn btn-outline-secondary btn-sm">Limpiar</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 70px;">ID</th>
                        <th>Cédula</th>
                        <th>Apellidos y Nombres</th>
                        <th>Fecha Nac.</th>
                        <th>Sexo</th>
                        <th>Estado Civil</th>
                        <th>Contactos</th>
                        <th class="text-end" style="width: 170px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($personas)): ?>
                        <?php foreach ($personas as $p): ?>
                            <tr>
                                <td>
                                    <span class="badge bg-light text-secondary border">#<?= esc($p['idpersona']) ?></span>
                                </td>
                                <td>
                                    <strong class="text-dark font-monospace"><?= esc($p['cedula']) ?></strong>
                                </td>
                                <td class="fw-semibold">
                                    <?= esc($p['apellidos'] . ' ' . $p['nombres']) ?>
                                </td>
                                <td class="text-muted small">
                                    <?= !empty($p['fechanacimiento']) ? date('d/m/Y', strtotime($p['fechanacimiento'])) : '<span class="fst-italic text-black-50">-</span>' ?>
                                </td>
                                <td>
                                    <?php if (!empty($p['sexo_nombre'])): ?>
                                        <span class="badge bg-warning-subtle text-warning-emphasis">
                                            <?= esc($p['sexo_nombre']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="text-muted small fst-italic">No definido</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!empty($p['estadocivil_nombre'])): ?>
                                        <span class="badge bg-danger-subtle text-danger-emphasis">
                                            <?= esc($p['estadocivil_nombre']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="text-muted small fst-italic">No definido</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-info-subtle text-info-emphasis me-1" title="Direcciones">
                                        <i class="bi bi-geo-alt me-1"></i><?= esc($p['total_direcciones'] ?? 0) ?>
                                    </span>
                                    <span class="badge bg-success-subtle text-success-emphasis" title="Correos Electrónicos">
                                        <i class="bi bi-envelope me-1"></i><?= esc($p['total_correos'] ?? 0) ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('persona/actual/' . $p['idpersona']) ?>" class="btn btn-outline-primary" title="Ver Ficha">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="<?= base_url('persona/edit/' . $p['idpersona']) ?>" class="btn btn-outline-warning text-dark" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" title="Eliminar"
                                                onclick="confirmarBorrado('<?= base_url('persona/delete/' . $p['idpersona']) ?>', '¿Está seguro de eliminar a <?= esc($p['nombres'] . ' ' . $p['apellidos']) ?>?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-6 d-block mb-2 text-secondary text-opacity-50"></i>
                                No se encontraron personas que coincidan con la búsqueda.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
