<?php

$conn = conn();
$db   = new Database($conn);

$db->delete('customer_fields',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Field Kustomer berhasil dihapus']);
header('location:index.php?r=customers/fields/index');
die();