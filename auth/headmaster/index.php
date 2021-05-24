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

            <div class="row">

                <div class="span12">

                    <div id="big-stats-container" class="widget">

                        <div class="widget-content">

                            <div id="big_stats" class="cf">
                                <div class="stat">
                                    <h4>Pending Students</h4>
                                    <span class="value"><?php echo $countPendingstudent; ?></span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>Pending teachers</h4>
                                    <span class="value"><?php echo $teacherPending; ?></span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>Admitted students</h4>
                                    <span class="value"><?php echo $approvedPendingstudent; ?></span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>Approved teachers</h4>
                                    <span class="value"><?php echo $countTeachers;?></span>
                                </div> <!-- .stat -->
                            </div>

                        </div> <!-- /widget-content -->

                        <div class="widget-content">

                            <div id="big_stats" class="cf">
                                <div class="stat">
                                    <h4>Total courses</h4>
                                    <span class="value"><?php echo $countCourses; ?></span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>Taken courses</h4>
                                    <span class="value">0</span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>Free courses</h4>
                                    <span class="value">0</span>
                                </div> <!-- .stat -->

                                <div class="stat">
                                    <h4>Course application</h4>
                                    <span class="value">0</span>
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