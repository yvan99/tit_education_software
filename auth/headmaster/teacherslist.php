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

                <div class="widget-header">
                    <h3>
                        <i class="icon-th-list"></i>
                        Teachers list
                    </h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered table-highlight" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full names</th>
                                <th>Teacher code</th>
                                <th>Teacher course</th>
                                <th>Course code</th>
                                <th>Email</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $teacherSelect = select('*', 'tit_gender,tit_courses,tit_teachcourse,tit_teacher', "tit_gender.ge_id=tit_teacher.ge_id AND tit_courses.cou_id=tit_teachcourse.cou_id AND tit_teacher.tea_code=tit_teachcourse.tea_code");
                            foreach ($teacherSelect as $rowCourse) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $rowCourse['tea_names']; ?></td>
                                    <td><?php echo $rowCourse['tea_code']; ?></td>
                                    <td><?php echo $rowCourse['cou_title'] ?></td>
                                    <td><?php echo $rowCourse['cou_code'] ?></td>
                                    <td><?php echo $rowCourse['tea_email'] ?></td>
                                    <td><?php echo $rowCourse['tea_dob'] ?></td>
                                    <td><?php echo $rowCourse['ge_name'] ?></td>
                                    <?php if ($rowCourse['tea_status'] == 0) { ?>
                                        <td><a href="approveteachacc?activate=<?php echo encryptId($rowCourse['tea_id']); ?>" class="btn btn-info">Activate account</a></td>
                                    <?php } elseif ($rowCourse['tea_status'] == 1) { ?>
                                        <td><a href="approveteachacc?deactivate=<?php echo encryptId($rowCourse['tea_id']) ?>" class="btn btn-danger">Disable account</a></td>
                                    <?php } ?>
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