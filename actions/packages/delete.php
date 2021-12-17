<?php

$conn = conn();
$db   = new Database($conn);

$db->delete('packages',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Paket berhasil dihapus']);
header('location:index.php?r=packages/index');
die();