<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('customer_fields',[
    'id' => $_GET['id']
]);

$user_id = auth()->user->id;

if(request() == 'POST')
{

    $db->update('customer_fields',$_POST['customer_fields'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Field Kustomer berhasil diupdate']);
    header('location:index.php?r=customers/fields/index');
}

return compact("data");