<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h5 class="mb-0 fw-bold text-dark">
                <i class="bi bi-gender-ambiguous text-warning me-2"></i>Catálogo de sexos registrados
            </h5>
            <small class="text-muted">Total de registros: <?= esc($total) ?></small>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= base_url('sexo/add') ?>" class="btn btn-warning btn-sm text-dark fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Agregar sexo
            </a>
            <a href="<?= base_url('sexo') ?>" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-card-text me-1"></i> Ir a la ficha
            </a>
        </div>
    </div>

    <!-- Barra de Búsqueda -->
    <div class="p-3 bg-light border-bottom">
        <form method="get" action="<?= base_url('sexo/listar') ?>" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="q" class="form-control" placeholder="Escriba el nombre del sexo que busca..." value="<?= esc($search ?? '') ?>">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                <?php if (!empty($search)): ?>
                    <a href="<?= base_url('sexo/listar') ?>" class="btn btn-outline-secondary btn-sm">Limpiar</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Sexo</th>
                        <th>Personas Asociadas</th>
                        <th class="text-end" style="width: 170px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sexos)): ?>
                        <?php foreach ($sexos as $s): ?>
                            <tr>
                                <td>
                                    <span class="badge bg-light text-secondary border">#<?= esc($s['idsexo']) ?></span>
                                </td>
                                <td class="fw-bold text-dark fs-6">
                                    <i class="bi bi-tag me-1 text-warning"></i><?= esc($s['nombre']) ?>
                                </td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary-emphasis">
                                        <i class="bi bi-people me-1"></i><?= esc($s['total_personas'] ?? 0) ?> personas
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('sexo/actual/' . $s['idsexo']) ?>" class="btn btn-outline-primary" title="Ver Ficha">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="<?= base_url('sexo/edit/' . $s['idsexo']) ?>" class="btn btn-outline-warning text-dark" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" title="Eliminar"
                                                onclick="confirmarBorrado('<?= base_url('sexo/delete/' . $s['idsexo']) ?>', '¿Desea eliminar el sexo <?= esc($s['nombre']) ?>?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                Aún no hay sexos registrados. Use el botón «Agregar sexo».
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
 
