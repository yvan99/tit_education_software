<?php 
# T-IT MEMBERS LOGIN SCRIPT
require_once '../server/Config/initialise.php';
if (isset($_POST['Loginuser'])) {
    $titUsermail = escape($_POST['tit_email']);
    $titUserpass = escape($_POST['tit_password']);

    if (empty($titUsermail) || empty($titUserpass)) {
        die('emptyfields');
    }
    else {
        # INITIATE VARIABLES TO THE LOGIN FUNCTION
        $headmasterClass->userLogin($titUsermail,$titUserpass);
    }
}
?>