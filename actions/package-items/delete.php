<?php

$conn = conn();
$db   = new Database($conn);

$route = $db->single('package_items',[
    'id' => $_GET['id']
]);

$db->delete('package_items',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Item pada paket berhasil dihapus']);
header('location:index.php?r=packages/view&id='.$route->package_id);
die();