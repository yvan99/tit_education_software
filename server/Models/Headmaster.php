<?php
# HEADMASTER MODEL
namespace Server\Models;

class Headmaster
{

    private $table = 'tit_users';
    private $courseTable = 'tit_courses';

    public function __construct()
    {
        $this->table;
        $this->courseTable;
    }
    public function courseCode()
    {
        $prefix = 'CO';
        $generateCode = codeGenerator();
        $finalCourse = $prefix . $generateCode;
        return $finalCourse;
    }
    public function addCourse($courseCode, $courseTitlt)
    {

        #Check redudancy
        $checkCourse = countAffectedRows($this->courseTable, "cou_title='$courseTitlt' OR cou_code='$courseCode' LIMIT 1");
        if ($checkCourse) {
            die('course already registered');
        } elseif (!$checkCourse) {
            $data = ['id' => null, 'title' => $courseTitlt, 'code' => $courseCode, 'status' => 1];
            $datastracture = '`cou_id`, `cou_title`, `cou_code`, `cou_date`, `cou_status`';
            $values = ':id,:title,:code,NOW(),:status';
            insert($this->courseTable, $datastracture, $values, $data);
        }
    }

    public function userLogin($titUsermail, $titUserpass)
    {

        $countRows = countAffectedRows($this->table, "usr_email='$titUsermail' LIMIT 1");
        if ($countRows) {
            # If the user is found... Please remember to add other fields you want to fetch
            $sql = select('*', 'tit_users,tit_usertype', "tit_users.typ_id=tit_usertype.typ_id AND tit_users.usr_email='$titUsermail'");
            $hash = null;
            foreach ($sql as $row)  $hash = $row['usr_password'];
            foreach ($sql as $adminInfo) {
            }
            $getUserId   = $adminInfo['usr_id'];
            $getUsertype = $adminInfo['typ_id'];
            $log = verify_password($titUserpass, $hash);
            ## INITIALIZE SESSIONS WITH USER ID
            session_start();
            $_SESSION['t-ituserSessions'] = $row['usr_email'];
            if ($log && $getUsertype == 3) {
                echo "lecture";
            } elseif ($log && $getUsertype == 4) {

                echo "student";
            } elseif ($log && $getUsertype == 6) {

                echo "headmaster";
            } else {
                echo "notfound"; // wrong details 
            }
        } else {
           die ('notfound');
        }
    }
}
