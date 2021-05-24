<?php
// PROJECT INITIALISATION FILE
require_once __DIR__ . "/../bootstrap.php";

$appName    = getenv("APP_NAME");
$appAuthor  = getenv("APP_AUTHOR");
$appDescribe = getenv("APP_DESCRIPTION");
$appEmail   = getenv("EMAIL_USER");
$appEmailPass = getenv("EMAIL_PASS");
$todaDate   = date("Y-m-d H:i:s");
$today2     = date('d/m/Y');
$todays     = date('Ymd');
$dateSt     = date('D , d F Y', strtotime($todays));

# CALLING ALL CLASSES
use Server\Controllers\Database;
use Server\Models\Student;
use Server\Models\Headmaster;
use Server\Models\Teachers;


## GET LOGGED IN USER INFO
$database = new Database();
$db = $database->connect();
$studentClass = new Student();
$headmasterClass = new Headmaster();
$teacherClass = new Teachers();

$geTeachercode = $teacherClass->generateTeachercode();
