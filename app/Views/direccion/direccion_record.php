<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Barra de Navegación de Registros -->
<?= view('layout/nav_toolbar', [
    'module'    => 'direccion',
    'currentId' => $currentId,
    'posicion'  => $posicion,
]) ?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <?php if (!$direccion): ?>
            <div class="card p-5 text-center">
                <i class="bi bi-geo-alt display-3 text-muted mb-3"></i>
                <h4 class="text-dark">No hay registros de Dirección</h4>
                <p class="text-secondary">Ingrese una nueva dirección para comenzar.</p>
                <div>
                    <a href="<?= base_url('direccion/add') ?>" class="btn btn-info text-white">
                        <i class="bi bi-plus-circle me-1"></i> Registrar dirección
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <span class="fw-bold">
                        <i class="bi bi-geo-alt-fill me-2"></i>Ficha de la dirección #<?= esc($direccion['iddireccion']) ?>
                    </span>
                    <span class="badge bg-light text-info"><?= esc($direccion['tipo'] ?? 'Domicilio') ?></span>
                </div>
                <div class="card-body">
                    <div class="text-center py-3 border-bottom mb-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 text-info mb-2">
                            <i class="bi bi-geo-alt-fill display-5"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-1"><?= esc($direccion['direccion']) ?></h4>
                        <span class="badge bg-secondary-subtle text-secondary">
                            Tipo: <?= esc($direccion['tipo'] ?? 'Domicilio') ?>
                        </span>
                    </div>

                    <dl class="row mb-0">
                        <dt class="col-sm-4 text-muted small text-uppercase">Código / ID:</dt>
                        <dd class="col-sm-8 fw-semibold">#<?= esc($direccion['iddireccion']) ?></dd>

                        <dt class="col-sm-4 text-muted small text-uppercase">Dirección:</dt>
                        <dd class="col-sm-8 fw-bold text-dark"><?= esc($direccion['direccion']) ?></dd>

                        <dt class="col-sm-4 text-muted small text-uppercase">Tipo:</dt>
                        <dd class="col-sm-8">
                            <span class="badge bg-info-subtle text-info-emphasis">
                                <?= esc($direccion['tipo'] ?? 'Domicilio') ?>
                            </span>
                        </dd>

                        <dt class="col-sm-4 text-muted small text-uppercase">Persona Propietaria:</dt>
                        <dd class="col-sm-8">
                            <?php if (!empty($direccion['idpersona'])): ?>
                                <a href="<?= base_url('persona/actual/' . $direccion['idpersona']) ?>" class="fw-bold text-decoration-none">
                                    <i class="bi bi-person-fill me-1"></i><?= esc($direccion['nombres'] . ' ' . $direccion['apellidos']) ?>
                                </a>
                                <span class="badge bg-light text-secondary border ms-1">C.I. <?= esc($direccion['cedula']) ?></span>
                            <?php else: ?>
                                <span class="text-muted fst-italic">Sin asignar</span>
                            <?php endif; ?>
                        </dd>
                    </dl>
                </div>
                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="<?= base_url('direccion/edit/' . $direccion['iddireccion']) ?>" class="btn btn-sm btn-outline-warning text-dark">
                        <i class="bi bi-pencil-square me-1"></i> Modificar
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                            onclick="confirmarBorrado('<?= base_url('direccion/delete/' . $direccion['iddireccion']) ?>', '¿Desea eliminar la dirección #<?= esc($direccion['iddireccion']) ?>?')">
                        <i class="bi bi-trash-fill me-1"></i> Eliminar
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
