<?php
require_once 'inc/server.php';
@$decryptApprove = decryptId($_GET['activate']);
@$decryptDisable = decryptId($_GET['deactivate']);
if ($decryptApprove) {
    update('tit_teacher', 'tea_status=:stat', "tea_id=:userId", ['stat' => '1', 'userId' => $decryptApprove]);
    header("location:teacherslist");
} elseif ($decryptDisable) {
    update('tit_teacher', 'tea_status=:stat', "tea_id=:userId", ['stat' => '0', 'userId' => $decryptDisable]);
    header("location:teacherslist");
}
