$("document").ready(function () {
    /* validation */
    $("#studentRegister").validate({
      rules: {
        tit_names: {
          required: true,
        },
        tit_email: {
          required: true,
          email:true,
        },
        tit_dob: {
          required: true,
        },
        tit_sex: {
          required: true,
        },
        tit_address: {
          required: true,
        },

  
      },
      messages: {
   
        tit_names: {
          required: "Your names are required",
        },
        tit_email: {
          required: "Email is required",
          email:"check your email format"
        },
        tit_dob: {
          required: "Date of birth is required",
        },
        tit_sex: {
          required: "Gender can't be empty",
        },
        tit_address: {
          required: "Address can't be empty",
        },
  
      },
      submitHandler: submitForm,
    });
    /* validation */
  
    /* form submit */
    function submitForm() {
      let data = $("#studentRegister").serialize();
  
      $.ajax({
        type: "POST",
        url: "savestudent.php",
        data: data,
        beforeSend: function () {
          $("#errorStudentsignup").fadeOut();
          $("#saveLogin").html(
            '<span class="glyphicon glyphicon-transfer"></span> &nbsp; Validating Data ...'
          );
        },
        success: function (data) {
          if (data.trim() == "studentsaved") {
            $("#errorStudentsignup").fadeIn(1000, function () {
              $("#errorStudentsignup").html(
                '<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Application successfully saved , wait for approval !</div>'
              );
            });
            $("#saveLogin").html(
              ' <img src="../assets/login/images/gif/loader.gif" /> &nbsp; Approving ...'
            );
            setTimeout(' window.location.href = "./"; ', 5000);
          } else if (data.trim() == "taken") {
            $("#errorStudentsignup").fadeIn(1000, function () {
              $("#errorStudentsignup").html(
                '<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Student is already registered !</div>'
              );
  
              $("#saveLogin").html(
                '<span class="glyphicon glyphicon-log-in"></span> &nbsp; Try Again'
              );
            });
          } 
          else if (data.trim() == "emptyfields") {
            $("#errorStudentsignup").fadeIn(1000, function () {
              $("#errorStudentsignup").html(
                '<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Some fields are empty . Please check your submission!</div>'
              );
  
              $("#saveLogin").html(
                '<span class="glyphicon glyphicon-log-in"></span> &nbsp; Try Again'
              );
            });
          }
          else {
            $("#errorStudentsignup").fadeIn(1000, function () {
              $("#errorStudentsignup").html(
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
  