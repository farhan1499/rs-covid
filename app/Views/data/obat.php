<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border-primary">
            <div class="card-header text-center">
                <h3>Data Obat</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="10px">No.</th>
                            <th scope="col" width="120px">Kode Obat</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col" width="130px">Jenis Obat</th>
                            <th scope="col" width="200px">Satuan</th>
                            <th scope="col" width="200px">Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add">
                    + Data Obat
                    </button>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($obat as $dg) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $dg['code']; ?></td>
                            <td><?= $dg['name']; ?></td>
                            <td><?= $dg['type']; ?></td>
                            <td><?= $dg['unit']; ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $dg['code']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $dg['code']; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                            
                        </tr>
                        <!-- ============================================================================================================================================================ -->
                        <div class="modal fade" id="edit<?= $dg['code']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/data/obatEdit/<?= $dg['code']; ?>" method="POST">
                                    <div class="modal-body">
                                        <?= csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="code" class="form-label">Kode</label>
                                            <input type="text" class="form-control" name="code" value="<?= $dg['code']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="name" value="<?= $dg['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Jenis Obat</label>
                                            <input type="text" class="form-control" name="type" value="<?= $dg['type']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="unit" class="form-label">Satuan Obat</label>
                                            <select name="unit" class="form-control">
                                                <option value="<?= $dg['unit']; ?>"><?= $dg['unit']; ?></option>
                                                <option value="pcs">pcs</option>
                                                <option value="ml">ml</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="addDrug">Save</button>
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================================================================================================================ -->
                        <div class="modal fade" id="delete<?= $dg['code']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data/obatDelete/<?= $dg['code']; ?>" method="POST">
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
      <form action="/data/obatSave" method="POST">
          <div class="modal-body">
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
                <input type="text" readonly class="form-control" name="code" value="<?= generate_string($permitted_chars, 6); ?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Jenis Obat</label>
                <input type="text" class="form-control" name="type">
            </div>
            <div class="mb-3">
                <label for="unit" class="form-label">Satuan</label>
                <select name="unit" class="form-select">
                    <option value=""></option>
                    <option value="pcs">pcs</option>
                    <option value="ml">ml</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="addDrug">Save</button>
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
<!-- ============================================================================================================================================================ -->
</div>
<?= $this->endSection(); ?>
