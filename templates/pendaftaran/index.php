<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Masuk</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/main-logo.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
</head>
<body style="min-height:auto;">
	<div class="container">
        <div class="row mt-4">
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
                <?php if($success_msg): ?>
                <div class="alert alert-success"><?=$success_msg?></div>
                <?php endif ?>

                <?php if($error_msg): ?>
                <div class="alert alert-danger"><?=$error_msg?></div>
                <?php endif ?>

                <div class="card full-height">
                    <div class="card-body">
                        <center>
                            <img src="assets/img/main-logo.png" width="150px" height="100px" alt="logo" style="object-fit:cover;">
                        </center>
                        <div class="card-title text-center">Formulir Pendaftaran</div>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="customers[name]" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Paket</label>
                                <select name="customers[package_id]" class="form-control">
                                    <option value="" selected readonly>- Pilih Paket -</option>
                                    <?php foreach($packages as $package): ?>
                                        <option value="<?=$package->id?>"><?=$package->name?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php foreach($fields as $field): ?>
                                <div class="form-group">
                                    <label for=""><?=$field->name?></label>
                                    <input type="text" name="customer_metas[<?=$field->name?>]" class="form-control" required>
                                </div>
                            <?php endforeach ?>

                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="text" name="transactions[total]" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <input type="text" name="transactions[note]" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Bukti</label>
                                <input type="file" name="proof_file" class="form-control" required>
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
</body>
</html>