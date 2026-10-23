<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <span class="fw-bold">
                    <i class="bi bi-pencil-square me-2"></i>Modificar dirección #<?= esc($direccion['iddireccion']) ?>
                </span>
                <a href="<?= base_url('direccion/actual/' . $direccion['iddireccion']) ?>" class="btn btn-sm btn-light">
                    <i class="bi bi-arrow-left me-1"></i> Volver a la ficha
                </a>
            </div>

            <form method="post" action="<?= base_url('direccion/update/' . $direccion['iddireccion']) ?>">
                <?= csrf_field() ?>

                <div class="card-body">
                    <!-- Selector de Persona -->
                    <div class="mb-3">
                        <label for="idpersona" class="form-label fw-semibold">Persona <span class="text-danger">*</span></label>
                        <select class="form-select <?= isset($errors['idpersona']) ? 'is-invalid' : '' ?>" id="idpersona" name="idpersona" required>
                            <option value="">-- Seleccione una Persona --</option>
                            <?php foreach ($personas as $p): ?>
                                <option value="<?= esc($p['idpersona']) ?>" <?= (old('idpersona', $direccion['idpersona']) == $p['idpersona']) ? 'selected' : '' ?>>
                                    <?= esc($p['apellidos'] . ' ' . $p['nombres']) ?> (C.I. <?= esc($p['cedula']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['idpersona'])): ?>
                            <div class="invalid-feedback"><?= esc($errors['idpersona']) ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Tipo de Dirección -->
                    <div class="mb-3">
                        <label for="tipo" class="form-label fw-semibold">Tipo de dirección</label>
                        <select class="form-select <?= isset($errors['tipo']) ? 'is-invalid' : '' ?>" id="tipo" name="tipo">
                            <?php $currTipo = old('tipo', $direccion['tipo'] ?? 'Domicilio'); ?>
                            <option value="Domicilio" <?= ($currTipo === 'Domicilio') ? 'selected' : '' ?>>Domicilio</option>
                            <option value="Trabajo" <?= ($currTipo === 'Trabajo') ? 'selected' : '' ?>>Trabajo</option>
                            <option value="Secundaria" <?= ($currTipo === 'Secundaria') ? 'selected' : '' ?>>Secundaria / Vacacional</option>
                            <option value="Otro" <?= ($currTipo === 'Otro') ? 'selected' : '' ?>>Otro</option>
                        </select>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-3">
                        <label for="direccion" class="form-label fw-semibold">Dirección completa <span class="text-danger">*</span></label>
                        <textarea class="form-control <?= isset($errors['direccion']) ? 'is-invalid' : '' ?>" id="direccion" name="direccion" rows="3" required><?= esc(old('direccion', $direccion['direccion'])) ?></textarea>
                        <?php if (isset($errors['direccion'])): ?>
                            <div class="invalid-feedback"><?= esc($errors['direccion']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="<?= base_url('direccion/actual/' . $direccion['iddireccion']) ?>" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-info text-white fw-semibold">
                        <i class="bi bi-check-circle-fill me-1"></i> Actualizar dirección
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
