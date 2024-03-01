<aside id="sidebar-wrapper">
  <?php //echo $_SERVER['PHP_SELF'] ?>
          <div class="sidebar-brand">
            <a href="index.php"> <img alt="image" src="assets/img/knwda_logo.png" class="header-logo" /> <span
                class="logo-name">KNWDA</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="dropdown">
              <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li> -->
             <?php
        include 'assets/scripts/dbconn.php';
         $user_id=$_SESSION['user_id'];

       $subqry="SELECT * FROM ws_submenu";
          $subres=mysqli_query($conn,$subqry);
          $subrow=mysqli_num_rows($subres);
          if($subrow>0)
          {
            $nomenu='True';
        //get submenu id 
        $url=basename($_SERVER['REQUEST_URI']);
        //$url=$add.".php";
        $checkurl="SELECT `submenu_id` FROM `ws_submenu` WHERE `submenu_url`='$url'";
        $rescheckurl=mysqli_query($conn,$checkurl);
        $checkurldata=mysqli_fetch_assoc($rescheckurl);
           $submenu_id=$checkurldata['submenu_id'];

         //Fetch department of user
         $checkuserdept="SELECT `unit` FROM `ws_users` WHERE `user_id`='$user_id'";
        $rescheckdept=mysqli_query($conn,$checkuserdept);
        $checkdeptdata=mysqli_fetch_assoc($rescheckdept);
        $unit=$checkdeptdata['unit'];

          //get department of submenu
          $deptqry="SELECT subdep_id FROM ws_submenu_department WHERE submenu_id='$submenu_id' AND adu_id='$unit'";
          $deptres=mysqli_query($conn,$deptqry);
           $deptrow=mysqli_num_rows($deptres);
          if($deptrow>0)
          {
          $user_permission='True';
          }
          else
          {
          $user_permission='False';
          }

        //get menu list
        $menuquery="SELECT * FROM `ws_menu` WHERE menu_status='Enabled'";
        $menuquery_result=mysqli_query($conn, $menuquery);
        while($menuquery_fetch = mysqli_fetch_array($menuquery_result)){
          $menu_id=$menuquery_fetch['menu_id'];

          //get submenu list
                $submenuquery="SELECT * FROM `ws_submenu` 
                inner join ws_submenu_department on ws_submenu_department.submenu_id = ws_submenu.submenu_id
                WHERE submenu_status='Enabled' AND ws_submenu.menu_id='$menu_id' AND submenu_display='Yes' AND ws_submenu_department.adu_id='$unit' ORDER BY submenu_order ASC";
        $submenuquery_result=mysqli_query($conn, $submenuquery);
        $submenutotal=mysqli_num_rows($submenuquery_result);
if($submenutotal>0)
{
    ?>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="<?php echo $menuquery_fetch['menu_icon']; ?>"></i><span><?php echo $menuquery_fetch['menu_name']; ?></span></a>
              <ul class="dropdown-menu">

                <?php
                 
        while($submenuquery_fetch = mysqli_fetch_array($submenuquery_result)){
                ?>
                <li><a class="nav-link" href="<?php echo $submenuquery_fetch['submenu_url']; ?>"><?php echo $submenuquery_fetch['submenu_name']; ?></a></li>

                <?php } ?>
              </ul>
            </li>
          
          <?php } }} 
          else
          {
          $nomenu='False';
          }
          ?>
          </ul>
        </aside>

