<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span class="fw-bold">
                    <i class="bi bi-person-plus-fill me-2"></i>Registro de una nueva persona
                </span>
                <a href="<?= base_url('persona') ?>" class="btn btn-sm btn-light">
                    <i class="bi bi-arrow-left me-1"></i> Volver a las fichas
                </a>
            </div>

            <form method="post" action="<?= base_url('persona/store') ?>">
                <?= csrf_field() ?>

                <div class="card-body">
                    <h6 class="text-primary text-uppercase fw-bold mb-3">
                        <i class="bi bi-card-checklist me-1"></i> 1. Datos personales
                    </h6>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="cedula" class="form-label fw-semibold">Número de Cédula / DNI <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= isset($errors['cedula']) ? 'is-invalid' : '' ?>" id="cedula" name="cedula" value="<?= esc($old['cedula'] ?? old('cedula')) ?>" placeholder="Ej: 0801234567" required>
                            <?php if (isset($errors['cedula'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['cedula']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="fechanacimiento" class="form-label fw-semibold">Fecha de Nacimiento</label>
                            <input type="date" class="form-control <?= isset($errors['fechanacimiento']) ? 'is-invalid' : '' ?>" id="fechanacimiento" name="fechanacimiento" value="<?= esc($old['fechanacimiento'] ?? old('fechanacimiento')) ?>">
                            <?php if (isset($errors['fechanacimiento'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['fechanacimiento']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="nombres" class="form-label fw-semibold">Nombres Completos <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= isset($errors['nombres']) ? 'is-invalid' : '' ?>" id="nombres" name="nombres" value="<?= esc($old['nombres'] ?? old('nombres')) ?>" placeholder="Ej: Juan Carlos" required>
                            <?php if (isset($errors['nombres'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['nombres']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="apellidos" class="form-label fw-semibold">Apellidos Completos <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= isset($errors['apellidos']) ? 'is-invalid' : '' ?>" id="apellidos" name="apellidos" value="<?= esc($old['apellidos'] ?? old('apellidos')) ?>" placeholder="Ej: Pérez Rodríguez" required>
                            <?php if (isset($errors['apellidos'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['apellidos']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <h6 class="text-primary text-uppercase fw-bold mb-3 pt-3 border-top">
                        <i class="bi bi-tag-fill me-1"></i> 2. Sexo y estado civil
                    </h6>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="idsexo" class="form-label fw-semibold">Sexo</label>
                            <select class="form-select <?= isset($errors['idsexo']) ? 'is-invalid' : '' ?>" id="idsexo" name="idsexo">
                                <option value="">-- Seleccione Sexo --</option>
                                <?php foreach ($catalogoSexo as $s): ?>
                                    <option value="<?= esc($s['idsexo']) ?>" <?= (isset($old['idsexo']) && $old['idsexo'] == $s['idsexo']) ? 'selected' : '' ?>>
                                        <?= esc($s['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-text">Si no encuentra el sexo deseado, puede gestionarlo en el catálogo de Sexos.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="idestadocivil" class="form-label fw-semibold">Estado Civil</label>
                            <select class="form-select <?= isset($errors['idestadocivil']) ? 'is-invalid' : '' ?>" id="idestadocivil" name="idestadocivil">
                                <option value="">-- Seleccione Estado Civil --</option>
                                <?php foreach ($catalogoEC as $ec): ?>
                                    <option value="<?= esc($ec['idestadocivil']) ?>" <?= (isset($old['idestadocivil']) && $old['idestadocivil'] == $ec['idestadocivil']) ? 'selected' : '' ?>>
                                        <?= esc($ec['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-text">Puede agregar más estados civiles en su respectivo módulo.</div>
                        </div>
                    </div>

                    <!-- Datos Iniciales Opcionales -->
                    <div class="accordion mb-3" id="accordionOpcional">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingContactos">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContactos" aria-expanded="false">
                                    <i class="bi bi-geo-alt-fill me-2 text-info"></i>
                                    <i class="bi bi-envelope-at-fill me-2 text-success"></i>
                                    <span>Agregar Dirección y Correo Inicial (Opcional)</span>
                                </button>
                            </h2>
                            <div id="collapseContactos" class="accordion-collapse collapse" data-bs-parent="#accordionOpcional">
                                <div class="accordion-body bg-light">
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <label class="form-label fw-semibold">Dirección Domiciliaria / Laboral</label>
                                            <input type="text" name="direccion_inicial" class="form-control" placeholder="Ej: Av. Olmedo y Rocafuerte #123">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Tipo Dirección</label>
                                            <select name="tipo_direccion" class="form-select">
                                                <option value="Domicilio">Domicilio</option>
                                                <option value="Trabajo">Trabajo</option>
                                                <option value="Secundaria">Secundaria</option>
                                            </select>
                                        </div>

                                        <div class="col-md-8">
                                            <label class="form-label fw-semibold">Correo Electrónico</label>
                                            <input type="email" name="correo_inicial" class="form-control" placeholder="Ej: usuario@correo.com">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Tipo Correo</label>
                                            <select name="tipo_correo" class="form-select">
                                                <option value="Personal">Personal</option>
                                                <option value="Institucional">Institucional</option>
                                                <option value="Laboral">Laboral</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="<?= base_url('persona') ?>" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle-fill me-1"></i> Guardar Persona
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
