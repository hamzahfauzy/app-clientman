<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$user_id = auth()->user->id;

$db->query = "select customers.*,packages.name as package from customers join packages on packages.id = customers.package_id where customers.user_id='$user_id'";
$datas = $db->exec("all");

return compact('datas','success_msg');