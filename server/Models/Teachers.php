<?php
#TEACHERS MODEL
namespace Server\Models;

class Teachers
{
    private $table          = 'tit_teacher';
    private $courses        = 'tit_courses';
    private $teacherCourses = 'tit_teachcourse';
    private $appliedCourses = 'tit_courseapply';
    private $usersTable     = 'tit_users';
    private $studentCourses = 'course_stu';
    public function __construct()
    {
        $this->table;
        $this->courses;
    }
    public function generateTeachercode()
    {
        $codePrefix = 'TE';
        $randomNums = codeGenerator();
        $finalCode  = $codePrefix . $randomNums;
        return $finalCode;
    }
    public function applForcourse($names, $email, $dateOb, $gender, $courselect)
    {

        #CHECK IF THERE IS NO OTHER TEACHER
        $counTeachers = countAffectedRows($this->table, "tea_email='$email' LIMIT 1");
        $countinUsers = countAffectedRows($this->usersTable, "usr_email='$email' LIMIT 1");
        #CHECK IF THE COURSE IS NOT TAKEN
        $counTaken    = countAffectedRows($this->teacherCourses, "cou_id='$courselect'LIMIT 1");
        #CHECK IF THE APPLICATION IS NOT EXISTING
        $countApply   = countAffectedRows($this->appliedCourses, "couap_email='$email' OR cou_id='$courselect' LIMIT 1");
        if ($counTeachers || $countinUsers) {
            echo 'teacherexist';
        } elseif ($counTaken) {
            echo 'coursetaken';
        } elseif ($countApply) {
            echo 'applicationexist';
        } elseif (!$counTeachers && !$counTaken && !$countApply) {
            $data = ['id' => null, 'names' => $names, 'dob' => $dateOb, 'email' => $email, 'gender' => $gender, 'course' => $courselect, 'status' => 0];
            $datastracture = '`couap_id`, `couap_names`, `couap_dob`, `couap_email`, `ge_id`, `cou_id`, `couap_status`';
            $values = ':id,:names,:dob,:email,:gender,:course,:status';
            insert($this->appliedCourses, $datastracture, $values, $data);
            echo 'teachersaved';
        }
    }

    public function admiTeacher($appId, $appmail, $appNames, $appDob, $appCourse, $appGender, $appEmail, $appEmailPass,$geTeachercode)
    {

        $generatedCode = codeGenerator();
        $subject  = 'T-IT teacher Application';
        $message = 'Hello ' . $appNames . ' Welcome to T-IT  education software , we are pleased to announce to you that you have been successfully admitted as a teacher in T-IT school ' . ' <h2 style="color:#dc3545">' . $generatedCode . ' </h2> ' . ' Is your account verification code' . '<br>' . 'You will use it to access your account :' . 'Do not share any information provided with anyone and if you have any issues with your account do not hesitate to contact us.';
        $sendMail = mailing($appmail, $message, $subject, $appEmail, $appEmailPass);
        $hashCode = create_hash($generatedCode);

        # INSERT USER INTO USERS TABLE
        $data = ['id' => null, 'email' => $appmail, 'password' => $hashCode, 'role' => '3', 'status' => '1'];
        $datastracture = '`usr_id`, `usr_email`, `usr_password`, `typ_id`, `usr_status`';
        $values = ':id,:email,:password,:role,:status';
        insert($this->usersTable, $datastracture, $values, $data); 

        # INSERT USER INTO TEACHER TABLE
        $data1 = ['id' => null,'code'=>$geTeachercode, 'names' => $appNames, 'email' => $appmail, 'dob' => $appDob, 'gender' => $appGender, 'status' => 1];
        $datastracture1 = '`tea_id`, `tea_code`, `tea_names`, `tea_email`, `tea_dob`, `ge_id`, `tea_status`';
        $values1 = ':id,:code,:names,:email,:dob,:gender,:status';
        insert($this->table, $datastracture1, $values1, $data1);

        # COMBINE TEACHER AND COURSE IN ONE TABLE
        $data2 = ['id' => null,'code'=>$geTeachercode,'course'=>$appCourse,'status'=>1];
        $datastracture2 = '`teaco_id`, `tea_code`, `cou_id`, `teaco_date`, `teaco_status`';
        $values2 = ':id,:code,:course,NOW(),:status';
        insert($this->teacherCourses, $datastracture2, $values2, $data2);

        # DELETE THAT APPLICATION
        $deleteApplication = remove($this->appliedCourses, "couap_id='$appId'");
    }

    public function rejecTeacher($appId, $appmail, $appNames, $appDob, $appCourse, $appGender, $appEmail, $appEmailPass)
    {
        # FUNCTION TO REJECT TEACHER APPLICATION
        $subject = 'T-IT teaching application rejected';
        $message = 'Hello ' . $appNames . ' We are sorry to announce to you that your application an T-IT school has not been admitted due to large volume of applicants , we will inform you on new dates of application';
        $sendMail = mailing($appmail, $message, $subject, $appEmail, $appEmailPass);
        $deleteApplication = remove($this->appliedCourses, "couap_id='$appId'");
    }

    public function removeStudentfromcourse($decryptRequest){
        # DELETE STUDENT FROM COURSE
        remove($this->studentCourses, "st_id='$decryptRequest'");
    }
}
