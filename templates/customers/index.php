<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Kustomer</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data Kustomer</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0 d-flex">
                        <div class="input-group mr-3" style="border-radius:20px; overflow:hidden;">
                            <div class="input-group-prepend">
                                <button class="btn btn-danger" id="copy-btn" type="button">Salin</button>
                            </div>
                            <input type="text" id="copy-text" readonly class="form-control" value="<?= $_SERVER['HTTP_HOST']  ?>/index.php?r=pendaftaran/index&id=<?=auth()->user->id?>">
                        </div>
                        <a href="index.php?r=customers/create" class="btn btn-secondary btn-round mr-2">Buat Kustomer</a>
                        <a href="index.php?r=customers/fields/index" class="btn btn-warning btn-round">Field Kustomer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Nama</th>
                                            <th>Paket</th>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <td><?=$data->name?></td>
                                            <td><?=$data->package?></td>
                                            <td>
                                                <a href="index.php?r=customers/view&id=<?=$data->id?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Lihat</a>
                                                <a href="index.php?r=customers/edit&id=<?=$data->id?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                <a href="index.php?r=customers/delete&id=<?=$data->id?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>

<script>
    $("#copy-btn").click(function(){

        navigator.clipboard.writeText($("#copy-text").val());

        $.notify({
            // options
            message: 'Berhasil menyalin!'
        },{
            // settings
            type: 'success'
        });
    })
</script>