<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$failed_msg = get_flash_msg('failed');

$db->query = "select transactions.*, customers.name from transactions join customers on customers.id=transactions.customer_id where transactions.user_id=".auth()->user->id;

$datas = $db->exec("all");

return compact('datas','success_msg','failed_msg');