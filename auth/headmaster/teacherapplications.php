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
                       T-IT school software
                    </h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <table class="table table-striped table-bordered table-highlight" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full names</th>
                                <th>Email</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>Course applied</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $courseSelect = select('*', 'tit_gender,tit_courseapply,tit_courses', "tit_gender.ge_id=tit_courseapply.ge_id AND tit_courses.cou_id=tit_courseapply.cou_id");
                            foreach ($courseSelect as $rowCourse) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $rowCourse['couap_names']; ?></td>
                                    <td><?php echo $rowCourse['couap_email'] ?></td>
                                    <td><?php echo $rowCourse['couap_dob'] ?></td>
                                    <td><?php echo $rowCourse['ge_name'] ?></td>
                                    <td><?php echo $rowCourse['cou_title'] ?></td>
                                    <td>
                                        <a class="btn btn-success" onclick="return confirm('Are you sure you want to approve this application,if yes click OK to confirm')" href="approveteacher?teacher=<?php echo encryptId($rowCourse['couap_id']); ?>">Approve</a>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to reject this application,if yes click OK to confirm')" href="rejecteacher?teacher=<?php echo encryptId($rowCourse['couap_id']); ?>">Reject</a>
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