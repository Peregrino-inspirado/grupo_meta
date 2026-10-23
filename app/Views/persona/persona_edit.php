<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <span class="fw-bold">
                    <i class="bi bi-pencil-square me-2"></i>Modificar datos de la persona #<?= esc($persona['idpersona']) ?>
                </span>
                <a href="<?= base_url('persona/actual/' . $persona['idpersona']) ?>" class="btn btn-sm btn-outline-dark">
                    <i class="bi bi-arrow-left me-1"></i> Volver a la ficha
                </a>
            </div>

            <form method="post" action="<?= base_url('persona/update/' . $persona['idpersona']) ?>">
                <?= csrf_field() ?>

                <div class="card-body">
                    <h6 class="text-primary text-uppercase fw-bold mb-3">
                        <i class="bi bi-card-checklist me-1"></i> 1. Datos personales
                    </h6>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="cedula" class="form-label fw-semibold">Cédula de identidad <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= isset($errors['cedula']) ? 'is-invalid' : '' ?>" id="cedula" name="cedula" value="<?= esc(old('cedula', $persona['cedula'])) ?>" required>
                            <?php if (isset($errors['cedula'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['cedula']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="fechanacimiento" class="form-label fw-semibold">Fecha de Nacimiento</label>
                            <input type="date" class="form-control <?= isset($errors['fechanacimiento']) ? 'is-invalid' : '' ?>" id="fechanacimiento" name="fechanacimiento" max="<?= date('Y-m-d') ?>" value="<?= esc(old('fechanacimiento', $persona['fechanacimiento'])) ?>">
                            <?php if (isset($errors['fechanacimiento'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['fechanacimiento']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="nombres" class="form-label fw-semibold">Nombres <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= isset($errors['nombres']) ? 'is-invalid' : '' ?>" id="nombres" name="nombres" value="<?= esc(old('nombres', $persona['nombres'])) ?>" required>
                            <?php if (isset($errors['nombres'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['nombres']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="apellidos" class="form-label fw-semibold">Apellidos <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= isset($errors['apellidos']) ? 'is-invalid' : '' ?>" id="apellidos" name="apellidos" value="<?= esc(old('apellidos', $persona['apellidos'])) ?>" required>
                            <?php if (isset($errors['apellidos'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['apellidos']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <h6 class="text-primary text-uppercase fw-bold mb-3 pt-3 border-top">
                        <i class="bi bi-tag-fill me-1"></i> 2. Sexo y estado civil
                    </h6>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="idsexo" class="form-label fw-semibold">Sexo</label>
                            <select class="form-select <?= isset($errors['idsexo']) ? 'is-invalid' : '' ?>" id="idsexo" name="idsexo">
                                <option value="">-- Seleccione Sexo --</option>
                                <?php foreach ($catalogoSexo as $s): ?>
                                    <option value="<?= esc($s['idsexo']) ?>" <?= (old('idsexo', $persona['idsexo']) == $s['idsexo']) ? 'selected' : '' ?>>
                                        <?= esc($s['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="idestadocivil" class="form-label fw-semibold">Estado Civil</label>
                            <select class="form-select <?= isset($errors['idestadocivil']) ? 'is-invalid' : '' ?>" id="idestadocivil" name="idestadocivil">
                                <option value="">-- Seleccione Estado Civil --</option>
                                <?php foreach ($catalogoEC as $ec): ?>
                                    <option value="<?= esc($ec['idestadocivil']) ?>" <?= (old('idestadocivil', $persona['idestadocivil']) == $ec['idestadocivil']) ? 'selected' : '' ?>>
                                        <?= esc($ec['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="<?= base_url('persona/actual/' . $persona['idpersona']) ?>" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-warning text-dark fw-semibold">
                        <i class="bi bi-check-circle-fill me-1"></i> Actualizar datos
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
