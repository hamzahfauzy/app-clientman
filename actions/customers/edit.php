<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('customers',[
    'id' => $_GET['id']
]);

$user_id = auth()->user->id;

$packages = $db->all('packages',['user_id'=>$user_id]);
$fields = $db->all('customer_fields',['user_id'=>auth()->user->id]);

if(request() == 'POST')
{

    $update = $db->update('customers',$_POST['customers'],[
        'id' => $_GET['id']
    ]);

    foreach ($_POST['customer_metas'] as $key => $value) {
    
        $db->update('customer_metas',[
            'field_value'=>$value,
        ],[
            'field_name'=>$key,
            'user_id'=>$user_id,
            'customer_id'=>$update->id,
        ]);
    }

    set_flash_msg(['success'=>'Paket berhasil diupdate']);
    header('location:index.php?r=customers/index');
}

return compact("data","packages","fields");