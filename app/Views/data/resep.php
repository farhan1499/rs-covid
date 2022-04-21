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
                            <th scope="col">Kode Resep</th>
                            <th scope="col">Nama Resep</th>
                            <th scope="col" width="200px">Tanggal</th>
                            <th scope="col" width="200px">Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add">
                    + Resep
                    </button>
                        <tr>
                            <?php $i=1; ?>
                            <?php foreach($resep as $dg) : ?>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td><?= $dg['id_recipe']; ?></td>
                            <td><?= $dg['name_recipe'] ?></td>
                            <td><?= $dg['created_at']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url(); ?>/data/mresep/<?= $dg['id_recipe']; ?>" class="btn btn-primary"><i class="fa-solid fa-info"></i></a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $dg['id_recipe']; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                            
                        </tr>
                        
                        <div class="modal fade" id="delete<?= $dg['id_recipe']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data/resepDelete/<?= $dg['id_recipe']; ?>" method="POST">
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
        
      <form action="/data/recipe1Save" method="POST">
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
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="code" class="form-label">Kode Resep</label>
                    <input type="text" readonly class="form-control" name="code" value="<?= generate_string($permitted_chars, 6); ?>">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="nama" class="form-label">Nama Resep</label>
                    <input type="text" class="form-control" name="nama">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="obat" class="form-label">Nama Obat</label>
                    <select name="obat[]" class="form-select" id="nurse">
                        <option disabled selected>==Pilih==</option>
                        <?php foreach($model_obat->findAll() as $key) : ?>
                            <option value="<?= $key["code"]; ?>"><?= ucfirst($key["name"]); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="qty" class="form-label">Quantiti</label>
                    <input type="number" class="form-control" name="qty[]" >
                </div>
            </div>

            
            
            <div class="paste-new-forms"></div>

          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="add">Save</button>
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">Tambah Obat</a>
          </div>
      </form>
    </div>
  </div>
<!-- ============================================================================================================================================================ -->
</div>

<script>

$(document).ready(function () {

    $(document).on('click', '.remove-btn', function () {
        $(this).closest('.main-form').remove();
    });

    $(document).on('click', '.add-more-form', function () {
        $('.paste-new-forms').append('<div class="row main-form">\
                <div class="mb-3 col-md-6">\
                    <label for="obat" class="form-label">Nama Obat</label>\
                    <select name="obat[]" class="form-select" id="nurse">\
                        <option disabled selected>==Pilih==</option>\
                        <?php foreach($model_obat->findAll() as $key) : ?>\
                            <option value="<?= $key["code"]; ?>"><?= ucfirst($key["name"]); ?></option>\
                        <?php endforeach; ?>\
                    </select>\
                </div>\
                <div class="mb-3 col-md-3">\
                    <label for="qty" class="form-label">Quantiti</label>\
                    <input type="number" class="form-control" name="qty[]" >\
                </div>\
                <div class="mb-3 col-md-3">\
                    <button type="button" class="remove-btn btn btn-danger mt-4">Remove</button>\
                </div>\
            </div>');
    });

});

</script>
<?= $this->endSection(); ?>
