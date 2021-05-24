<?php 
session_start();
require '../../server/Config/initialise.php';
if (!isset($_SESSION['t-ituserSessions'])) {
    header("location:logout");
}

$countPendingstudent = countAffectedRows('tit_student',"st_status='9'");
$approvedPendingstudent = countAffectedRows('tit_student',"st_status='1'");
$countCourses = countAffectedRows('tit_courses',"cou_status='1'");
$countTeachers = countAffectedRows('tit_teacher',"tea_status='1'");
$teacherPending = countAffectedRows('tit_courseapply',"couap_status='0'");


?>