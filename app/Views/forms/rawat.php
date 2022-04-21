<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border border-primary">
            <div class="card-header text-center">
                <h3>Form Pendaftaran Pasien Rawat Inap</h3>
            </div>
            <form action="/data/rawatSave" method="POST">
                <div class="card-body">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="code" class="form-label">No. Inap</label>
                        <input type="text" class="form-control" name="code" id="code">
                    </div>
                    <div class="mb-3">
                        <label for="code_patient" class="form-label">No KTP</label>
                        <input onchange="autofill()" type="text" class="form-control" name="code_patient">
                    </div>
                    <div class="mb-3">
                        <label for="patient" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" name="patient" id="patient">
                    </div>
                    <div class="mb-3">
                        <label for="in" class="form-label">Tanggal Masuk</label>
                        <input type="datetime-local" class="form-control" name="in">
                    </div>
                    <div class="mb-3">
                        <label for="nurse" class="form-label">Perawat</label>
                        <select name="nurse" class="form-select" id="nurse">
                            <option disabled></option>
                            <?php foreach($perawat as $key) : ?>
                                <option value="<?= $key["name"]; ?>"><?= ucfirst($key["name"]); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" name="status" value="Covid-19" readonly>
                    </div>
                </div>
                <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success" name="addRawat">Save</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<script>
    function autofill() {
    var code = $('#code').val();

    $.ajax({
        type: 'post',
        url: "<?= base_url() ?>/data/getPasien/",
        data: {code:code},
        success: function(data) {
            var json = data
            obj = JSON.parse(json);
            console.log(obj)
            $('#patient').val(obj[0].patient);
        }
    });
}


</script>
<?= $this->endSection(); ?>
