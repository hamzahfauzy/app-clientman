<?php

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $_POST['packages']['user_id'] = auth()->user->id;

    $db->insert('packages',$_POST['packages']);

    set_flash_msg(['success'=>'Paket berhasil ditambahkan']);
    header('location:index.php?r=packages/index');
}