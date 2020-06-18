                <div class="page-top-bar-area d-flex align-items-center justify-content-between">

                    <div class="logo-trigger-search-area d-flex align-items-center">
                        <!-- Logo Trigger -->
                        <div class="logo-trigger-area d-flex align-items-center">
                            <!-- Trigger -->
                            <div class="top-trigger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>

                    <!-- User Meta -->
                    <div class="user-meta-data d-flex align-items-center">
                        <!-- Notifications -->
                        <div class="topbar-notifications">

                            <!-- Notifications Data -->
                            <div class="notifications-data">
                                <h6>New log</h6>
                                <!-- Notifications List Data -->
                                <a class="notification-list--data" href="#">
                                    <!-- Notifications icon -->
                                    <div class="notification-list-icon">
                                        <i class="fa fa-home bg-secondary" aria-hidden="true"></i>
                                    </div>
                                    <!-- Notifications Text -->
                                    <div class="notification--list-body-text">
                                        <h6>Page Edit</h6>
                                        <p><b>Date: </b>2018-10-20</p>
                                    </div>
                                </a>
                                <!-- Notifications List Data -->
                                <a class="notification-list--data" href="#">
                                    <!-- Notifications Icon -->
                                    <div class="notification-list-icon">
                                        <i class="fa fa-user-plus bg-secondary" aria-hidden="true"></i>
                                    </div>
                                    <!-- Notifications Text -->
                                    <div class="notification--list-body-text">
                                        <h6>Page Delete</h6>
                                        <p><b>Date: </b>2018-10-20</p>
                                    </div>
                                </a>
                                <!-- Notifications List Data -->
                                <a class="notification-list--data" href="#">
                                    <!-- Notifications Icon -->
                                    <div class="notification-list-icon">
                                        <i class="fa fa-power-off bg-secondary" aria-hidden="true"></i>
                                    </div>
                                    <!-- Notifications Text -->
                                    <div class="notification--list-body-text">
                                        <h6>Page Add</h6>
                                        <p><b>Date: </b>2018-10-20</p>
                                    </div>
                                </a>
                                <!-- Notifications All -->
                                <div class="notification--all--list">
                                    <a href="#">Show all log</a>
                                </div>
                            </div>
                        </div>

                        <!-- Language -->
                        <div class="topbar-laguage-tab"> 
                        </div>

                        <!-- Profile -->
                        <div class="topbar-profile">
                            <!-- Thumb -->
                            <div class="user---thumb">
                                <?php
                                if (isset($_SESSION["cms_usergender"])) {
                                    if ($_SESSION["cms_usergender"] == 'male') {
                                        print '<div class="profile--list-icon"><i class="icon-profile-male"></i></div>';
                                    }
                                    else if ($_SESSION["cms_usergender"] == 'female') {
                                        print '<div class="profile--list-icon"><i class="icon-profile-female"></i></div>';
                                    }
                                 } 
                                ?>
                                <p><?php print $user_fullname; ?> </p>
                            </div>

                            <!-- Profile Data -->
                            <div class="profile-data">
                                <!-- Profile User Details -->
                                <div class="profile-user--details" style="background-image: url(img/thumbnails-img/profile-bg.jpg);">
                                    <!-- Thumb -->
                                    <div class="profile---thumb-det">
                                        <?php
                                        if (isset($_SESSION["cms_usergender"])) {
                                            if ($_SESSION["cms_usergender"] == 'male') {
                                                print '<i class="icon-profile-male"></i>';
                                            }
                                            else if ($_SESSION["cms_usergender"] == 'female') {
                                                print '<i class="icon-profile-female"></i>';
                                            }
                                         } 
                                        ?>
                                    </div>
                                    <!-- Profile Text -->
                                    <div class="profile---text-details">
                                        <h6><?php print $user_fullname; ?></h6>
                                        <p><?php print $user_email; ?></p>
                                    </div>
                                </div>
                                <!-- Profile List Data -->
                                <a class="profile-list--data" href="profile.php">
                                    <!-- Profile icon -->
                                    <div class="profile--list-icon">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                    <!-- Profile Text -->
                                    <div class="notification--list-body-text profile">
                                        <h6>My profile</h6>
                                    </div>
                                </a>
                               
                                <!-- Profile List Data -->
                                <a class="profile-list--data" href="logout.php">
                                    <!-- Profile icon -->
                                    <div class="profile--list-icon">
                                        <i class="fa fa-sign-out text-danger" aria-hidden="true"></i>
                                    </div>
                                    <!-- Profile Text -->
                                    <div class="notification--list-body-text profile">
                                        <h6>Log out</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>