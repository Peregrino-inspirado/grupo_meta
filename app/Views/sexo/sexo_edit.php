<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <span class="fw-bold">
                    <i class="bi bi-pencil-square me-2"></i>Modificar sexo #<?= esc($sexo['idsexo']) ?>
                </span>
                <a href="<?= base_url('sexo/actual/' . $sexo['idsexo']) ?>" class="btn btn-sm btn-outline-dark">
                    <i class="bi bi-arrow-left me-1"></i> Volver a la ficha
                </a>
            </div>

            <form method="post" action="<?= base_url('sexo/update/' . $sexo['idsexo']) ?>">
                <?= csrf_field() ?>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre del sexo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= isset($errors['nombre']) ? 'is-invalid' : '' ?>" id="nombre" name="nombre" value="<?= esc(old('nombre', $sexo['nombre'])) ?>" required autofocus>
                        <?php if (isset($errors['nombre'])): ?>
                            <div class="invalid-feedback"><?= esc($errors['nombre']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="<?= base_url('sexo/actual/' . $sexo['idsexo']) ?>" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-warning text-dark fw-semibold">
                        <i class="bi bi-check-circle-fill me-1"></i> Actualizar sexo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
