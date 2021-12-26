<?php

$conn = conn();
$db   = new Database($conn);

$user_id = auth()->user->id;

$customers = $db->all('customers',['user_id'=>$user_id]);

if(request() == 'POST')
{
    $_POST['transactions']['user_id'] = $user_id;

    if(isset($_FILES['proof_file']) && $_FILES['proof_file']['name']){

        $target_dir = "uploads/";
        $target_file = $target_dir . strtotime("now") . "-" . $_FILES["proof_file"]["name"];

        if(move_uploaded_file($_FILES["proof_file"]["tmp_name"], $target_file)){

            $_POST['transactions']['proof_file'] = $target_file;

            $db->insert('transactions',$_POST['transactions']);
            
            set_flash_msg(['success'=>'Transaksi berhasil ditambahkan']);
            header('location:index.php?r=transactions/index');

        }else{
            set_flash_msg(['failed'=>'Transaksi gagal ditambahkan']);
            header('location:index.php?r=transactions/index');
        }
    }else{
        set_flash_msg(['failed'=>'Transaksi gagal ditambahkan']);
        header('location:index.php?r=transactions/index');
    }

}

return compact('customers');