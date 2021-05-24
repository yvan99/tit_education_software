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
                    <a href="mycourses">
                    <i class="icon-external-link"></i>
                        <span>Assigned courses <span class="badge badge-warning"><?php echo $teacherCourses; ?></span> </span>

                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-th"></i>
                        Student courses
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">
                    <?php 
                    $courselect = select('*','tit_teacher,tit_courses,tit_teachcourse',"tit_teacher.tea_code=tit_teachcourse.tea_code AND tit_courses.cou_id=tit_teachcourse.cou_id AND tit_teachcourse.tea_code='$teachCode'");
                    foreach ($courselect as $rowCourse) {
                        $courseId = $rowCourse['cou_id'];
                        $courseName = $rowCourse['cou_title'];
                    
                    ?>
                        <li><a href="studentcourses?requestCourse=<?php echo encryptId($courseId);?>"><?php echo $courseName; ?></a></li>

                        <?php } ?>

                    </ul>
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