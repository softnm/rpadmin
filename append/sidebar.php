<div class="sidebar">
      <div class="sidebar-header" style="    background-color: white;">
        <a href="index.php" class="sidebar-logo"><img src="<?php echo RP_LOGO; ?>" style="width: 200px;" /></a>
      </div><!-- sidebar-header -->
      <div id="sidebarMenu" class="sidebar-body">

       <?php
      
      

      $dataMenuCategory = eqWithoutFa("SELECT * FROM `rp_menucategory` WHERE 1");
      while($dataMenuCat = $dataMenuCategory->fetch_assoc() ){
        echo '<div class="nav-group show">
              <a href="#" class="nav-label">'.$dataMenuCat['name'].'</a>';
        $dataMenu = eqWithoutFa("SELECT * FROM `rp_menu` WHERE `catid`='".$dataMenuCat['id']."';");
        echo '<ul class="nav nav-sidebar">';
        while($dataMenuRow = $dataMenu->fetch_assoc() ){
          echo '
          
          <li class="nav-item">
              <a href="'.$dataMenuRow['file'].'" class="nav-link">'.$dataMenuRow['icon'].' <span>'.$dataMenuRow['name'].'</span></a>
            </li>
          
          ';
        }
        echo '</ul>';
        echo '</div>';
      
      }
       ?>

<div class="nav-group show">
          <a href="#" class="nav-label">Applications</a>
          <ul class="nav nav-sidebar">
            <li class="nav-item">
              <a href="apps/file-manager.html" class="nav-link"><i class="ri-folder-2-line"></i> <span>File Manager</span></a>
            </li>
            <li class="nav-item">
              <a href="apps/email.html" class="nav-link"><i class="ri-mail-send-line"></i> <span>Email</span></a>
            </li>
            <li class="nav-item">
              <a href="apps/calendar.html" class="nav-link"><i class="ri-calendar-line"></i> <span>Calendar</span></a>
            </li>
            <li class="nav-item">
              <a href="apps/chat.html" class="nav-link"><i class="ri-question-answer-line"></i> <span>Chat</span></a>
            </li>
            <li class="nav-item">
              <a href="apps/contact.html" class="nav-link"><i class="ri-contacts-book-line"></i> <span>Contacts</span></a>
            </li>
            <li class="nav-item">
              <a href="apps/tasks.html" class="nav-link"><i class="ri-checkbox-multiple-line"></i> <span>Task Manager</span></a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>Media Gallery</span></a>
              <nav class="nav nav-sub">
                <a href="apps/gallery-music.html" class="nav-sub-link">Music Stream</a>
                <a href="apps/gallery-video.html" class="nav-sub-link">Video Stream</a>
              </nav>
            </li>
          </ul>
        </div><!-- nav-group -->

      </div><!-- sidebar-body -->
      <div class="sidebar-footer">
        <div class="sidebar-footer-top">
          <div class="sidebar-footer-thumb">
            <img src="<?php echo userDetails($_SESSION['user'])['avatar']; ?>" alt="<?php echo userDetails($_SESSION['user'])['name']; ?>">
          </div><!-- sidebar-footer-thumb -->
          <div class="sidebar-footer-body">
            <h6><a href="pages/profile.html"><?php echo userDetails($_SESSION['user'])['name']; ?></a></h6>
            <p>{{Permission Group}}</p>
          </div><!-- sidebar-footer-body -->
          <a id="sidebarFooterMenu" href="" class="dropdown-link"><i class="ri-arrow-down-s-line"></i></a>
        </div><!-- sidebar-footer-top -->
        <div class="sidebar-footer-menu">
          <nav class="nav">
            <a href=""><i class="ri-edit-2-line"></i> Edit Profile</a>
            <a href=""><i class="ri-profile-line"></i> View Profile</a>
          </nav>
          <hr>
          <nav class="nav">
            <a href=""><i class="ri-question-line"></i> Help Center</a>
            <a href=""><i class="ri-lock-line"></i> Privacy Settings</a>
            <a href=""><i class="ri-user-settings-line"></i> Account Settings</a>
            <a href="append/logout.php"><i class="ri-logout-box-r-line"></i> Log Out</a>
          </nav>
        </div><!-- sidebar-footer-menu -->
      </div><!-- sidebar-footer -->
    </div><!-- sidebar -->