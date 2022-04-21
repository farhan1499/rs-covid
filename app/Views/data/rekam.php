<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border-primary">
            <div class="card-header text-center">
                <h3>Data Rekam Medis</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="10px">No.</th>
                            <th scope="col" width="150px">No. Rawat Inap</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($rekam as $r) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $r['code']; ?></td>
                            <td><?= $r['name']; ?></td>
                            <td><?= $r['doctor']; ?></td>
                            <td><?= $r['complaint']; ?></td>
                            <td><?= $r['diagnosis']; ?></td>
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
