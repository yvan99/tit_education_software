<?php
require_once 'inc/server.php'; 
#student approval
$decryptedStudent = decryptId($_GET['student']);
$fetchStudent     = select('*','tit_student,course_stu,tit_courses',"tit_courses.cou_id=course_stu.cou_id AND tit_student.st_id=course_stu.st_id AND course_stu.stuco_id='$decryptedStudent'");
foreach ($fetchStudent as $rowStudent) {
    $stmail  = $rowStudent['st_email'];
    $stNames = $rowStudent['st_fullnames'];
    $applicationStatus = $rowStudent['stuco_status'];
    $courseApplied = $rowStudent['cou_title'];
}
if ($decryptedStudent) {
$studentClass->rejectCourseapply($decryptedStudent,$stmail,$stNames,$courseApplied,$appEmail,$appEmailPass);
header("location:appliedcourses");
}
else{
    die ('Request not found');
}

?>