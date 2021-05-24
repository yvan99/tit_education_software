<?php 
session_start();
require_once '../../server/Config/initialise.php';
if (!isset($_SESSION['t-ituserSessions'])) {
    header("location:logout");
}
$decryptSession = $_SESSION['t-ituserSessions'];
$studenterFetcher = select('*','tit_student',"st_status='1' AND st_email='$decryptSession'");
if (!$studenterFetcher) {
    header("location:logout"); 
}
foreach ($studenterFetcher as $rowStudent) {
    $studentNames = $rowStudent['st_fullnames'];
    $studentMail  = $rowStudent['st_email'];
    $studentId    = $rowStudent['st_id'];
    $studentStatus= $rowStudent['st_status'];
 }

 if ($studentStatus == 0) {
     # code...
     header("location:logout");
 }

 $myCourses = countAffectedRows('tit_student,course_stu',"tit_student.st_id=course_stu.st_id AND tit_student.st_id='$studentId' AND course_stu.stuco_status='1'");
