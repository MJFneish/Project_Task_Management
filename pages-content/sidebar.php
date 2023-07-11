

<nav class="sidebar <?php echo check_open_close_sidebar() === 'close'? 'close' :'' ?>">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href='profile.php'><img src="<?php echo $user_data['profile_path']?>" alt="avatar"></a>
                </span>

                <div class="text header-text">
                    <span class="name"><?php echo $user_data['uname']?></span>
                    <span class="profession"><?php echo $user_data['uemail']?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">

<!--                <li class="search-box">-->
<!--                    <i class='bx bx-search icon'></i>-->
<!--                    <input type="search" placeholder="Search...">-->
<!--                </li>-->

                <ul class="menu-links">
                    <li class="nav-link <?php if($sidebar_link == 'home') echo 'active'?>">
                        <a href="index.php" >
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">HomePage</span>
                        </a>
                    </li>
                    <li class="nav-link <?php if($sidebar_link == 'profile') echo 'active'?>">
                        <a href="profile.php">
                            <ion-icon name="person-outline" class="icon"></ion-icon>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-link <?php if($sidebar_link == 'project') echo 'active'?>">
                        <a href="<?php if(isset($_SESSION['current_project'])) echo 'project.php' ?>">
                            <ion-icon name="document-text-outline" class="icon"></ion-icon>
<!--                            <box-icon name='folder-open' class="icon" ></box-icon>-->
                            <span class="text nav-text">Project</span>
                        </a>
                    </li>
                    <li class="nav-link <?php if($sidebar_link == 'task') echo 'active'?>">
                        <a href="<?php if(isset($_SESSION['current_task'])) echo 'task.php' ?>">
                            <ion-icon name="list-outline" class="icon"></ion-icon>
<!--                            <box-icon name='task' class="icon"></box-icon>-->
                            <span class="text nav-text">Task</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                        <a href="actions/logout.php">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon' ></i>
                        <i class='bx bx-sun icon sun' ></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <button class="toggle-switch" style="outline: 0; border: 0;">
                        <span class="switch"></span>
                    </button>
                </li>

            </div>
        </div>
    </nav>