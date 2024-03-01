<nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <!-- <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li> -->
                  <?php
                  $currentHour = date('H');

                  if ($currentHour >= 5 && $currentHour < 12) {
                  $greet= "Good morning";
                  } elseif ($currentHour >= 12 && $currentHour < 18) {
                  $greet= "Good afternoon";
                  } elseif ($currentHour >= 18 && $currentHour < 22) {
                  $greet= "Good evening";
                  } else {
                  $greet= "Hello";
                  }


                  ?>
             

              
             <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <label class="form-label"><h6><?php echo $greet." ". $_SESSION['staffName'].", you are welcome" ?></h6></label>
                </div>
              </form>
            </li>  
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <?php
              //include '../scripts/dbconn.php';
                        $query = "SELECT COUNT(*) as count FROM ws_mail_inbox WHERE receiver_id='".$_SESSION['staff_id']."' AND status='Unread'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $count = $row['count'];

              $query1 = "SELECT COUNT(*) as count FROM ws_mail_forward WHERE receiver_id='".$_SESSION['staff_id']."' AND status='Unread'";
          $result1 = mysqli_query($conn, $query1);
          $row1 = mysqli_fetch_assoc($result1);
          $count1 = $row1['count'];

                        ?>
              <span class="badge headerBadge1">
                <?php echo $count ?></span> </a>
                
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                <?php if($count>0){ ?>
                Messages
              <?php }else { ?>
                No new Messages
              <?php }
                 if($count>0){ ?>
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              <?php } ?>
              </div>
              <?php 
              $query1="SELECT * FROM ws_mail_inbox 
              inner join ws_staffprofile on ws_staffprofile.staff_id=ws_mail_inbox.sender_id
              WHERE receiver_id='".$_SESSION['staff_id']."' AND status='Unread'";
        $search_result1=mysqli_query($conn, $query1);
        while($fetch1 = mysqli_fetch_assoc($search_result1)){
          ?>

              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <i class="fas
                        fa-mail"></i>
                  </span> <span class="dropdown-item-desc"> <span class="message-user"><?php echo $fetch1['fname']." ".$fetch1['lname']?></span>
                    <span class="time messege-text"><?php echo $fetch1['subject'] ?></span>
                    
                    <span class="time"><?php echo $fetch1['time_sent'] ?></span>
                  </span>
                </a> 
              </div>
            <?php } ?>
              <div class="dropdown-footer text-center">
                <?php if($count>0){ ?>
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              <?php } ?>
              </div>
            </div>
          </li>

             
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
           
              <div class="dropdown-list-content dropdown-list-icons">
                   <?php 
              $query2="SELECT * FROM ws_mail_forward WHERE receiver_id='".$_SESSION['staff_id']."' AND status='Unread'";
        $search_result2=mysqli_query($conn, $query2);
        while($fetch2 = mysqli_fetch_assoc($search_result2)){
          ?>
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-file"></i>
                  </span> <span class="dropdown-item-desc"> <?php echo $fetch2['subject']?>
                  <span class="time"><?php echo $fetch2['time_sent']?></span>
                  </span>
                </a> 
              <?php } ?>
              </div>
           
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
              <?php 
              $gender=$_SESSION['gender'];
              $pp=$_SESSION['profile_pic'];
              if(empty($pp)){
              if($gender=="Male"){ ?>
              <img alt="image" src="assets/img/male.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                <?php } elseif($gender=="Female"){ ?>
                	<img alt="image" src="assets/img/female.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                 <?php } }else{ ?>
                 	<img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                 <?php } ?>
            <div class="dropdown-menu dropdown-menu-right pullDown">
            	<?php $fullname=$_SESSION['staffName'];?>
              <div class="dropdown-title"><?php echo $fullname ?></div>
              <a href="profile.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>