<?php require_once 'inc/server.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>T-IT :: Student</title>
    <?php require_once '../generalinc/css.php'; ?>
</head>

<body>
    <?php
    require_once 'inc/header.php';
    require_once 'inc/navbar.php';
    ?>

    <div id="content">

        <div class="container">
            <?php echo @$message; ?>
            <?php require_once 'inc/breadcumb.php'; ?>
            <div class="widget widget-table">

                <div class="widget-header">
                    <h3>
                        <i class="icon-th-list"></i>
                        My assigned courses
                    </h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered table-highlight" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course</th>
                                <th>Course code</th>
                                <th>Teacher</th>
                                <th>Teacher email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $teacherSelect = select('*', 'course_stu,tit_courses,tit_teacher,tit_teachcourse,tit_student', "tit_teacher.tea_code=tit_teachcourse.tea_code AND tit_teachcourse.cou_id=tit_courses.cou_id AND course_stu.st_id=tit_student.st_id AND course_stu.stuco_status='1' AND tit_student.st_id='$studentId'");
                            foreach ($teacherSelect as $rowCourse) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $rowCourse['cou_title'] ?></td>
                                    <td><?php echo $rowCourse['cou_code'] ?></td>
                                    <td><?php echo $rowCourse['tea_names'] ?></td>
                                    <td><?php echo $rowCourse['tea_email'] ?></td>
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