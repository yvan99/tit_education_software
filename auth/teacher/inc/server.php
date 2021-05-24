<?php 
session_start();
require_once '../../server/Config/initialise.php';
if (!isset($_SESSION['t-ituserSessions'])) {
    header("location:logout");
}
$decryptSession = $_SESSION['t-ituserSessions'];
$teacherFetcher = select('*','tit_teacher',"tea_status='1' AND tea_email='$decryptSession'");
if (!$teacherFetcher) {
    header("location:logout");
}
foreach ($teacherFetcher as $rowTeacher) {
    $teachNames = $rowTeacher['tea_names'];
    $teachMail  = $rowTeacher['tea_email'];
    $teachId    = $rowTeacher['tea_id'];
    $teachCode  = $rowTeacher['tea_code'];
    $teachStatus= $rowTeacher['tea_status'];
 }
 if ($teachStatus == 0) {
    # code...
    header("location:logout");
}
 $teacherCourses = countAffectedRows('tit_gender,tit_courses,tit_teachcourse,tit_teacher', "tit_gender.ge_id=tit_teacher.ge_id AND tit_courses.cou_id=tit_teachcourse.cou_id AND tit_teacher.tea_code=tit_teachcourse.tea_code and tit_teachcourse.tea_code='$teachCode'");
 $teacherStudents= countAffectedRows('tit_student,course_stu,tit_teacher,tit_courses,tit_teachcourse',"tit_student.st_id=course_stu.st_id AND course_stu.cou_id = tit_courses.cou_id AND course_stu.cou_id = tit_teachcourse.cou_id AND tit_teachcourse.tea_code=tit_teacher.tea_code and course_stu.stuco_status='1'");