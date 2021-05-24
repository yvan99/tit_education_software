<?php
# STUDENT MODEL
namespace Server\Models;

class Student
{

    // Database connectors
    private $conn;
    private $table = 'tit_student';
    private $usersTable = 'tit_users';
    private $studentCourses = 'course_stu';


    // constructor with Database Params

    public function __construct()
    {
        $this->conn;
        $this->table;
        $this->studentCourses;
    }
    public function createStudent($names, $email, $dateOb, $gender, $address)
    {

        $countStudent = countAffectedRows($this->table, "st_email='$email' LIMIT 1");
        $countUsers   = countAffectedRows($this->usersTable, "usr_email='$email' LIMIT 1");
        //return $countStudent;
        if ($countStudent || $countUsers) {
            die('taken');
        } elseif (!$countStudent) {
            $data = ['id' => null, 'names' => $names, 'email' => $email, 'dob' => $dateOb, 'gender' => $gender, 'address' => $address, 'status' => 9];
            $datastracture = '`st_id`, `st_fullnames`, `st_email`, `st_dob`, `ge_id`, `st_address`, `st_status`';
            $values = ':id,:names,:email,:dob,:gender,:address,:status';
            insert($this->table, $datastracture, $values, $data);
            die ('studentsaved');
        }
    }

    public function admitStudent($stId, $stmail, $stNames, $stStatus, $appEmail, $appEmailPass)
    {
        $generatedCode = codeGenerator();
        $subject  = 'T-IT Admission';
        $message = 'Hello ' . $stNames . ' Welcome to T-IT  education software , we are pleased to announce to you that you have been successfully admitted ' . ' <h2 style="color:#dc3545">' . $generatedCode . ' </h2> ' . ' Is your account verification code' . '<br>' . 'You will use it to access your account :' . 'Do not share any information provided with anyone and if you have any issues with your account do not hesitate to contact us.';
        $sendMail = mailing($stmail, $message, $subject, $appEmail, $appEmailPass);
        $hashCode = create_hash($generatedCode);
        update($this->table, 'st_status=:stat', "st_id=:userId", ['stat' => '1', 'userId' => $stId]);
        $data = ['id' => null, 'email' => $stmail, 'password' => $hashCode, 'role' => '4', 'status' => '1'];
        $datastracture = '`usr_id`, `usr_email`, `usr_password`, `typ_id`, `usr_status`';
        $values = ':id,:email,:password,:role,:status';
        insert($this->usersTable, $datastracture, $values, $data);
    }
    public function rejectStudent($stId, $stmail, $stnames, $appEmail, $appEmailPass)
    {

        $subject = 'T-IT admission rejected';
        $message = 'Hello ' . $stnames . ' We are sorry to announce to you that your application an T-IT school has not been admitted due to large volume of applicants , we will inform you on new dates of application';
        $sendMail = mailing($stmail, $message, $subject, $appEmail, $appEmailPass);
        $deleteApplication = remove($this->table, "st_id='$stId'");
    }

    public function applyCourse($course, $studentId)
    {
        # CHECK REDUDANCY
        $countIncourses = countAffectedRows($this->studentCourses, "cou_id='$course' AND st_id='$studentId' LIMIT 1");
        if ($countIncourses) {
            die('course already applied');
        } elseif (!$countIncourses) {
            $data = ['id' => null, 'student' => $studentId, 'course' => $course, 'status' => '0'];
            $datastracture = '`stuco_id`, `st_id`, `cou_id`, `stuco_dateon`, `stuco_status`';
            $values = ':id,:student,:course,NOW(),:status';
            insert($this->studentCourses, $datastracture, $values, $data);
        }
    }

    public function approveCourseapply($decryptedStudent, $stmail, $stNames, $courseApplied, $appEmail, $appEmailPass)
    {
        $subject  = 'T-IT Course application';
        $message = 'Hello ' . $stNames . ' We are pleased to announce to you that your application to ' . ' <h2 style="color:#dc3545">' . $courseApplied . ' </h2> ' . ' Has been successfully confirmed , and you have been enroled to the course' . '<br>'  . 'We will communicate to you when you will start your studies.';
        $sendMail = mailing($stmail, $message, $subject, $appEmail, $appEmailPass);
        update($this->studentCourses, 'stuco_status=:stat', "stuco_id=:userId", ['stat' => '1', 'userId' => $decryptedStudent]);
    }

    public function rejectCourseapply($decryptedStudent, $stmail, $stNames, $courseApplied, $appEmail, $appEmailPass)
    {
        $subject  = 'T-IT Course application rejected';
        $message = 'Hello ' . $stNames . ' We are sorry to announce to you that your application to ' . ' <h2 style="color:#dc3545">' . $courseApplied . ' </h2> ' . ' course was not confirmed due to a high volume of the course request' . '<br>'  . 'please try to apply another available course and we will communicate to you soon if the course is available.';
        $sendMail = mailing($stmail, $message, $subject, $appEmail, $appEmailPass);
        remove($this->studentCourses, "stuco_id='$decryptedStudent'");
    }
}
