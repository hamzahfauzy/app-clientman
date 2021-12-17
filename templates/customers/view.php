<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail Kustomer : <?=$data->name?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data Kustomer</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="index.php?r=customers/index" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card card-body">
                        <div class="table-responsive table-hover table-sales">
                            <table class="table" style="max-width:500px">
                                <tbody>
                                    <?php foreach($metas as $meta): ?>
                                    <tr>
                                        <th>
                                            <?=$meta->field_name?>
                                        </th>
                                        <td>:</td>
                                        <td>
                                            <?=$meta->field_value?>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Transaksi</h2>
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Total</th>
                                            <th>Catatan</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(empty($transactions)): ?>
                                        <tr>
                                            <td colspan="4" style="text-align:center"><i>Tidak ada data</i></td>
                                        </tr>
                                        <?php endif ?>
                                        <?php foreach($transactions as $index => $item): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <td>
                                                <?=$item->total?>
                                            </td>
                                            <td>
                                                <?=$item->note?>
                                            </td>
                                            <td>
                                                <a href="index.php?r=package-items/delete&id=<?=$item->id?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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