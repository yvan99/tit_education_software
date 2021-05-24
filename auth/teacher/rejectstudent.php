<?php
# REMOVE STUDENT FROM YOUR COURSE
require_once 'inc/server.php';
$decryptRequest = decryptId($_GET['student']);
$courseRequest  = $_GET['request'];
$teacherClass->removeStudentfromcourse($decryptRequest);
$redirectUrl = 'location:studentcourses?requestCourse=' . $courseRequest;
header($redirectUrl);
