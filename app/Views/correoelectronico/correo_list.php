<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h5 class="mb-0 fw-bold text-dark">
                <i class="bi bi-envelope-at-fill text-success me-2"></i>Directorio de correos electrónicos
            </h5>
            <small class="text-muted">
                Total de registros: <?= esc($total) ?>
                <?php if (!empty($personaFiltro)): ?>
                    | Filtrado para: <strong><?= esc($personaFiltro['nombres'] . ' ' . $personaFiltro['apellidos']) ?></strong>
                <?php endif; ?>
            </small>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= base_url('correoelectronico/add' . (!empty($idpersona) ? '/' . $idpersona : '')) ?>" class="btn btn-success btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Registrar correo
            </a>
            <a href="<?= base_url('correoelectronico') ?>" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-card-text me-1"></i> Ir a la ficha
            </a>
        </div>
    </div>

    <!-- Barra de Búsqueda -->
    <div class="p-3 bg-light border-bottom">
        <form method="get" action="<?= base_url('correoelectronico/listar') ?>" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="q" class="form-control" placeholder="Escriba un correo, nombre o cédula..." value="<?= esc($search ?? '') ?>">
                </div>
            </div>
            <?php if (!empty($idpersona)): ?>
                <input type="hidden" name="idpersona" value="<?= esc($idpersona) ?>">
            <?php endif; ?>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                <?php if (!empty($search) || !empty($idpersona)): ?>
                    <a href="<?= base_url('correoelectronico/listar') ?>" class="btn btn-outline-secondary btn-sm">Limpiar Filtros</a>
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
                        <th>Persona</th>
                        <th>Tipo</th>
                        <th>Correo Electrónico</th>
                        <th>Fecha de obtención</th>
                        <th class="text-end" style="width: 170px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($correos)): ?>
                        <?php foreach ($correos as $c): ?>
                            <tr>
                                <td>
                                    <span class="badge bg-light text-secondary border">#<?= esc($c['idcorreoelectronico']) ?></span>
                                </td>
                                <td>
                                    <a href="<?= base_url('persona/actual/' . $c['idpersona']) ?>" class="fw-semibold text-decoration-none">
                                        <i class="bi bi-person me-1"></i><?= esc($c['nombres'] . ' ' . $c['apellidos']) ?>
                                    </a>
                                    <div class="small text-muted font-monospace">C.I. <?= esc($c['cedula']) ?></div>
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success-emphasis">
                                        <?= esc($c['tipo'] ?? 'Personal') ?>
                                    </span>
                                </td>
                                <td class="fw-medium text-dark">
                                    <i class="bi bi-envelope me-1 text-muted"></i>
                                    <a href="mailto:<?= esc($c['correo']) ?>" class="text-decoration-none">
                                        <?= esc($c['correo']) ?>
                                    </a>
                                </td>
                                <td class="text-muted small">
                                    <?= !empty($c['fechaoptencion']) ? date('d/m/Y', strtotime($c['fechaoptencion'])) : '-' ?>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('correoelectronico/actual/' . $c['idcorreoelectronico']) ?>" class="btn btn-outline-primary" title="Ver Ficha">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="<?= base_url('correoelectronico/edit/' . $c['idcorreoelectronico']) ?>" class="btn btn-outline-warning text-dark" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" title="Eliminar"
                                                onclick="confirmarBorrado('<?= base_url('correoelectronico/delete/' . $c['idcorreoelectronico']) ?>', '¿Desea eliminar el correo <?= esc($c['correo']) ?>?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                Todavía no hay correos registrados.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
