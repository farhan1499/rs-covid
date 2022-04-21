<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border border-primary">
            <div class="card-header text-center">
                <h3>Form Rekam Medis</h3>
            </div>
            <form action="/data/rekamSave" method="POST">
                <div class="card-body">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="code" class="form-label">No. Inap</label>
                        <input type="text" class="form-control" name="code">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pasien</label>
                        <input type="text" id="name" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="doctor" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" name="doctor">
                    </div>
                    <div class="mb-3">
                        <label for="complaint" class="form-label">Keluhan</label>
                        <input type="text" class="form-control" name="complaint">
                    </div>
                    <div class="mb-3">
                        <label for="diagnosis" class="form-label">diagnosa</label>
                        <input type="text" class="form-control" name="diagnosis">
                    </div>
                </div>
                <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success" name="addRekam">Save</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<?= $this->endSection(); ?>
