<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once '../server/Config/initialise.php';
    require_once 'generalinc/csslogin.php' ?>
    <title>TIS :: SIGN IN</title>
</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Connect with your account.</h3>
                    <p>TIS is a school management software which combines more school related activities in one powerful and reliable tool which helps in management of school related activities anytime ,anywhere<br>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Get started on T-IT school</h3>
                        <form method="POST" id="studentRegister">
                            <div id="errorStudentsignup"></div>
                            <input class="form-control"  type="text" name="tit_names" placeholder="Full names">
                            <input class="form-control" type="email" name="tit_email" placeholder="E-mail Address">
                            <input class="form-control" type="date" max="2009-12-31" name="tit_dob" placeholder="Date of birth">
                            <div class="form-group">
                                <select name="tit_sex" class="form-control">
                                    <option selected disabled>Choose gender</option>
                                    <?php

                                    #select School Manager type
                                    $genderSelector = select('*', 'tit_gender', "ge_status='1'");
                                    foreach ($genderSelector as $instRow) {
                                        $genderId   = $instRow['ge_id'];
                                        $genderName = $instRow['ge_name'];


                                        echo "<option value=" . $genderId . ">" . $genderName; ?></option>
                                        ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <input class="form-control" type="text" name="tit_address" placeholder="Your address">
                            <div class="form-button">
                                <button id="saveLogin" type="submit" name="Loginuser" class="ibtn">Apply Now</button> | or <a href="./">Sign in here</a> | <a href="../">Back home</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/login/js/jquery.min.js"></script>
    <script src="../inc/js/validation.min.js"></script>
    <script src="generalinc/js/newStudent.js"></script>
</body>

</html>