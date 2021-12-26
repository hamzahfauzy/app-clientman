<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Edit Transaksi</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data transaksi</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="index.php?r=transactions/index" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Kustomer</label>
                                    <select name="transactions[customer_id]" class="form-control">
                                        <option value="" selected readonly>- Pilih Kustomer -</option>
                                        <?php foreach($customers as $customer): ?>
                                            <option value="<?=$customer->id?>" <?=$data->customer_id == $customer->id ? 'selected' : ''?>><?=$customer->name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Total</label>
                                    <input type="text" name="transactions[total]" value="<?=$data->total?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Catatan</label>
                                    <input type="text" name="transactions[note]" value="<?=$data->note?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Bukti</label>
                                    <input type="file" name="proof_file" value="<?=$data->proof_file?>" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>