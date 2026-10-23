<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Barra de Navegación de Registros -->
<?= view('layout/nav_toolbar', [
    'module'    => 'persona',
    'currentId' => $currentId,
    'posicion'  => $posicion,
]) ?>

<?php if (!$persona): ?>
    <div class="card p-5 text-center">
        <div class="text-muted mb-3">
            <i class="bi bi-person-x display-3"></i>
        </div>
        <h4 class="text-dark">No hay personas registradas</h4>
        <p class="text-secondary">Comience registrando una nueva persona en el sistema.</p>
        <div>
            <a href="<?= base_url('persona/add') ?>" class="btn btn-primary">
                <i class="bi bi-person-plus-fill me-1"></i> Registrar Primera Persona
            </a>
        </div>
    </div>
<?php else: ?>

    <div class="row g-4">
        <!-- Ficha de Datos Personales -->
        <div class="col-lg-5">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <span class="fw-bold">
                        <i class="bi bi-person-vcard me-2"></i>Ficha de la persona #<?= esc($persona['idpersona']) ?>
                    </span>
                    <span class="badge bg-light text-primary">Activo</span>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 text-primary mb-2">
                            <i class="bi bi-person-fill display-5"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-0"><?= esc($persona['nombres'] . ' ' . $persona['apellidos']) ?></h4>
                        <span class="badge bg-secondary-subtle text-secondary mt-1">
                            <i class="bi bi-card-heading me-1"></i>C.I. <?= esc($persona['cedula']) ?>
                        </span>
                    </div>

                    <dl class="row mb-0">
                        <dt class="col-sm-5 text-muted small text-uppercase">Código / ID:</dt>
                        <dd class="col-sm-7 fw-semibold">#<?= esc($persona['idpersona']) ?></dd>

                        <dt class="col-sm-5 text-muted small text-uppercase">Cédula:</dt>
                        <dd class="col-sm-7 fw-semibold"><?= esc($persona['cedula']) ?></dd>

                        <dt class="col-sm-5 text-muted small text-uppercase">Nombres:</dt>
                        <dd class="col-sm-7"><?= esc($persona['nombres']) ?></dd>

                        <dt class="col-sm-5 text-muted small text-uppercase">Apellidos:</dt>
                        <dd class="col-sm-7"><?= esc($persona['apellidos']) ?></dd>

                        <dt class="col-sm-5 text-muted small text-uppercase">F. Nacimiento:</dt>
                        <dd class="col-sm-7">
                            <?php if (!empty($persona['fechanacimiento'])): ?>
                                <?= date('d/m/Y', strtotime($persona['fechanacimiento'])) ?>
                                <span class="text-muted small">
                                    (<?= date_diff(date_create($persona['fechanacimiento']), date_create('today'))->y ?> años)
                                </span>
                            <?php else: ?>
                                <span class="text-muted fst-italic">No registrada</span>
                            <?php endif; ?>
                        </dd>

                        <dt class="col-sm-5 text-muted small text-uppercase">Sexo:</dt>
                        <dd class="col-sm-7">
                            <?php if (!empty($persona['sexo_nombre'])): ?>
                                <span class="badge bg-warning-subtle text-warning-emphasis">
                                    <i class="bi bi-gender-ambiguous me-1"></i><?= esc($persona['sexo_nombre']) ?>
                                </span>
                            <?php else: ?>
                                <span class="text-muted fst-italic">Sin especificar</span>
                            <?php endif; ?>
                        </dd>

                        <dt class="col-sm-5 text-muted small text-uppercase">Estado Civil:</dt>
                        <dd class="col-sm-7">
                            <?php if (!empty($persona['estadocivil_nombre'])): ?>
                                <span class="badge bg-danger-subtle text-danger-emphasis">
                                    <i class="bi bi-heart me-1"></i><?= esc($persona['estadocivil_nombre']) ?>
                                </span>
                            <?php else: ?>
                                <span class="text-muted fst-italic">Sin especificar</span>
                            <?php endif; ?>
                        </dd>
                    </dl>
                </div>
                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="<?= base_url('persona/edit/' . $persona['idpersona']) ?>" class="btn btn-sm btn-outline-warning text-dark">
                        <i class="bi bi-pencil-square me-1"></i> Editar Datos
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                            onclick="confirmarBorrado('<?= base_url('persona/delete/' . $persona['idpersona']) ?>', 'Se eliminará la persona <?= esc($persona['nombres'] . ' ' . $persona['apellidos']) ?> junto con todas sus direcciones y correos.')">
                        <i class="bi bi-trash-fill me-1"></i> Borrar
                    </button>
                </div>
            </div>
        </div>

        <!-- Sub-registros de la Persona: Direcciones y Correos -->
        <div class="col-lg-7">
            <!-- Bloque de Direcciones -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-dark">
                        <i class="bi bi-geo-alt-fill text-info me-2"></i>Direcciones de la persona (<?= count($direcciones) ?>)
                    </span>
                    <a href="<?= base_url('direccion/add/' . $persona['idpersona']) ?>" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-plus-circle me-1"></i> Agregar Dirección
                    </a>
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($direcciones)): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Dirección</th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($direcciones as $dir): ?>
                                        <tr>
                                            <td>
                                                <span class="badge bg-info-subtle text-info-emphasis">
                                                    <?= esc($dir['tipo'] ?? 'Domicilio') ?>
                                                </span>
                                            </td>
                                            <td class="fw-medium">
                                                <?= esc($dir['direccion']) ?>
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= base_url('direccion/actual/' . $dir['iddireccion']) ?>" class="btn btn-outline-secondary" title="Ver en Módulo">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="<?= base_url('direccion/edit/' . $dir['iddireccion']) ?>" class="btn btn-outline-warning text-dark" title="Editar">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="<?= base_url('direccion/delete/' . $dir['iddireccion'] . '?from_persona=1') ?>" class="btn btn-outline-danger" title="Eliminar"
                                                       onclick="return confirm('¿Eliminar esta dirección de la persona?');">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-4 text-center text-muted">
                            <i class="bi bi-geo-alt display-6 d-block mb-2 text-secondary text-opacity-50"></i>
                            No tiene direcciones registradas.
                            <div class="mt-2">
                                <a href="<?= base_url('direccion/add/' . $persona['idpersona']) ?>" class="btn btn-sm btn-outline-info">
                                    <i class="bi bi-plus me-1"></i> Registrar Dirección
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Bloque de Correos Electrónicos -->
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-dark">
                        <i class="bi bi-envelope-at-fill text-success me-2"></i>Correos de la persona (<?= count($correos) ?>)
                    </span>
                    <a href="<?= base_url('correoelectronico/add/' . $persona['idpersona']) ?>" class="btn btn-sm btn-success">
                        <i class="bi bi-plus-circle me-1"></i> Añadir correo
                    </a>
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($correos)): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Correo Electrónico</th>
                                        <th>F. Obtención</th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($correos as $cor): ?>
                                        <tr>
                                            <td>
                                                <span class="badge bg-success-subtle text-success-emphasis">
                                                    <?= esc($cor['tipo'] ?? 'Personal') ?>
                                                </span>
                                            </td>
                                            <td class="fw-medium">
                                                <i class="bi bi-envelope me-1 text-muted"></i>
                                                <a href="mailto:<?= esc($cor['correo']) ?>" class="text-decoration-none">
                                                    <?= esc($cor['correo']) ?>
                                                </a>
                                            </td>
                                            <td class="text-muted small">
                                                <?= !empty($cor['fechaoptencion']) ? date('d/m/Y', strtotime($cor['fechaoptencion'])) : '-' ?>
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= base_url('correoelectronico/actual/' . $cor['idcorreoelectronico']) ?>" class="btn btn-outline-secondary" title="Ver en Módulo">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="<?= base_url('correoelectronico/edit/' . $cor['idcorreoelectronico']) ?>" class="btn btn-outline-warning text-dark" title="Editar">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="<?= base_url('correoelectronico/delete/' . $cor['idcorreoelectronico'] . '?from_persona=1') ?>" class="btn btn-outline-danger" title="Eliminar"
                                                       onclick="return confirm('¿Eliminar este correo electrónico de la persona?');">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-4 text-center text-muted">
                            <i class="bi bi-envelope-at display-6 d-block mb-2 text-secondary text-opacity-50"></i>
                            No tiene correos electrónicos registrados.
                            <div class="mt-2">
                                <a href="<?= base_url('correoelectronico/add/' . $persona['idpersona']) ?>" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-plus me-1"></i> Registrar Correo
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?= $this->endSection() ?>
