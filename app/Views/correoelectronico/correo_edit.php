<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <span class="fw-bold">
                    <i class="bi bi-pencil-square me-2"></i>Modificar correo electrónico #<?= esc($correo['idcorreoelectronico']) ?>
                </span>
                <a href="<?= base_url('correoelectronico/actual/' . $correo['idcorreoelectronico']) ?>" class="btn btn-sm btn-light">
                    <i class="bi bi-arrow-left me-1"></i> Volver a la ficha
                </a>
            </div>

            <form method="post" action="<?= base_url('correoelectronico/update/' . $correo['idcorreoelectronico']) ?>">
                <?= csrf_field() ?>

                <div class="card-body">
                    <!-- Selector de Persona -->
                    <div class="mb-3">
                        <label for="idpersona" class="form-label fw-semibold">Persona <span class="text-danger">*</span></label>
                        <select class="form-select <?= isset($errors['idpersona']) ? 'is-invalid' : '' ?>" id="idpersona" name="idpersona" required>
                            <option value="">-- Seleccione una Persona --</option>
                            <?php foreach ($personas as $p): ?>
                                <option value="<?= esc($p['idpersona']) ?>" <?= (old('idpersona', $correo['idpersona']) == $p['idpersona']) ? 'selected' : '' ?>>
                                    <?= esc($p['apellidos'] . ' ' . $p['nombres']) ?> (C.I. <?= esc($p['cedula']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['idpersona'])): ?>
                            <div class="invalid-feedback"><?= esc($errors['idpersona']) ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Dirección de Correo Electrónico -->
                    <div class="mb-3">
                        <label for="correo" class="form-label fw-semibold">Correo Electrónico <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
                            <input type="email" class="form-control <?= isset($errors['correo']) ? 'is-invalid' : '' ?>" id="correo" name="correo" value="<?= esc(old('correo', $correo['correo'])) ?>" required>
                            <?php if (isset($errors['correo'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['correo']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row g-3">
                        <!-- Tipo de Correo -->
                        <div class="col-md-6">
                            <label for="tipo" class="form-label fw-semibold">Tipo de correo</label>
                            <select class="form-select <?= isset($errors['tipo']) ? 'is-invalid' : '' ?>" id="tipo" name="tipo">
                                <?php $currTipo = old('tipo', $correo['tipo'] ?? 'Personal'); ?>
                                <option value="Personal" <?= ($currTipo === 'Personal') ? 'selected' : '' ?>>Personal</option>
                                <option value="Institucional" <?= ($currTipo === 'Institucional') ? 'selected' : '' ?>>Institucional / Educativo</option>
                                <option value="Laboral" <?= ($currTipo === 'Laboral') ? 'selected' : '' ?>>Laboral / Empresa</option>
                                <option value="Alternativo" <?= ($currTipo === 'Alternativo') ? 'selected' : '' ?>>Alternativo</option>
                            </select>
                        </div>

                        <!-- Fecha de Obtención -->
                        <div class="col-md-6">
                            <label for="fechaoptencion" class="form-label fw-semibold">Fecha en que se obtuvo o creó</label>
                            <input type="date" class="form-control <?= isset($errors['fechaoptencion']) ? 'is-invalid' : '' ?>" id="fechaoptencion" name="fechaoptencion" value="<?= esc(old('fechaoptencion', $correo['fechaoptencion'])) ?>">
                            <?php if (isset($errors['fechaoptencion'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['fechaoptencion']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="<?= base_url('correoelectronico/actual/' . $correo['idcorreoelectronico']) ?>" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success fw-semibold">
                        <i class="bi bi-check-circle-fill me-1"></i> Actualizar correo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
