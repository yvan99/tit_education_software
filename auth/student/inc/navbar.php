<div id="nav">

    <div class="container">

        <a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <i class="icon-reorder"></i>
        </a>

        <div class="nav-collapse">

            <ul class="nav">

                <li class="nav">
                    <a href="./">
                        <i class="icon-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav">
                    <a href="#myModal" data-toggle="modal">
                        <i class="icon-external-link"></i>
                        <span>Apply for a course</span>

                    </a>
                </li>

                <li class="nav">
                    <a href="mycourses">
                        <i class="icon-external-link"></i>
                        <span>Enrolled courses <span class="badge badge-info"><?php echo $myCourses; ?></span> </span>

                    </a>
                </li>

                <li class="nav">
                    <a href="logout">
                        <i class="icon-external-link"></i>
                        <span>Logout</span>

                    </a>
                </li>
            </ul>

        </div> <!-- /.nav-collapse -->

    </div> <!-- /.container -->

</div> <!-- /#nav -->

<div class="modal fade hide" id="myModal">
    <form method="post"  id="saveCourseform">
        <?php
        if (isset($_POST['applicourse'])) {
            $course = escape($_POST['tit_course']);
            $countIncourses = countAffectedRows('course_stu', "cou_id='$course' AND st_id='$studentId' LIMIT 1");
            if (empty($course)) {
             $message = "<div class='alert alert-danger'>Empty fields</div>";
            }
            elseif ($countIncourses) {
                $message = "<div class='alert alert-danger'>Course already applied or enrolled</div>";
            } else {
                $studentClass->applycourse($course, $studentId);
                $message = "<div class='alert alert-success'>Course applied successfully , wait for approval</div>";
            }
        }
         ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Apply for a course</h3>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="form-group">
                    <select required class="form-control" name="tit_course"  style="width: 100%;">
                        <?php
                        #select School Manager type
                        $courseSelector = select('*', 'tit_courses,tit_teachcourse,tit_teacher', "tit_teacher.tea_code=tit_teachcourse.tea_code AND tit_teachcourse.cou_id=tit_courses.cou_id AND tit_courses.cou_status='1'");
                        foreach ($courseSelector as $courseRow) {
                            $courseId   = $courseRow['cou_id'];
                            $courseName = $courseRow['cou_title'];
                            echo "<option value=" . $courseId . ">" . $courseName . ' by' . ' ' . $courseRow['tea_names']; ?></option>
                            ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-danger">Discard changes</button>
            <button type="submit" name="applicourse" class="btn btn-primary">Apply now</button>
        </div>
</div>
</form>