<?php require_once 'inc/server.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>T-IT :: TEACHER</title>
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

            <div class="row">

                <div class="span12">

                    <div id="big-stats-container" class="widget">

                        <div class="widget-content">

                            <div id="big_stats" class="cf">
                                <div class="stat">
                                    <h4>My assigned courses</h4>
                                    <span class="value"><?php echo $teacherCourses; ?></span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>My students</h4>
                                    <span class="value"><?php echo  $teacherStudents; ?></span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>System Role</h4>
                                    <span class="badge badge-success">Teacher</span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>Today's Date</h4>
                                    <span class="badge badge-info"><?php echo $dateSt ;?></span>
                                </div> <!-- .stat -->
                            </div>

                        </div> <!-- /widget-content -->


                    </div> <!-- /widget -->

                </div> <!-- /span12 -->



            </div> <!-- /row -->



        </div> <!-- /.container -->

    </div> <!-- /#content -->

    <?php
    require_once '../generalinc/footer.php';
    require_once '../generalinc/js.php';

    ?>
    <!-- /#footer -->
</body>

</html>