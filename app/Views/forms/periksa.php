<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border border-primary">
            <div class="card-header text-center">
                <h3>Form Pemeriksaan</h3>
            </div>
            <form action="/data/periksaSave" method="POST">
                <div class="card-body">
                    <?php
                        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        
                        function generate_string($input, $strength = 16) {
                            $input_length = strlen($input);
                            $random_string = '';
                            for($i = 0; $i < $strength; $i++) {
                                $random_character = $input[mt_rand(0, $input_length - 1)];
                                $random_string .= $random_character;
                            }
                            return $random_string;
                        }
                    ?>
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="code" class="form-label">Kode</label>
                        <input type="text" class="form-control" name="code" value="<?= generate_string($permitted_chars, 6); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="code_patient" class="form-label">No KTP Pasien</label>
                        <input id="code_patient" type="text" class="form-control" name="code_patient">
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
                        <label for="tension" class="form-label">Tensi</label>
                        <input type="text" class="form-control" name="tension">
                    </div>
                    <div class="mb-3">
                        <label for="pulse" class="form-label">Denyut Nadi</label>
                        <input type="text" class="form-control" name="pulse">
                    </div>
                    <div class="mb-3">
                        <label for="temperature" class="form-label">Suhu Tubuh</label>
                        <input type="text" class="form-control" name="temperature">
                    </div>
                    <div class="mb-3">
                        <label for="breathing" class="form-label">Pernafasan</label>
                        <input type="text" class="form-control" name="breathing">
                    </div>
                    <div class="mb-3">
                        <label for="diagnosis" class="form-label">diagnosa</label>
                        <input type="text" class="form-control" name="diagnosis">
                    </div>
                    <div class="mb-3">
                        <label for="radio" class="form-label">Radiologi</label>
                        <input type="text" class="form-control" name="radio">
                    </div>
                    <div class="mb-3">
                        <label for="lab" class="form-label">Laboratorium</label>
                        <input type="text" class="form-control" name="lab">
                    </div>
                    
                </div>
                <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success" name="addPeriksa">Save</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<?= $this->endSection(); ?>
