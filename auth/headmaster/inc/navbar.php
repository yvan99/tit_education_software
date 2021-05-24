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

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-th"></i>
                        Online Applications
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="studentApplication">Student applications</a></li>
                        <li><a href="teacherapplications">Teachers application</a></li>
                    </ul>
                </li>

                <li class="dropdown active">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-copy"></i>
                        School Members
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="studentlist">Students</a></li>
                        <li><a href="teacherslist">Teachers</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-external-link"></i>
                        Academic stuffs
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="courseslist">Courses</a></li>
                        <li><a href="appliedcourses">Student course application</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-th"></i>
                        Courses reports
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">

                        <li><a href="allcoursesreport">All courses</a></li>
                        <li class="dropdown">
                            <a href="javascript:;">
                                Single course reports
                                <i class="icon-chevron-right sub-menu-caret"></i>
                            </a>

                            <ul class="dropdown-menu sub-menu">
                                <?php
                                $courselect = select('*', 'tit_courses', "cou_status='1'");
                                foreach ($courselect as $rowCourse) {
                                    $courseId = $rowCourse['cou_id'];
                                    $courseName = $rowCourse['cou_title'];

                                ?>
                                    <li><a href="courseReport?requestCourse=<?php echo encryptId($courseId); ?>"><?php echo $courseName; ?></a></li>

                                <?php } ?>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav">
                    <a href="logout">
                        <span>Logout</span>

                    </a>
                </li>
            </ul>

        </div> <!-- /.nav-collapse -->

    </div> <!-- /.container -->

</div> <!-- /#nav -->