<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border-primary">
            <div class="card-header text-center">
                <h3>Data Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="10px">No.</th>
                            <th scope="col" width="10px">Kode Periksa</th>
                            <th scope="col" width="150px">KTP</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Tensi</th>
                            <th scope="col">Denyut Nadi</th>
                            <th scope="col">Suhu Tubuh</th>
                            <th scope="col">Pernafasan</th>
                            <th scope="col">Diagnosa</th>
                            <th scope="col">Radiologi</th>
                            <th scope="col">Laboratorium</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($periksa as $p) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $p['code']; ?></td>
                            <td><?= $p['code_patient']; ?></td>
                            <td><?= $p['name']; ?></td>
                            <td><?= $p['doctor']; ?></td>
                            <td><?= $p['complaint']; ?></td>
                            <td><?= $p['tension']; ?></td>
                            <td><?= $p['pulse']; ?></td>
                            <td><?= $p['temperature']; ?></td>
                            <td><?= $p['breathing']; ?></td>
                            <td><?= $p['diagnosis']; ?></td>
                            <td><?= $p['radio']; ?></td>
                            <td><?= $p['lab']; ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>
<?= $this->endSection(); ?>
