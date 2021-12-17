<?php

$conn = conn();
$db   = new Database($conn);

$user_id = auth()->user->id;

if(request() == 'POST')
{
    $_POST['customer_fields']['user_id'] = $user_id;

    $db->insert('customer_fields',$_POST['customer_fields']);

    set_flash_msg(['success'=>'Field Kustomer berhasil ditambahkan']);
    header('location:index.php?r=customers/fields/index');
}