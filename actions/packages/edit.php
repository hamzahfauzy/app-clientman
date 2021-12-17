<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('packages',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{

    $db->update('packages',$_POST['packages'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Paket berhasil diupdate']);
    header('location:index.php?r=packages/index');
}

return [
    'data' => $data
];