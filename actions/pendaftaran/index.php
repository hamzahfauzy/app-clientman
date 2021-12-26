<?php

$conn = conn();
$db   = new Database($conn);
$user_id = $_GET['id'];

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

$packages = $db->all('packages',['user_id'=>$user_id]);
$fields = $db->all('customer_fields',['user_id'=>$user_id]);

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
    
    $target_dir = "uploads/";
    $target_file = $target_dir . strtotime("now") . "-" . $_FILES["proof_file"]["name"];

    move_uploaded_file($_FILES["proof_file"]["tmp_name"], $target_file);
    
    $_POST['transactions']['user_id'] = $user_id;
    $_POST['transactions']['customer_id'] = $insert->id;
    $_POST['transactions']['proof_file'] = $target_file;
        
    $db->insert('transactions',$_POST['transactions']);
    
    set_flash_msg(['success'=>'Pendaftaran berhasil']);
    header("location:index.php?r=pendaftaran/index&id=$user_id");

}

return compact("packages","fields","success_msg","error_msg");