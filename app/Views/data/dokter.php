<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border-primary">
            <div class="card-header text-center">
                <h3>Data Dokter</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="10px">No.</th>
                            <th scope="col" width="120px">Kode Dokter</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col" width="130px">Jenis Kelamin</th>
                            <th scope="col" width="200px">Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add">
                    + Data Dokter
                    </button>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($dokter as $d) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $d['code']; ?></td>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['gender']; ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $d['code']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $d['code']; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                            
                        </tr>
                        <!-- ============================================================================================================================================================ -->
                        <div class="modal fade" id="edit<?= $d['code']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/data/dokterEdit/<?= $d['code']; ?>" method="POST">
                                    <div class="modal-body">
                                        <?= csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="code" class="form-label">Kode</label>
                                            <input type="text" class="form-control" name="code" value="<?= $d['code']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="name" value="<?= $d['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Jenis Kelamin</label>
                                            <select name="gender" class="form-control">
                                                <option value="<?= $d['gender']; ?>"><?= $d['gender']; ?></option>
                                                <option value="Laki Laki">Laki Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="addDoctor">Save</button>
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================================================================================================================ -->
                        <div class="modal fade" id="delete<?= $d['code']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data/dokterDelete/<?= $d['code']; ?>" method="POST">
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
      <form action="/data/dokterSave" method="POST">
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
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-select">
                    <option value=""></option>
                    <option value="Laki Laki">Laki Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="addDoctor">Save</button>
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
<!-- ============================================================================================================================================================ -->
</div>
<?= $this->endSection(); ?>
