<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'generalinc/csslogin.php' ?>
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
                        <h3>Get connected now</h3>
                        <p>Enter your account credentials to continue</p>
                        <form method="POST" id="userLoginform">
                            <div id="errorLogin"></div>
                            <input class="form-control" type="email" name="tit_email" placeholder="E-mail Address">
                            <input class="form-control" type="password" name="tit_password" placeholder="Password">
                            <div class="form-button">
                                <button id="saveLogin" type="submit" name="Loginuser" class="ibtn">Login</button> | or <a href="../">Back to home</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/login/js/jquery.min.js"></script>
    <script src="../inc/js/validation.min.js"></script>
    <script src="generalinc/js/login.js"></script>
</body>

</html>