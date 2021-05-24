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

            <?php echo @$message;?>

                <div class="widget-header">
                    <h3>
                        <i class="icon-th-list"></i>
                        Student course applications
                    </h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered table-highlight" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student names</th>
                                <th>Student email</th>
                                <th>Course applied</th>
                                <th>Course code</th>
                                <th>Assigned teacher</th>
                                <th>Applied On</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $studentSelect = select('*', 'tit_courses,course_stu,tit_student,tit_teacher,tit_teachcourse', "tit_courses.cou_id=course_stu.cou_id AND tit_student.st_id=course_stu.st_id AND tit_teachcourse.cou_id=course_stu.cou_id AND tit_teachcourse.tea_code=tit_teacher.tea_code AND course_stu.stuco_status='0'");
                            foreach ($studentSelect as $rowStudent) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $rowStudent['st_fullnames']; ?></td>
                                    <td><?php echo $rowStudent['st_email']; ?></td>
                                    <td><?php echo $rowStudent['cou_title']; ?></td>
                                    <td><?php echo $rowStudent['cou_code'] ?></td>
                                    <td><?php echo $rowStudent['tea_names'] ?></td>
                                    <td><?php echo $rowStudent['stuco_dateon']; ?></td>
                                    <td>
                                        <a class="btn btn-success" onclick="return confirm('Are you sure you want to approve this application,if yes click OK to confirm')" href="approvestudentcourse?student=<?php echo encryptId($rowStudent['stuco_id']); ?>">Approve</a>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to reject this application,if yes click OK to confirm')" href="rejectstudentcourse?student=<?php echo encryptId($rowStudent['stuco_id']);?>">Reject</a>
                                    </td>


                                </tr>
                            <?php $counter++;
                            } ?>

                        </tbody>
                    </table>


                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /.container -->

    </div> <!-- /#content -->

    <?php
    require_once '../generalinc/footer.php';
    require_once '../generalinc/js.php';

    ?>
    <!-- /#footer -->
</body>

</html>