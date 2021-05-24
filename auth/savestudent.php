<?php 
require_once '../server/Config/initialise.php';
if (isset($_POST['Loginuser'])) {
    # GET FORM DETAILS
$names = escape($_POST['tit_names']);
$email = escape($_POST['tit_email']);
$dateOb= escape($_POST['tit_dob']);
$gender= escape($_POST['tit_sex']);
$address=escape($_POST['tit_address']);

# CHECK FOR EMPTY FIELDS

if (empty($names)||empty($email)||empty($dateOb)||empty($gender)||empty($address)) {
    die('emptyfields');
}
else {
    $studentClass->createStudent($names, $email, $dateOb, $gender, $address);
}

}
