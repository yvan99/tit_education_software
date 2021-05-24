$("document").ready(function () {
    /* validation */
    $("#saveCourseform").validate({
      rules: {
        courCode: {
          required: true,
        },
        courTitle: {
          required: true,
        },  
      },
      messages: {
   
        courCode: {
          required: "Your names are required",
        },
        courTitle: {
          required: "Date of birth is required",
        },

  
      },
      submitHandler: submitForm,
    });
    /* validation */
  
    /* form submit */
    function submitForm() {
      let data = $("#saveCourseform").serialize();
  
      $.ajax({
        type: "POST",
        url: "savestudent.php",
        data: data,
        beforeSend: function () {
          $("#courserror").fadeOut();
          $("#courseSave").html(
            '<span class="glyphicon glyphicon-transfer"></span> &nbsp; Validating Data ...'
          );
        },
        success: function (data) {
          if (data.trim() == "studentsaved") {
            $("#courserror").fadeIn(1000, function () {
              $("#courserror").html(
                '<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Application successfully saved , wait for approval !</div>'
              );
            });
            $("#courseSave").html(
              ' <img src="../assets/login/images/gif/loader.gif" /> &nbsp; Approving ...'
            );
            setTimeout(' window.location.href = "parentportal"; ', 5000);
          } else if (data.trim() == "taken") {
            $("#courserror").fadeIn(1000, function () {
              $("#courserror").html(
                '<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Student is already registered !</div>'
              );
  
              $("#courseSave").html(
                '<span class="glyphicon glyphicon-log-in"></span> &nbsp; Try Again'
              );
            });
          } 
          else if (data.trim() == "emptyfields") {
            $("#courserror").fadeIn(1000, function () {
              $("#courserror").html(
                '<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Some fields are empty . Please check your submission!</div>'
              );
  
              $("#courseSave").html(
                '<span class="glyphicon glyphicon-log-in"></span> &nbsp; Try Again'
              );
            });
          }
          else {
            $("#courserror").fadeIn(1000, function () {
              $("#courserror").html(
                '<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' +
                  data +
                  " !</div>"
              );
  
              $("#courseSave").html(
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
  