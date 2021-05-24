<?php 
require_once 'inc/server.php';
$decryptRequest = decryptId($_GET['requestCourse']);
$studentSelect  = select('*','tit_student,course_stu,tit_teacher,tit_courses,tit_teachcourse',"tit_student.st_id=course_stu.st_id AND course_stu.cou_id = tit_courses.cou_id AND course_stu.cou_id = tit_teachcourse.cou_id AND tit_teachcourse.tea_code=tit_teacher.tea_code AND tit_teacher.tea_code='$teachCode'");
foreach ($studentSelect as $fetchRow) {
    # code...
    $course = $fetchRow['cou_title'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>T-IT :: Teacher</title>
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

                <div class="widget-header">
                    <h3>
                        <i class="icon-th-list"></i>
                        List of students learning <span class="badge badge-warning"><?php echo @$course; ?></span>
                    </h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered table-highlight" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student names</th>
                                <th>Student email</th>
                                <th>Admitted on</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $teacherSelect = select('*','tit_student,course_stu,tit_teacher,tit_courses,tit_teachcourse',"tit_student.st_id=course_stu.st_id AND course_stu.cou_id = tit_courses.cou_id AND course_stu.cou_id = tit_teachcourse.cou_id AND tit_teachcourse.tea_code=tit_teacher.tea_code AND tit_teacher.tea_code='$teachCode' and course_stu.stuco_status='1'");
                            foreach ($teacherSelect as $rowCourse) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $rowCourse['st_fullnames'] ?></td>
                                    <td><?php echo $rowCourse['st_email'] ?></td>
                                    <td><?php echo $rowCourse['stuco_dateon'] ?></td>
                                    <td>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to remove <?php echo $rowCourse['st_fullnames'];  ?> to your course,if yes click OK to confirm')" href="rejectstudent?student=<?php echo encryptId($rowCourse['st_id']);?>&&request=<?php echo encryptId($rowCourse['cou_id']); ?>">Remove from course</a>
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