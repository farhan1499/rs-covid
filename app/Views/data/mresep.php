<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="card border-primary">
            <div class="card-header text-center">
                <h3>Data Resep</h3>
            </div>
            <div class="card-body">
            <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="10px">No.</th>
                            <th scope="col">Kode Obat</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($resep as $dg) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $dg['code_drug']; ?></td>
                            <td><?= $model_obat->getObat($dg['code_drug'])['name'] ?></td>
                            <td><?= $dg['qty'] ?> <?= $model_obat->getObat($dg['code_drug'])['unit'] ?> </td>
                            
                        </tr>
                        
                        
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
      <form action="/data/recipe1Save" method="POST">
          <div class="modal-body">
            <?php
            
            ?>
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="code" class="form-label">Kode Resep</label>
                <input type="text" readonly class="form-control" name="code" >
            </div>
            <div class="mb-3">
                <label for="obat" class="form-label">Nama Obat</label>
                <select name="obat" class="form-select" id="obat">
                    <option disabled selected>==Pilih==</option>
                    <?php foreach($model_obat->findAll() as $key) : ?>
                        <option value="<?= $key["code"]; ?>"><?= ucfirst($key["name"]); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="add">Save</button>
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
<!-- ============================================================================================================================================================ -->
</div>
<?= $this->endSection(); ?>
