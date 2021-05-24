<?php require_once 'inc/server.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>T-IT :: Headmaster</title>
    <?php require_once '../generalinc/css.php'; ?>
</head>

<body>
    <?php
    require_once 'inc/header.php';
    require_once 'inc/navbar.php';
    ?>

    <div id="content">

        <div class="container">
            <?php require_once 'inc/breadcumb.php'; ?>
            <div class="widget widget-table">
            <?php
                    if (isset($_POST['savecourse'])) {
                        $courseCode = escape($_POST['courCode']);
                        $courseTitlt = escape($_POST['courTitle']);
                        #Check redudancy
                        $checkCourse = countAffectedRows('tit_courses', "cou_title='$courseTitlt' OR cou_code='$courseCode' LIMIT 1");
                        if (empty($courseCode) || empty($courseTitlt)) {
                            $message = "<div class='alert alert-danger'>Empty fields</div>";
                        } elseif ($checkCourse) {
                            $message = "<div class='alert alert-danger'>Course already registered</div>";
                        } else {
                            $headmasterClass->addCourse($courseCode, $courseTitlt);
                            $message = "<div class='alert alert-success'>Course registered successfully</div>";
                        }
                    }
                    echo @$message;
                    ?>
          
                

                <div class="widget-header">
                    <h3>
                        <i class="icon-th-list"></i>
                        Courses list
                    </h3>
                    <button class="btn btn-sm btn-success" href="#myModal" data-toggle="modal">Register new Course</button>

                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered table-highlight" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course code</th>
                                <th>Course name</th>
                                <th>Registered On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $studentSelect = select('*', 'tit_courses', "cou_status='1'");
                            foreach ($studentSelect as $rowStudent) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $rowStudent['cou_code']; ?></td>
                                    <td><?php echo $rowStudent['cou_title'] ?></td>
                                    <td><?php echo $rowStudent['cou_date'] ?></td>


                                </tr>
                            <?php $counter++;
                            } ?>

                        </tbody>
                    </table>


                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

            <div class="modal fade hide" id="myModal">
                <form method="post" id="saveCourseform">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3>Register new course</h3>
                    </div>
                    <div class="modal-body">
                        <div id="courserror"></div>
                        <input type="hidden" name="courCode" class="form-control" value="<?php echo $headmasterClass->courseCode(); ?>">
                        <input type="text" name="courTitle" style="width: 100%;" class="form-control" placeholder="course title">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Discard changes</button>
                        <button type="submit" name="savecourse" id="courseSave" class="btn btn-primary">Save Course</button>
                    </div>
            </div>
            </form>


        </div> <!-- /.container -->

    </div> <!-- /#content -->

    <?php
    require_once '../generalinc/footer.php';
    require_once '../generalinc/js.php';

    ?>
    <!-- /#footer -->
</body>

</html>