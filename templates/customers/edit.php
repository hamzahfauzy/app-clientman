<?php load_templates('layouts/top') ; 
$conn = conn();
$db   = new Database($conn);

?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Edit Kustomer : <?=$data->name?></h2>
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
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="customers[name]" class="form-control" value="<?=$data->name?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Paket</label>
                                    <select name="customers[package_id]" class="form-control">
                                        <option value="" selected readonly>- Pilih Paket -</option>
                                        <?php foreach($packages as $package): ?>
                                            <option value="<?=$package->id?>" <?=$package->id == $data->package_id ? "selected" : ""?>><?=$package->name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?php foreach($fields as $field): 
                                    
                                    $meta = $db->single('customer_metas',[
                                        'field_name' => $field->name,
                                        'user_id'=>$data->user_id,
                                        'customer_id'=>$data->id,
                                    ]);    
                                ?>
                                    <div class="form-group">
                                        <label for=""><?=$field->name?></label>
                                        <input type="text" name="customer_metas[<?=$meta->field_name?>]" class="form-control" value="<?=$meta->field_value ?? ''?>" required>
                                    </div>
                                <?php endforeach ?>
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