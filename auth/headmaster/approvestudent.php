<?php
require_once 'inc/server.php'; 
#student approval
$decryptedStudent = decryptId($_GET['student']);
$fetchStudent     = select('*','tit_student',"st_id='$decryptedStudent'");
foreach ($fetchStudent as $rowStudent) {
    $stId    = $rowStudent['st_id'];
    $stmail  = $rowStudent['st_email'];
    $stNames = $rowStudent['st_fullnames'];
    $stStatus= $rowStudent['st_status'];
}
if ($decryptedStudent) {
$studentClass->admitStudent($stId,$stmail,$stNames,$stStatus,$appEmail,$appEmailPass);
header("location:studentApplication");
}
else{
    die ('Request not found');
}

?>