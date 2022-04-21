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
                <a href='<?= base_url(); ?>/data/riwayatRawatInap' class="btn btn-success mb-4">Riwayat Rawat Inap</a>
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="10px">No.</th>
                            <th scope="col" width="10px">No. Inap</th>
                            <th scope="col" width="150px">KTP</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Tanggal Keluar</th>
                            <th scope="col" width="110px">Lama Inap</th>
                            <th scope="col" width="80px">Perawat</th>
                            <th scope="col" width="80px">Status</th>
                            <?php if(in_groups('admin')) : ?>
                            <th scope="col" width="100px">Pengaturan</th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($rawat as $r => $value) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $value->code; ?></td>
                            <td><?= $value->code_patient; ?></td>
                            <td><?= $value->patient ?></td>
                            <td><?= $value->in ?></td>
                            <td><?= $value->out ?></td>
                            <td><?= $value->range ?></td>
                            <td><?= $value->nurse ?></td>
                            <td><?= $value->status ?></td>
                            <?php if(in_groups('admin')) : ?>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $value->code; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $value->code; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                            <?php endif; ?>
                            
                        </tr>
                        <!-- ============================================================================================================================================================ -->
                        <div class="modal fade" id="edit<?= $value->code; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/data/rawatEdit/<?= $value->code ?>" method="POST">
                                    <div class="modal-body">
                                        <?= csrf_field(); ?>
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" name="code" value="<?= $value->code; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" name="post" value="1" readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="addPasien">Save</button>
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================================================================================================================ -->
                        <div class="modal fade" id="delete<?= $value->code; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data/rawatDelete/<?= $value->code ?>" method="POST">
                                        <div class="modal-body">
                                            <?= csrf_field(); ?>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Anda Yakin?</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
