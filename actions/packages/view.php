<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('packages',[
    'id' => $_GET['id']
]);

$package_items = $db->all('package_items',[
    'package_id' => $data->id
]);

$success_msg = get_flash_msg('success');

if(request() == 'POST')
{
    $db->insert('package_items',$_POST['items']);

    set_flash_msg(['success'=>'Paket berhasil diupdate']);
    header('location:index.php?r=packages/view&id='.$_GET['id']);
}

return compact('data','package_items','success_msg');