<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border border-primary">
            <div class="card-header text-center">
                <h3>Form Pendaftaran Pasien Baru</h3>
            </div>
            <form action="/data/pasienSave" method="POST">
                <div class="card-body">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="code" class="form-label">No KTP</label>
                        <input onchange="autofill()" id="code" type="text" class="form-control" name="code">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-select" id="gender">
                            <option value=""></option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="born" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="born" id="born">
                    </div>
                </div>
                <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success" name="addDoctor">Save</button>
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
        url: "<?= base_url() ?>/data/getRawat/",
        data: {code:code},
        success: function(data) {
            var json = data
            obj = JSON.parse(json);
            console.log(obj)
            $('#name').val(obj[0].name);
            $('#gender').val(obj[0].gender);
            $('#born').val(obj[0].born);
        }
    });
}


</script>

<?= $this->endSection(); ?>
