<?php

$conn = conn();
$db   = new Database($conn);

$user_id = auth()->user->id;

$data = $db->single('customers',[
    'id' => $_GET['id']
]);

$transactions = $db->all('transactions',[
    'user_id' => $user_id,
    'customer_id' => $_GET['id'],
]);

$metas = $db->all('customer_metas',[
    'user_id'=>auth()->user->id,
    'customer_id'=>$_GET['id'],
]);

$success_msg = get_flash_msg('success');

// if(request() == 'POST')
// {
//     $db->insert('transactions',$_POST['items']);

//     set_flash_msg(['success'=>'Paket berhasil diupdate']);
//     header('location:index.php?r=customers/view&id='.$_GET['id']);
// }

return compact('data','transactions','success_msg','metas');