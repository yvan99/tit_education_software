<?php
require_once 'inc/server.php'; 
#student approval
$decryptedApplication = decryptId($_GET['teacher']);
$fetchApplication = select('*','tit_courseapply',"couap_id='$decryptedApplication'");
foreach ($fetchApplication as $rowApplication) {
    $appId    = $rowApplication['couap_id'];
    $appmail  = $rowApplication['couap_email'];
    $appNames = $rowApplication['couap_names'];
    $appDob   = $rowApplication['couap_dob'];
    $appCourse= $rowApplication['cou_id'];
    $appGender= $rowApplication['ge_id'];
}
if ($decryptedApplication) {
$teacherClass->admiTeacher($appId,$appmail,$appNames,$appDob,$appCourse,$appGender,$appEmail,$appEmailPass,$geTeachercode);
header("location:teacherapplications");
}
else{
    die ('Request not found');
}

?>