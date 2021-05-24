$("document").ready(function () {
  /* validation */
  $("#userLoginform").validate({
    rules: {
      tit_email: {
        required: true,
        email: true,
      },
      tit_password: {
        required: true,
      },
    },
    messages: {
      tit_email: {
        required: "Email is required",
        email: "check your email format",
      },
      tit_password: {
        required: "Password is needed",
      },
    },
    submitHandler: submitForm,
  });
  /* validation */

  /* form submit */
  function submitForm() {
    let data = $("#userLoginform").serialize();

    $.ajax({
      type: "POST",
      url: "userlogin.php",
      data: data,
      beforeSend: function () {
        $("#errorLogin").fadeOut();
        $("#saveLogin").html(
          '<span class="glyphicon glyphicon-transfer"></span> &nbsp; Validating Data ...'
        );
      },
      success: function (data) {
        if (data.trim() == "lecture") {
          $("#saveLogin").html(
            ' <img src="../assets/login/images/gif/loader.gif" /> &nbsp; Loging you in ...'
          );
          setTimeout(' window.location.href = "teacher/"; ', 3000);
        } else if (data.trim() == "student") {
          $("#saveLogin").html(
            ' <img src="../assets/login/images/gif/loader.gif" /> &nbsp; Loging you in ...'
          );
          setTimeout(' window.location.href = "student/"; ', 3000);
        } else if (data.trim() == "headmaster") {
          $("#saveLogin").html(
            ' <img src="../assets/login/images/gif/loader.gif" /> &nbsp; Loging you in ...'
          );
          setTimeout(' window.location.href = "headmaster/"; ', 3000);
        } else if (data.trim() == "notfound") {
          $("#errorLogin").fadeIn(1000, function () {
            $("#errorLogin").html(
              '<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Email or password not found</div>'
            );

            $("#saveLogin").html(
              '<span class="glyphicon glyphicon-log-in"></span> &nbsp; Try Again'
            );
          });
        } else {
          $("#errorLogin").fadeIn(1000, function () {
            $("#errorLogin").html(
              '<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' +
                data +
                " !</div>"
            );

            $("#saveLogin").html(
              '<span class="glyphicon glyphicon-log-in"></span> &nbsp; Re- Save Data'
            );
          });
        }
      },
    });
    return false;
  }
  /* form submit */
});
