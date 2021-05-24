<?php 
require_once 'inc/server.php';
@$decryptApprove = decryptId($_GET['activate']);
@$decryptDisable = decryptId($_GET['deactivate']);
if ($decryptApprove) {
    update('tit_student', 'st_status=:stat', "st_id=:userId", ['stat' => '1', 'userId' => $decryptApprove]);
    header("location:studentlist");
}
elseif ($decryptDisable) {
    update('tit_student', 'st_status=:stat', "st_id=:userId", ['stat' => '0', 'userId' => $decryptDisable]);
    header("location:studentlist");
}
?>