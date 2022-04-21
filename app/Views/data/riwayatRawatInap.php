
<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border-primary">
            <div class="card-header text-center">
                <h3>Data Rawat Inap</h3>
            </div>
            <div class="card-body">
                <a href='<?= base_url(); ?>/data/rawat' class="btn btn-success mb-4">Kembali</a>
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="10px">No.</th>
                            <th scope="col" width="150px">KTP</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Tanggal Keluar</th>
                            <th scope="col" width="110px">Lama Inap</th>
                            <th scope="col" width="80px">Perawat</th>
                            <th scope="col" width="80px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($riwayat as $r => $value) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $value->code; ?></td>
                            <td><?= $value->patient ?></td>
                            <td><?= $value->in ?></td>
                            <td><?= $value->out ?></td>
                            <td><?= $value->range ?></td>
                            <td><?= $value->nurse ?></td>
                            <td><?= $value->status ?></td>
                        </tr>
                        <!-- ============================================================================================================================================================ -->
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>

<?= $this->endSection(); ?>
