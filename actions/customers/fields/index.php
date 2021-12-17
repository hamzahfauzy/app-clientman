<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$user_id = auth()->user->id;

$datas = $db->all('customer_fields',['user_id'=>auth()->user->id]);

return compact('datas','success_msg');