<?php

$conn = conn();
$db   = new Database($conn);
$user_id = auth()->user->id;

$packages = $db->all('packages',['user_id'=>$user_id]);
$fields = $db->all('customer_fields',['user_id'=>auth()->user->id]);

if(request() == 'POST')
{
    $_POST['customers']['user_id'] = $user_id;

    $insert = $db->insert('customers',$_POST['customers']);

    foreach ($_POST['customer_metas'] as $key => $value) {
    
        $db->insert('customer_metas',[
            'user_id'=>$user_id,
            'customer_id'=>$insert->id,
            'field_name'=>$key,
            'field_value'=>$value,
        ]);
    }


    set_flash_msg(['success'=>'Kustomer berhasil ditambahkan']);
    header('location:index.php?r=customers/index');
}

return compact("packages","fields");