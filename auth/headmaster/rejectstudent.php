<?php
require_once 'inc/server.php'; 
#student approval
$decryptedStudent = decryptId($_GET['student']);
$fetchStudent     = select('st_id,st_email,st_fullnames','tit_student',"st_id='$decryptedStudent'");
foreach ($fetchStudent as $rowStudent) {
    $stId    = $rowStudent['st_id'];
    $stmail  = $rowStudent['st_email'];
    $stnames = $rowStudent['st_fullnames'];

}
if ($decryptedStudent) {
$studentClass->rejectStudent($stId,$stmail,$stnames,$appEmail,$appEmailPass);
header("location:studentApplication");
}
else{
    die ('Request not found');
}
?>