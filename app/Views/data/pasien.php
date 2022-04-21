<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border-primary">
            <div class="card-header text-center">
                <h3>Data Pasien</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="10px">No.</th>
                            <th scope="col" width="150px">KTP</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tanggal Lahir</th>
                            <?php if(in_groups('admin')) : ?>
                            <th scope="col" width="200px">Pengaturan</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($pasien as $psn) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $psn['code']; ?></td>
                            <td><?= $psn['name']; ?></td>
                            <td><?= $psn['gender']; ?></td>
                            <td><?= $psn['born']; ?></td>
                            <?php if(in_groups('admin')) : ?>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $psn['code']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $psn['code']; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                            <?php endif; ?>
                            
                        </tr>
                        <!-- ============================================================================================================================================================ -->
                        <div class="modal fade" id="edit<?= $psn['code']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/data/pasienEdit/<?= $psn['code']; ?>" method="POST">
                                    <div class="modal-body">
                                        <?= csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="code" class="form-label">Kode</label>
                                            <input type="text" class="form-control" name="code" value="<?= $psn['code']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="name" value="<?= $psn['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="gender" value="<?= $psn['gender']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="born" class="form-label">Tanggal Lahir</label>
                                            <input type="text" class="form-control" name="born" value="<?= $psn['born']; ?>">
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
                        <div class="modal fade" id="delete<?= $psn['code']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data/pasienDelete/<?= $psn['code']; ?>" method="POST">
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

<!-- ============================================================================================================ -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/data/pasienSave" method="POST">
          <div class="modal-body">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="code" class="form-label">Kode</label>
                <input type="text" class="form-control" name="code">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name">
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="addPerawat">Save</button>
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
<!-- ============================================================================================================================================================ -->
</div>
<?= $this->endSection(); ?>
