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
                        Students list
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
                                <th>Address</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $studentSelect = select('*', 'tit_gender,tit_student', "tit_student.ge_id=tit_gender.ge_id ");
                            foreach ($studentSelect as $rowStudent) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $rowStudent['st_fullnames']; ?></td>
                                    <td><?php echo $rowStudent['st_email'] ?></td>
                                    <td><?php echo $rowStudent['st_dob'] ?></td>
                                    <td><?php echo $rowStudent['ge_name'] ?></td>
                                    <td><?php echo $rowStudent['st_address'] ?></td>
                                    <?php if ($rowStudent['st_status'] == 0) { ?>
                                        <td><a href="approveAccount?activate=<?php echo encryptId($rowStudent['st_id']); ?>" class="btn btn-info">Activate account</a></td>
                                    <?php } elseif ($rowStudent['st_status'] == 1) { ?>
                                        <td><a href="approveAccount?deactivate=<?php echo encryptId($rowStudent['st_id']) ?>" class="btn btn-danger">Disable account</a></td>
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