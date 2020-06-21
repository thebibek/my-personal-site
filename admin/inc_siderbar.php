
        <div class="side-menu-area">

            <div class="logo-bar">
                <!-- logo -->
                <a href="index.php" class="logo">
                    <span class="big-logo">
                        <img src="img/logo.png" alt="">
                    </span>
                    <span class="small-logo">
                        <img src="img/logo.png" alt="">
                    </span>
                </a>
            </div>
            
            <!-- sidebar menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li <?php if ($page == 'index') { print 'class="active"'; } ?> ><a href="index.php"> <i class="icon_drive"></i> <span>Dashboard</span></a></li>

                <li <?php if ($page == 'setting') { print 'class="active"'; } ?>><a href="setting.php"><i class="fa fa-cogs"></i> <span>Site Setting</span></a></li>

                <li <?php if ($page == 'menu') { print 'class="active"'; } ?>><a href="menu.php"><i class="fa fa-navicon"></i> <span>Menu Setting</span></a></li>

                <li <?php if ($page == 'menu') { print 'class="active"'; } ?>><a href="blog.php"><i class="fa fa-navicon"></i> <span>Blog Setting</span></a></li>


                <li><a href="logout.php"><i class="fa fa-sign-out text-danger"></i> <span>Log Out</span></a></li>

            </ul>
        </div>

