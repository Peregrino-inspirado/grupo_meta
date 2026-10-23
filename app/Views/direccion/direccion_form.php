<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <span class="fw-bold">
                    <i class="bi bi-plus-circle me-2"></i>Registro de una nueva dirección
                </span>
                <a href="<?= !empty($idpersonaSeleccion) ? base_url('persona/actual/' . $idpersonaSeleccion) : base_url('direccion') ?>" class="btn btn-sm btn-light">
                    <i class="bi bi-arrow-left me-1"></i> Cancelar y volver
                </a>
            </div>

            <form method="post" action="<?= base_url('direccion/store') ?>">
                <?= csrf_field() ?>

                <?php if (!empty($idpersonaSeleccion)): ?>
                    <input type="hidden" name="retornar_persona" value="1">
                <?php endif; ?>

                <div class="card-body">
                    <!-- Selector de Persona -->
                    <div class="mb-3">
                        <label for="idpersona" class="form-label fw-semibold">Persona <span class="text-danger">*</span></label>
                        <select class="form-select <?= isset($errors['idpersona']) ? 'is-invalid' : '' ?>" id="idpersona" name="idpersona" required>
                            <option value="">-- Seleccione una Persona --</option>
                            <?php foreach ($personas as $p): ?>
                                <option value="<?= esc($p['idpersona']) ?>" <?= ((isset($old['idpersona']) && $old['idpersona'] == $p['idpersona']) || ($idpersonaSeleccion == $p['idpersona'])) ? 'selected' : '' ?>>
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
                            <option value="Domicilio" <?= (isset($old['tipo']) && $old['tipo'] === 'Domicilio') ? 'selected' : '' ?>>Domicilio</option>
                            <option value="Trabajo" <?= (isset($old['tipo']) && $old['tipo'] === 'Trabajo') ? 'selected' : '' ?>>Trabajo</option>
                            <option value="Secundaria" <?= (isset($old['tipo']) && $old['tipo'] === 'Secundaria') ? 'selected' : '' ?>>Secundaria / Vacacional</option>
                            <option value="Otro" <?= (isset($old['tipo']) && $old['tipo'] === 'Otro') ? 'selected' : '' ?>>Otro</option>
                        </select>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-3">
                        <label for="direccion" class="form-label fw-semibold">Dirección completa <span class="text-danger">*</span></label>
                        <textarea class="form-control <?= isset($errors['direccion']) ? 'is-invalid' : '' ?>" id="direccion" name="direccion" rows="3" placeholder="Ej: Calle 10 de Agosto y Bolívar #452, Barrio Central..." required><?= esc($old['direccion'] ?? old('direccion')) ?></textarea>
                        <?php if (isset($errors['direccion'])): ?>
                            <div class="invalid-feedback"><?= esc($errors['direccion']) ?></div>
                        <?php endif; ?>
                        <div class="form-text">Escriba la calle principal, la intersección, el número de casa y una referencia.</div>
                    </div>
                </div>

                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="<?= !empty($idpersonaSeleccion) ? base_url('persona/actual/' . $idpersonaSeleccion) : base_url('direccion') ?>" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle-fill me-1"></i> Guardar dirección
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
