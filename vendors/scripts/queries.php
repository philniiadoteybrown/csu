<?php
require_once 'dbconn.php';
ini_set('display_errors', 0);
error_reporting(E_ALL);

if(isset($_POST['addstaffprofile'])){
     $staffid=mysqli_real_escape_string($conn, ($_POST['staff_id']));
     $fname=mysqli_real_escape_string($conn, ($_POST['fname']));
       $oname=mysqli_real_escape_string($conn, ($_POST['oname']));
      $lname=mysqli_real_escape_string($conn, ($_POST['lname']));
      $unit=mysqli_real_escape_string($conn, ($_POST['unit']));
      $rank=mysqli_real_escape_string($conn, ($_POST['rank']));
      $position=mysqli_real_escape_string($conn, ($_POST['position']));

           /* $query="SELECT * FROM ws_departments WHERE dept_id='$department'";
            $search_result=mysqli_query($conn, $query);
            while($fetch = mysqli_fetch_assoc($search_result)){
            $dept1=$fetch['dept_name'];
            }*/
            $query_="SELECT * FROM ws_admin_unit WHERE adu_id='$unit'";
            $search_result_=mysqli_query($conn, $query_);
            while($fetch_ = mysqli_fetch_assoc($search_result_)){
           $unit=$fetch_['adu_name'];
            }
            $query="SELECT * FROM ws_rank WHERE rank_id='$rank'";
            $search_result=mysqli_query($conn, $query);
            while($fetch = mysqli_fetch_assoc($search_result)){
            $rank1=$fetch['rank_name'];
            }

      
          $query = "SELECT * FROM ws_staffprofile WHERE staff_id='".$staffid."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         $warning="Record not saved. Record already exist";
            }
              else{
           $query="INSERT INTO `ws_staffprofile`(`staff_id`, `fname`, `oname`, `lname`, `unit`, `rank`, `position`)  VALUES ('".$staffid."','".$fname."','".$oname."', '".$lname."','".$unit."','".$rank1."', '".$position."')";
            $result=mysqli_query($conn, $query);

             if ($result){ 
            $success="Record successfully saved!";
             }
            else{
            $error="Record not saved. An error occured";
      }
       
              
  }
 
      }


//ADD USER//
if(isset($_POST['adduser'])){
      $username=mysqli_real_escape_string($conn, strtoupper($_POST['staff_id']));
      $pass=mysqli_real_escape_string($conn, ($_POST['password']));
      $pass2=mysqli_real_escape_string($conn, ($_POST['password-confirm']));
      $reset=mysqli_real_escape_string($conn, ($_POST['reset']));

$query="SELECT username FROM ws_users WHERE username='$username'";
$exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
echo'<script>alert("Username already exist")</script>';
            }
            elseif($pass != $pass2)
            {
                echo'<script>alert("Passwords do not match")</script>';
            }
            elseif(strlen($pass) < 3)
            {
                echo'<script>alert("Password must be more than three characters")</script>';
            }

              else{
            $query="INSERT INTO `ws_users`(`username`, `password`, `resetkey`) VALUES ('".$username."',md5($pass),md5($reset))";
            $result=mysqli_query($conn, $query);
            if ($result){
             echo'<script>alert("Saved successfully");
             window.location="login.php";
             </script>';
           }
                else{
          echo'<script>alert("Saved failed")</script>';
      }
          //   
            }
          }
        



/*//LOGIN
  if(isset($_POST['login'])){
  
      $username=mysqli_real_escape_string($conn, $_POST['staff_id']);
      $password=mysqli_real_escape_string($conn, $_POST['password']);
      $pass=md5($password);
      $pass1="";

      $check_login="SELECT * FROM ws_users WHERE username='".$username."' AND password='".$pass."'";
      $check_result=mysqli_query($conn, $check_login);
      if(mysqli_num_rows($check_result)==1){
       while($row=mysqli_fetch_assoc($check_result)){
            $_SESSION['login']='true';
            $_SESSION['username']=$username;
            $_SESSION['name']=$row['fname'].' '.$row['lname'];
            $_SESSION['role']=$row['position'];
            $_SESSION['user_id']=$row['user_id'];
                }
            
        //        if($_SESSION['flog']=='1'){
           // $_SESSION['login']='true';    
           //            header('location: html/flchangpass.php');  
           //        }
           //         else{
           //           if($_SESSION['log_access']=='1'){
                $successText="Welcome ". $_SESSION['fn'];
                header('location: index.php');  
                   }
                                
               }
               
           
               
        
      
      elseif(mysqli_num_rows($check_result)<=0){
            echo '<script>alert("Wrong Username or Password");
                 window.location="html/index.php";
                </script>';
      }
      */





//Change Password FLop
  if(isset($_POST['flchangepass'])){
      $newpass=mysqli_real_escape_string($conn, $_POST['newpassword']);
      $cnewpass=mysqli_real_escape_string($conn, $_POST['confirmpass']);
    $id=mysqli_real_escape_string($conn, $_POST['user_id']);
    $username=mysqli_real_escape_string($conn, $_POST['username']);

      if(strlen($newpass)<=3){
          echo '<script>alert("Password must be more than three (3) characters!")</script>';
      }
      elseif ($newpass != $cnewpass){
          echo '<script>alert("Passwords do not match");</script>';
      }
      else{
             $update="UPDATE dotusers SET password='".md5($newpass)."', flog='0' WHERE user_id='$id'";
           $update_result=mysqli_query($conn,$update);
              if($update_result){
                // $check_login="SELECT * FROM dotusers WHERE username='admin'";
                // $check_result=mysqli_query($conn, $check_login);
                // if(mysqli_num_rows($check_result)==1){
                if($username=='admin' || $username='superadmin'){
                // echo '<script>
                // alert("Password Changed!");
                // window.location="role_permission_list_admin.php";
                // </script>';
                // }
                // else{
                $query = "SELECT * FROM dotmmda_profile WHERE id='1'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows>0)
            {
                 echo '<script>
                 alert("Password Changed!");
                 window.location="index.php";
                 </script>';
            }else{
                 echo '<script>
                 alert("Password Changed!");
                 window.location="add_mmda_profile.php";
                 </script>';
                }
            }
                else{
                     echo '<script>
                 alert("Password Changed!");
                 window.location="index.php";
                 </script>';
                }
      }
              else{
                   echo '<script>alert("Something went wrong!")</script>';
              }
    
      }
  }

//SAVE MMDA PROFILE 
  if(isset($_POST['add_mmdaprofile']))      
{
    $mmda_name=mysqli_real_escape_string($conn, strtoupper($_POST['mmda_name']));
    $mmda_ini=mysqli_real_escape_string($conn, strtoupper($_POST['mmda_ini']));
    $email=mysqli_real_escape_string($conn, strtolower($_POST['email']));
    $website=mysqli_real_escape_string($conn, strtolower($_POST['website']));
    $phone=mysqli_real_escape_string($conn, strtoupper($_POST['phone']));
    $address=mysqli_real_escape_string($conn, strtoupper($_POST['address']));

      $file_data=addslashes($_FILES['mmda_logo']['tmp_name']);
        $file_name=$mmda_ini."_logo";
        $file_data=file_get_contents($file_data);
        $file_data=base64_encode($file_data);
        $maxsize=100000;
        if($_FILES['mmda_logo']['size']>=$maxsize){
        
              echo '<script>alert("File size is too large. File size must be less than or equal to 1MB")</script>';
        }
   else{
   
        $query = "SELECT * FROM dotmmda_profile WHERE id='1'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows>0)
            {
         $qry="UPDATE `dotmmda_profile` SET `mmda_name`='".$mmda_name."',`mmda_ini`='".$mmda_ini."', `email`='".$email."', `website`='".$website."', `phone`='".$phone."', `address`='".$address."',`logo`='".$file_data."' WHERE id='1'";
    $result=mysqli_query($conn, $qry);
    if($result){
        echo 'alert("Profle updated successfully");
                window.location="index.php";
                </script>';
    }
    else
    {
       echo'<script>alert("Profle update Failed")</script>';
    }
            }

        else
        {
        
    $qry="INSERT INTO `dotmmda_profile` (`mmda_name`, `mmda_ini`, `email`, `website`, `phone`, `address`, `logo`) VALUES ('$mmda_name','$mmda_ini','$email','$website','$phone','$address','$file_data')";
    $result=mysqli_query($conn, $qry);
    if($result){

               echo '<script>alert("Profle saved successfully");
                window.location="index.php";
                </script>';
    }
    else
    {
       echo'<script>alert("Profile save failed")</script>';
    }
        }
    }
}


  //Reset Password
  if(isset($_POST['respass'])){
      $username=mysqli_real_escape_string($conn, $_POST['username']);
      $security=mysqli_real_escape_string($conn, $_POST['pkey']);
      $check_login="SELECT * FROM dotusers WHERE username='$username' AND recovery_key='".md5($security)."'";
      $check_result=mysqli_query($conn, $check_login);
      if(mysqli_num_rows($check_result)>0){
        while($row=mysqli_fetch_assoc($check_result)){
            $pass=substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",6)),0,6);//Generate random password here
         $update="UPDATE dotusers SET password='".md5($pass)."' WHERE username='".$username."'";
           $update_result=mysqli_query($conn,$update);
               if($update_result && $update_result){
                $passw="Your New Password is : ". $pass;

              //  echo '<script>alert("Your New Password is : ". $pass)</script>';
          // $passw="Your New Password is : ". $pass;
      }
            else{
              echo '<script>alert("Reset failed!")</script>';
            }
      }
      }
      else{
         echo '<script>alert("Something went wrong! Wrong username or security word")</script>'; 
      }
           
      }

//Change Password
  if(isset($_POST['update_userprofile'])){
      $newpass=mysqli_real_escape_string($conn, $_POST['newpassword']);
      $cnewpass=mysqli_real_escape_string($conn, $_POST['cnewpassword']);
      $oldpass=mysqli_real_escape_string($conn, $_POST['oldpassword']);
      $fname=mysqli_real_escape_string($conn, $_POST['fname']);
      $lname=mysqli_real_escape_string($conn, $_POST['lname']);
      $passrecover=mysqli_real_escape_string($conn, $_POST['passrecover']);
    $id=mysqli_real_escape_string($conn, $_POST['user_id']);
      if(strlen($newpass)<=3){
          echo '<script>alert("Password must be more than three (3) characters!")</script>';
      }
      elseif ($newpass != $cnewpass){
          echo '<script>alert("Passwords do not match!")</script>';
      }
      else{
      $check_login="SELECT * FROM dotusers WHERE user_id='".$id."' AND password='".md5($oldpass)."'";
      $check_result=mysqli_query($conn, $check_login);
      if(mysqli_num_rows($check_result)==1){
       while($row=mysqli_fetch_assoc($check_result)){
        $_SESSION['oldp']=$row['password'];
         $update="UPDATE dotusers SET password='".md5($newpass)."', fname='".$fname."', lname='".$lname."', recovery_key='".md5($passrecover)."' WHERE user_id='$id'";
           $update_result=mysqli_query($conn,$update);
              if($update_result){
                echo '<script>alert("Profile/Password Changed!");
                window.location="index.php";
                </script>';
      }
              else{
                   echo '<script>alert("Something went wrong!")</script>';
              }
    
      }
  }
                 else{
                      echo '<script>alert("Old password is not correct!")</script>';
       }
       }
     }
     


 //SAVE MMDA PROFILE 
  if(isset($_POST['update_mmdaprofile']))      
{
    $mmda_name=mysqli_real_escape_string($conn, strtoupper($_POST['mmda_name']));
    $mmda_ini=mysqli_real_escape_string($conn, strtoupper($_POST['mmda_ini']));
    $email=mysqli_real_escape_string($conn, strtolower($_POST['email']));
    $website=mysqli_real_escape_string($conn, strtolower($_POST['website']));
    $phone=mysqli_real_escape_string($conn, strtoupper($_POST['phone']));
    $address=mysqli_real_escape_string($conn, strtoupper($_POST['address']));

         $qry="UPDATE `dotmmda_profile` SET `mmda_name`='".$mmda_name."',`mmda_ini`='".$mmda_ini."', `email`='".$email."', `website`='".$website."', `phone`='".$phone."', `address`='".$address."' WHERE id='1'";
    $result=mysqli_query($conn, $qry);
    if($result){
        echo 'alert("Profle updated successfully");
                </script>';
    }
    else
    {
       echo'<script>alert("Profle update Failed")</script>';
    }
           
}


 //SAVE MMDA PROFILE 
  if(isset($_POST['savelogo']))      
{
    $mmda_name=mysqli_real_escape_string($conn, strtoupper($_POST['mmda_name']));
    $mmda_ini=mysqli_real_escape_string($conn, strtoupper($_POST['mmda_ini']));
    $email=mysqli_real_escape_string($conn, strtolower($_POST['email']));
    $website=mysqli_real_escape_string($conn, strtolower($_POST['website']));
    $phone=mysqli_real_escape_string($conn, strtoupper($_POST['phone']));
    $address=mysqli_real_escape_string($conn, strtoupper($_POST['address']));

      $file_data=addslashes($_FILES['logo']['tmp_name']);
        $file_name=$mmda_ini."_logo";
        $file_data=file_get_contents($file_data);
        $file_data=base64_encode($file_data);
        $maxsize=200000; 
        if($_FILES['mmda_logo']['size']>$maxsize){
        
              echo '<script>alert("File size is too large. File size must be less than or equal to 1MB")</script>';
        }
   else{
   
         $qry="UPDATE `dotmmda_profile` SET `logo`='".$file_data."' WHERE id='1'";
    $result=mysqli_query($conn, $qry);
    if($result){
        echo 'alert("Profle updated successfully");
                window.location="index.php";
                </script>';
    }
    else
    {
       echo'<script>alert("Profle update Failed")</script>';
    }
            }

}


//ADD MENU

  if(isset($_POST['addmenu'])){
      $menu_name=mysqli_real_escape_string($conn, ($_POST['menu_name']));
       $menu_icon=mysqli_real_escape_string($conn, ($_POST['menu_icon']));
     //  $menu_location=mysqli_real_escape_string($conn, ($_POST['menu_location']));
      
      
          $query = "SELECT * FROM ws_menu WHERE menu_name='".$menu_name."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
            $warning2="Record not saved. Record already exist";
            }
              else{
           $query="INSERT INTO `ws_menu`(`menu_name`, `menu_icon`) VALUES ('".$menu_name."','".$menu_icon."')";
            $result=mysqli_query($conn, $query);
            if ($result){ 
            echo'<script>alert("Record saved successfully");
             window.location="menu.php";
             </script>';
             }
            else{
            echo'<script>alert("An error occured");
             window.location="menu.php";
             </script>';
      }
              
  }
      }

//ADD MENU

  if(isset($_POST['update_menu'])){
      $menu_name=mysqli_real_escape_string($conn, ($_POST['menu_name']));
       $menu_id=mysqli_real_escape_string($conn, ($_POST['menu_id']));
       $menu_icon=mysqli_real_escape_string($conn, ($_POST['menu_icon']));
      
      
           $query="UPDATE `ws_menu` SET `menu_name`='".$menu_name."',`menu_icon`='".$menu_icon."' WHERE `menu_id`='".$menu_id."'";
            $result=mysqli_query($conn, $query);
            if ($result){
             echo'<script>alert("Updated successfully");
             window.location="menu.php";
             </script>';
              }
            else{
          $error="Record not saved. An error occured while saving.";
      }
              
  }

if(isset($_POST['changestatusE'])){
       $menu_id=mysqli_real_escape_string($conn, ($_POST['menu_id']));      
      
           $query="UPDATE `ws_menu` SET `menu_status`='Disabled' WHERE `menu_id`='".$menu_id."'";
            $result=mysqli_query($conn, $query);
           if ($result){
            $success="Record updated successfully";
              }
            else{
            $error="Record not saved. An error occured while saving.";
      }
              
  }
if(isset($_POST['changestatusD'])){
       $menu_id=mysqli_real_escape_string($conn, ($_POST['menu_id']));      
      
           $query="UPDATE `ws_menu` SET `menu_status`='Enabled' WHERE `menu_id`='".$menu_id."'";
            $result=mysqli_query($conn, $query);
           if ($result){
            $success="Record updated successfully";
              }
            else{
            $error="Record not saved. An error occured while saving.";
      }
              
  } 

  //ADD SUBMENU

  if(isset($_POST['addsubmenu'])){
     $menu_id=mysqli_real_escape_string($conn, ($_POST['menu_id']));
       $menu_url=mysqli_real_escape_string($conn, ($_POST['submenu_url']));
      $submenu_name=mysqli_real_escape_string($conn, ($_POST['submenu_name']));
      $submenu_order=mysqli_real_escape_string($conn, ($_POST['submenu_display']));
      /*$manunit=mysqli_real_escape_string($conn, ($_POST['man_unit']));*/
      
          $query = "SELECT * FROM ws_submenu WHERE submenu_name='".$submenu_name."' AND menu_id='".$menu_id."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         $warning="Record not saved. Record already exist";
            }
              else{
           $query="INSERT INTO `ws_submenu`(`menu_id`, `submenu_name`, `submenu_url`, `submenu_order`) VALUES ('".$menu_id."','".$submenu_name."','".$menu_url."', '".$submenu_order."')";
            $result=mysqli_query($conn, $query);

                $lastID = mysqli_insert_id($conn);
                
                foreach ($_POST['unit'] as $key => $value) {
                $unit=$_POST['unit'][$key];

                $subquery="INSERT INTO `ws_submenu_department`(`menu_id`, `submenu_id`, `adu_id`)  VALUES ('".$menu_id."','".$lastID."','".$unit."')";
                $subresult=mysqli_query($conn, $subquery);
                }

             if ($result){ 
            echo'<script>alert("Record saved successfully");
             window.location="submenu.php";
             </script>';
             }
            else{
            echo'<script>alert("An error occured");
             window.location="submenu.php";
             </script>';
      }
       
              
  }
 
      }


//UPDATE SUBMENU

  if(isset($_POST['update_submenu'])){
     $menu_id=mysqli_real_escape_string($conn, ($_POST['menu_id']));
       $menu_url=mysqli_real_escape_string($conn, ($_POST['submenu_url']));
      $submenu_name=mysqli_real_escape_string($conn, ($_POST['submenu_name']));
      $submenu_order=mysqli_real_escape_string($conn, ($_POST['submenu_order']));
      $submenu_id=mysqli_real_escape_string($conn, ($_POST['submenu_id']));
      /*$manunit=mysqli_real_escape_string($conn, ($_POST['man_unit']));*/
      
          
           $query="UPDATE `ws_submenu` SET `menu_id`='".$menu_id."', `submenu_name`='".$submenu_name."', `submenu_url`='".$menu_url."', `submenu_order`='".$submenu_order."' WHERE submenu_id='".$submenu_id."'";
            $result=mysqli_query($conn, $query);

             $lastID = mysqli_insert_id($conn);
                
                foreach ($_POST['unit'] as $key => $value) {
                $manunit=$_POST['unit'][$key];

                $query = "SELECT * FROM ws_submenu_department WHERE adu_id='".$manunit."' AND submenu_id='".$submenu_id."'"; 
          $exist=mysqli_query($conn, $query);
            if (!$exist->num_rows){
         $subquery="INSERT INTO `ws_submenu_department`(`menu_id`, `submenu_id`, `adu_id`)  VALUES ('".$menu_id."','".$submenu_id."','".$manunit."')";
                $subresult=mysqli_query($conn, $subquery);
            
                }

            if ($result){
             $success_save="Record successfully updated";
             header('refresh:0.2; url=submenu.php');
              echo '
                <script>
        var countElement=document.querySelector(".count");
        var count = 0.2;
        var handler = () ==>{
        countElement.InnerHTML=count--;
        if(count===0) clearInterval
        };
        var timer =setInterval(handler,1000);
        </script>';
              }
            else{
          $error_save="Record failed to update";
      }
              
  }
}
      
if(isset($_POST['changestatusEsub'])){
       $submenu_id=mysqli_real_escape_string($conn, ($_POST['submenu_id']));      
      
           $query="UPDATE `ws_submenu` SET `submenu_status`='Disabled' WHERE `submenu_id`='".$submenu_id."'";
            $result=mysqli_query($conn, $query);
           if ($result){
            $success="Record updated successfully";
              }
            else{
            $error="Record not saved. An error occured while saving.";
      }
              
  }
if(isset($_POST['changestatusDsub'])){
       $submenu_id=mysqli_real_escape_string($conn, ($_POST['submenu_id']));      
      
           $query="UPDATE `ws_submenu` SET `submenu_status`='Enabled' WHERE `submenu_id`='".$submenu_id."'";
            $result=mysqli_query($conn, $query);
           if ($result){
            $success="Record updated successfully";
              }
            else{
            $error="Record not saved. An error occured while saving.";
      }
              
  } 

  if(isset($_POST['changedisplayEsub'])){
       $submenu_id=mysqli_real_escape_string($conn, ($_POST['submenu_id']));      
      
           $query="UPDATE `ws_submenu` SET `submenu_display`='No' WHERE `submenu_id`='".$submenu_id."'";
            $result=mysqli_query($conn, $query);
           if ($result){
            $success="Record updated successfully";
              }
            else{
            $error="Record not saved. An error occured while saving.";
      }
              
  }
if(isset($_POST['changedisplayDsub'])){
       $submenu_id=mysqli_real_escape_string($conn, ($_POST['submenu_id']));      
      
           $query="UPDATE `ws_submenu` SET `submenu_display`='Yes' WHERE `submenu_id`='".$submenu_id."'";
            $result=mysqli_query($conn, $query);
           if ($result){
            $success="Record updated successfully";
              }
            else{
            $error="Record not saved. An error occured while saving.";
      }
              
  } 

//ADD ROLE

  if(isset($_POST['addrole'])){
      $role_name=mysqli_real_escape_string($conn, ($_POST['role_name']));
      
          $query = "SELECT * FROM ws_roles WHERE role_name='".$role_name."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
          $warning="Record not saved. Record already exist";
            }
              else{
           $query="INSERT INTO `ws_roles`(`role_name`) VALUES ('".$role_name."')";
            $result=mysqli_query($conn, $query);
            if ($result){
             $success="Record successfully saved!";
              }
            else{
          $error="Record not saved. An error occured while saving.";
      }
              
  }
      }



//UPDATE PERMISSION

  if(isset($_POST['update_user_permission'])){
    $user_id=mysqli_real_escape_string($conn, ($_POST['user_id']));
    if($user_id!=''){
      
      $delquery="DELETE FROM `ws_menu_useraccess` WHERE `user_id`='$user_id'";
      $delresult=mysqli_query($conn, $delquery);

      foreach ($_POST['user_permission'] as $key => $value) {
        $user_permission=$_POST['user_permission'][$key];
        $menu_id=$_POST['menu_id'][$key];
        $submenu_id=$_POST['submenu_id'][$key];

        $query="INSERT INTO `ws_menu_useraccess`(`menu_id`, `submenu_id`, `user_id`, `user_permission`) VALUES ('".$menu_id."','".$submenu_id."','".$user_id."','".$user_permission."')";
            $result=mysqli_query($conn, $query);
            
      }
      if ($result){
             $success="Updated successfully!";
              }
            else{
          $success="Updating failed!";
      }
    }
      }


  //UPDATE PERMISSION ROLE

  if(isset($_POST['saveroleperm'])){
    $role_id=mysqli_real_escape_string($conn, ($_POST['role_id']));
    if($role_id!=''){
      
      $delquery="DELETE FROM `ws_menu_roleaccess` WHERE `role_id`='$role_id'";
      $delresult=mysqli_query($conn, $delquery);

      foreach ($_POST['user_permission'] as $key => $value) {
        $user_permission=$_POST['user_permission'][$key];
        $menu_id=$_POST['menu_id'][$key];
        $submenu_id=$_POST['submenu_id'][$key];

        $query="INSERT INTO `ws_menu_roleaccess`(`menu_id`, `submenu_id`, `role_id`, `user_permission`) VALUES ('".$menu_id."','".$submenu_id."','".$role_id."','".$user_permission."')";
            $result=mysqli_query($conn, $query);
            
      }
      if ($result){
             $success="Record successfully saved!";
              }
            else{
          $error="Record not saved!";
      }
    }
      }

if(isset($_POST['saverolepermadmin'])){
    $role_id=mysqli_real_escape_string($conn, ($_POST['role_id']));
    if($role_id!=''){
      
      $delquery="DELETE FROM `ws_menu_roleaccess` WHERE `role_id`='$role_id'";
      $delresult=mysqli_query($conn, $delquery);

      foreach ($_POST['user_permission'] as $key => $value) {
        $user_permission=$_POST['user_permission'][$key];
        $menu_id=$_POST['menu_id'][$key];
        $submenu_id=$_POST['submenu_id'][$key];

        $query="INSERT INTO `ws_menu_roleaccess`(`menu_id`, `submenu_id`, `role_id`, `user_permission`) VALUES ('".$menu_id."','".$submenu_id."','".$role_id."','".$user_permission."')";
            $result=mysqli_query($conn, $query);
            
      }
      if ($result){
        $querymmda = "SELECT * FROM dotmmda_profile"; 
          $exist=mysqli_query($conn, $querymmda);
            if ($exist->num_rows>0){
             echo'<script>alert("Updated successfully");
             window.location="index.php";
             </script>';
              }
              else{
              echo'<script>alert("Updated successfully");
             window.location="add_mmda_profile.php";
             </script>';  
              }
            }
            else{
          echo'<script>alert("Update failed")</script>';
      }
    }
      }






//UPDATE USER//
if(isset($_POST['update_user'])){
      $fname=mysqli_real_escape_string($conn, strtoupper($_POST['fname']));
      $lname=mysqli_real_escape_string($conn, strtoupper($_POST['lname']));
      $username=mysqli_real_escape_string($conn, ($_POST['username']));
      $role=mysqli_real_escape_string($conn, ($_POST['role']));
      $id=mysqli_real_escape_string($conn, ($_POST['user_id']));


            $query="UPDATE `dotusers` SET `fname`='".$fname."', `lname`='".$lname."', `username`='".$username."', `role`='".$role."' WHERE `user_id`='".$id."'";
            $result=mysqli_query($conn, $query);
            if ($result){
             echo'<script>alert("Saved successfully");
             window.location="users.php";
             </script>';
           }
                else{
          echo'<script>alert("Saved failed")</script>';
      }
          //   
            }
          
        
    //ADD FILE CATEGORY

  if(isset($_POST['addfile_category'])){
      $filecat_name=mysqli_real_escape_string($conn, strtoupper($_POST['filecat_name']));
       $filecat_disc=mysqli_real_escape_string($conn, ($_POST['filecat_disc']));
     //  $menu_location=mysqli_real_escape_string($conn, ($_POST['menu_location']));
      
      
          $query = "SELECT * FROM dotfile_category WHERE filecat_name='".$filecat_name."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         echo'<script>alert("Category already exist")</script>';
            }
              else{
           $query="INSERT INTO `dotfile_category`(`filecat_name`, `filecat_description`) VALUES ('".$filecat_name."','".$filecat_disc."')";
            $result=mysqli_query($conn, $query);
            if ($result){
             echo'<script>alert("Saved successfully")</script>';
              }
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
      }

     //EDIT FILE CATEGORY

  if(isset($_POST['update_filecat'])){
      $filecat_name=mysqli_real_escape_string($conn, strtoupper($_POST['filecat_name']));
       $filecat_disc=mysqli_real_escape_string($conn, ($_POST['filecat_disc']));
     $id=mysqli_real_escape_string($conn, ($_POST['filecat_id']));
      
           $query="UPDATE `dotfile_category` SET `filecat_name`='".$filecat_name."',`filecat_description`='".$filecat_disc."' WHERE `filecat_id`='".$id."'";
            $result=mysqli_query($conn, $query);
            if ($result){

             $query="UPDATE `dotadministrative_files` SET `filecategory`='".$filecat_name."' WHERE `filecat_id`='".$id."'";
            $result=mysqli_query($conn, $query);
            if ($result){ 

             echo'<script>alert("Saved successfully");
             window.location="file_category.php";
             </script>';
              }
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
      }

   //ADD MANAGEMENT UNIT

  if(isset($_POST['addman_unit'])){
      $manunit_name=mysqli_real_escape_string($conn, strtoupper($_POST['manunit_name']));
       $description=mysqli_real_escape_string($conn, ($_POST['description']));
      
      
          $query = "SELECT * FROM dotmanagement_unit WHERE manunit_name='".$manunit_name."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         echo'<script>alert("Name already exist")</script>';
            }
              else{
           $query="INSERT INTO `dotmanagement_unit` (`manunit_name`, `description`) VALUES ('".$manunit_name."','".$description."')";
            $result=mysqli_query($conn, $query);
            if ($result){
             echo'<script>alert("Saved successfully")</script>';
              }
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
      }

  //ADD ADMIN FILE

  if(isset($_POST['addadmin_file'])){
      $filename=mysqli_real_escape_string($conn, strtoupper($_POST['filename']));
      $filenumber=mysqli_real_escape_string($conn, strtoupper($_POST['filenumber']));
      $filecat=mysqli_real_escape_string($conn, strtoupper($_POST['filecat_id']));
       $description=mysqli_real_escape_string($conn, ($_POST['description']));
     //  $menu_location=mysqli_real_escape_string($conn, ($_POST['menu_location']));
      $newfilenumber=str_replace("/", "_", $filenumber);
      
          $query = "SELECT * FROM dotadministrative_files WHERE filename='".$filename."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         echo'<script>alert("File name already exist")</script>';
            }
              else{
                if(!file_exists($newfilenumber)){
                mkdir("../assets/includes/uploads/admin_files/".$newfilenumber);
                $createIndex=fopen("../assets/includes/uploads/admin_files/".$newfilenumber."/index.php", "w");
                $errorText='<h2 class="mb-2 mx-2">Access Denied :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 You dont have permissions to access this page. Please contact administrator.</p>
    <a href="../../../../../html/index.php" class="btn btn-primary">Back to home</a>';
                $createText=fwrite($createIndex, $errorText);
                fclose($createIndex);

                  $userquery="SELECT * FROM `dotfile_category` WHERE filecat_id='".$filecat."'";
            $usersearch_result=mysqli_query($conn, $userquery);
            if(mysqli_num_rows($usersearch_result)==1){
       while($row=mysqli_fetch_assoc($usersearch_result)){
              $filecategory_=$row['filecat_name'];
            }
          }

           $query="INSERT INTO `dotadministrative_files`(`filename`, `filenumber`, `filecategory`, `description`, `filecat_id`) VALUES ('".$filename."','".$filenumber."','".$filecategory_."','".$description."','".$filecat."')";
            $result=mysqli_query($conn, $query);
            if ($result){

             echo'<script>alert("Saved successfully")</script>';
              } 
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
  else{
    echo'<script>alert("Folder already exist")</script>';
  }
      }
      } 

//EDIT ADMIN FILE

  if(isset($_POST['update_adminfile'])){
    $id=mysqli_real_escape_string($conn, strtoupper($_POST['adminfile_id']));
      $filename=mysqli_real_escape_string($conn, strtoupper($_POST['filename']));
      $oldfilenumber=mysqli_real_escape_string($conn, strtoupper($_POST['oldfilenumber']));
      $filenumber=mysqli_real_escape_string($conn, strtoupper($_POST['filenumber']));
      $filecategory=mysqli_real_escape_string($conn, strtoupper($_POST['filecategory']));
       $description=mysqli_real_escape_string($conn, ($_POST['description']));
     //  $menu_location=mysqli_real_escape_string($conn, ($_POST['menu_location']));
       $newfilenumber=str_replace("/", "_", $filenumber);
      
           $query="UPDATE `dotadministrative_files` SET `filename`='".$filename."', `filenumber`='".$filenumber."', `filecategory`='".$filecategory."', `description`='".$description."' WHERE `adminfile_id`='".$id."'";
            $result=mysqli_query($conn, $query);
            if ($result){

              $old_folder = "../assets/includes/uploads/admin_files/".$oldfilenumber;
              $new_folder = "../assets/includes/uploads/admin_files/".$newfilenumber;

if (is_dir($old_folder)) {
  // Rename the folder
  if (rename($old_folder, $new_folder)) {

    $query="UPDATE `dotfiles` SET `filename`='".$filename."', `filenumber`='".$filenumber."' WHERE `adminfile_id`='".$id."'";
            $result=mysqli_query($conn, $query);
            if ($result){

             echo'<script>alert("Saved successfully")
             window.location="administrative_files.php";
             </script>';

              } 
            else{
          echo'<script>alert("Saved failed")</script>';
      }
  } else {
    echo "An error occurred while updating.";
  }
} else {
  echo "The folder does not exist.";
}
           

    }
              
  }
      


  //ADD PERSONAL FILE

  if(isset($_POST['addpersonal_file'])){
      $filename=mysqli_real_escape_string($conn, strtoupper($_POST['filename']));
      $filenumber=mysqli_real_escape_string($conn, strtoupper($_POST['filenumber']));
      $manunit_name=mysqli_real_escape_string($conn, strtoupper($_POST['manunit']));
       $description=mysqli_real_escape_string($conn, ($_POST['description']));
      $newfilenumber=str_replace("/", "_", $filenumber);
      
          $query = "SELECT * FROM dotpersonal_files WHERE filename='".$filename."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         echo'<script>alert("File name already exist")</script>';
            }
              else{
                if(!file_exists($newfilenumber)){
                mkdir("../assets/includes/uploads/personal_files/".$newfilenumber);
                $createIndex=fopen("../assets/includes/uploads/personal_files/".$newfilenumber."/index.php", "w");
                $errorText='<h2 class="mb-2 mx-2">Access Denied :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 You dont have permissions to access this page. Please contact administrator.</p>
    <a href="../../../../../html/index.php" class="btn btn-primary">Back to home</a>';
                $createText=fwrite($createIndex, $errorText);
                fclose($createIndex);

           $query="INSERT INTO `dotpersonal_files`(`filename`, `filenumber`, `manunit_name`, `description`) VALUES ('".$filename."','".$filenumber."','".$manunit_name."','".$description."')";
            $result=mysqli_query($conn, $query);
            if ($result){
             echo'<script>alert("Saved successfully")</script>';
              }
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
  else{
    echo'<script>alert("Folder already exist")</script>';
  }

      } 
    } 

//RECEIVE MAIL AND CONT.

  if(isset($_POST['save_and_cont'])){
      $date_received=mysqli_real_escape_string($conn, strtoupper($_POST['date_received']));
      $reg_number=mysqli_real_escape_string($conn, strtoupper($_POST['reg_number']));
      $reg_prefix=mysqli_real_escape_string($conn, strtoupper($_POST['reg_prefix']));
      $whom_received=mysqli_real_escape_string($conn, strtoupper($_POST['whom_received']));
      $letter_date=mysqli_real_escape_string($conn, strtoupper($_POST['letter_date']));
      $ref_number=mysqli_real_escape_string($conn, strtoupper($_POST['ref_number']));
      $subject=mysqli_real_escape_string($conn, strtoupper($_POST['subject']));
      $received_by=mysqli_real_escape_string($conn, strtoupper($_POST['received_by']));
      $year_rec=date("Y");
       $registry_number=$reg_prefix.''.$reg_number;
      
      
          $query = "SELECT * FROM dotreceive_mail WHERE registry_number='".$registry_number."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         echo'<script>alert("Registry number already exist")</script>';

             header('location: add_incoming_mail.php');
            }
              else{
           $query="INSERT INTO `dotreceive_mail`(`date_received`, `registry_number`, `whom_received`, `letter_date`, `ref_number`, `subject`, `received_by`, `year_rec`) VALUES ('".$date_received."','".$registry_number."','".$whom_received."','".$letter_date."','".$ref_number."','".$subject."','".$received_by."','".$year_rec."')";
            $result=mysqli_query($conn, $query);
            if ($result){
             
             echo'<script>
                alert("Saved successfully");
                window.location="incoming_mails_register.php";
                </script>';
              }
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
      } 

  //RECEIVE MAIL AND ADD.

  if(isset($_POST['save_and_add'])){
      $date_received=mysqli_real_escape_string($conn, strtoupper($_POST['date_received']));
      $reg_number=mysqli_real_escape_string($conn, strtoupper($_POST['reg_number']));
      $reg_prefix=mysqli_real_escape_string($conn, strtoupper($_POST['reg_prefix']));
      $whom_received=mysqli_real_escape_string($conn, strtoupper($_POST['whom_received']));
      $letter_date=mysqli_real_escape_string($conn, strtoupper($_POST['letter_date']));
      $ref_number=mysqli_real_escape_string($conn, strtoupper($_POST['ref_number']));
      $subject=mysqli_real_escape_string($conn, strtoupper($_POST['subject']));
      $received_by=mysqli_real_escape_string($conn, strtoupper($_POST['received_by']));
      $year_rec=date("Y");
       $registry_number=$reg_prefix.''.$reg_number;
      
      
          $query = "SELECT * FROM dotreceive_mail WHERE registry_number='".$registry_number."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         echo'<script>alert("Registry number already exist");
         window.location="add_incoming_mail.php";
         </script>';
            }
              else{
           $query="INSERT INTO `dotreceive_mail`(`date_received`, `registry_number`, `whom_received`, `letter_date`, `ref_number`, `subject`, `received_by`, `year_rec`) VALUES ('".$date_received."','".$registry_number."','".$whom_received."','".$letter_date."','".$ref_number."','".$subject."','".$received_by."','".$year_rec."')";
            $result=mysqli_query($conn, $query);
            if ($result){
             echo' <script>
                alert("Saved successfully");
                window.location="add_incoming_mail.php";
                </script>';
              }
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
      } 

  //EDIT MAIL AND CONT.

  if(isset($_POST['update_recmail'])){
    $recid=mysqli_real_escape_string($conn, strtoupper($_POST['rec_id']));
      $date_received=mysqli_real_escape_string($conn, strtoupper($_POST['date_received']));
      $reg_number=mysqli_real_escape_string($conn, strtoupper($_POST['reg_number']));
      $reg_prefix=mysqli_real_escape_string($conn, strtoupper($_POST['reg_prefix']));
      $whom_received=mysqli_real_escape_string($conn, strtoupper($_POST['whom_received']));
      $letter_date=mysqli_real_escape_string($conn, strtoupper($_POST['letter_date']));
      $ref_number=mysqli_real_escape_string($conn, strtoupper($_POST['ref_number']));
      $subject=mysqli_real_escape_string($conn, strtoupper($_POST['subject']));
      $received_by=mysqli_real_escape_string($conn, strtoupper($_POST['received_by']));
      
              
           $update_query="UPDATE `dotreceive_mail` SET `date_received`='".$date_received."',`whom_received`='".$whom_received."',`letter_date`='".$letter_date."',`ref_number`='".$ref_number."',`subject`='".$subject."',`received_by`='".$received_by."' WHERE `registry_number`='".$reg_number."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

              $update_query1="UPDATE `dotfiles` SET `date_received`='".$date_received."', `subject`='".$subject."' WHERE `mail_id`='".$reg_number."'";
            $result1=mysqli_query($conn, $update_query1);
            if ($result1){
             echo'
              <script>
                alert("Saved successfully");
                window.location="incoming_mails_register.php";
                </script>
             ';
              }
            }
            else{
          echo'<script>
                alert("An error occured");
                </script>';
      }
              
  }
  
  //ATTACH RECEIVED MAIL
  if(isset($_POST['attach_recmail'])) {
    
    $regNumber=mysqli_real_escape_string($conn, $_POST['reg_number']);
    $file=$_FILES['file'];

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotreceive_mail` SET `file_copy`='".$fileNameNew."',`mail_status`='FORWARDING' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

          $fileDestination='../assets/includes/uploads/rec_files/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="incoming_mails_register.php";
                </script>';
        }
      }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
      }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }


  }


  //RE-ATTACH RECEIVED MAIL
  if(isset($_POST['re_attach_recmail'])) {
    
    $oldfile=mysqli_real_escape_string($conn, $_POST['oldfile']);
    $regNumber=mysqli_real_escape_string($conn, $_POST['reg_number']);
    $file=$_FILES['file'];

    $path='../assets/includes/uploads/rec_files/'.$oldfile;
    if(!unlink($path)){
      echo'<script>alert("Error occur. Old file not found. New file will be created.")</script>';

      $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotreceive_mail` SET `file_copy`='".$fileNameNew."',`mail_status`='FORWARDING' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

          $fileDestination='../assets/includes/uploads/rec_files/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="incoming_mails_register.php";
                </script>';
        }
      }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
      }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }

    }
    else{

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotreceive_mail` SET `file_copy`='".$fileNameNew."',`mail_status`='FORWARDING' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

          $fileDestination='../assets/includes/uploads/rec_files/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="incoming_mails_register.php";
                </script>';
        }
      }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
      }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }
}

  }


//FILE RECEIVED MAIL
  if(isset($_POST['file_recmail'])) {
    $rec_id=mysqli_real_escape_string($conn, $_POST['rec_id']);
    $regNumber=mysqli_real_escape_string($conn, $_POST['reg_number']);
    $fileNumber=mysqli_real_escape_string($conn, $_POST['filenumber']);
    $date_received=mysqli_real_escape_string($conn, $_POST['date_received']);
    $subject=mysqli_real_escape_string($conn, $_POST['subject']);
    $file=$_FILES['file'];

    $newfilenumber=str_replace("/", "_", $fileNumber);

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotreceive_mail` SET `filed_copy`='".$fileNameNew."',`mail_status`='FILED', `filing_date`='".date("Y-m-d")."' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

              $userquery="SELECT * FROM `dotadministrative_files` WHERE filenumber='".$fileNumber."'";
            $usersearch_result=mysqli_query($conn, $userquery);
            if(mysqli_num_rows($usersearch_result)==1){
       while($row=mysqli_fetch_assoc($usersearch_result)){
              $adminfilename=$row['filename'];
              $adminfile_id=$row['adminfile_id'];
            }
          }
            $insertFile="INSERT INTO `dotfiles`(`mail_id`,`subject`, `date_received`, `filename`, `filenumber`, `filed_mail`, `date_filed`, `mail_type`, `adminfile_id`, `rec_id`) VALUES('".$regNumber."','".$subject."','".$date_received."','".$adminfilename."','".$fileNumber."','".$fileNameNew."','".date('Y-m-d')."','RECEIVED','".$adminfile_id."', '".$rec_id."')";
              $result=mysqli_query($conn, $insertFile);
            if ($result){
          $fileDestination='../assets/includes/uploads/admin_files/'.$newfilenumber.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="incoming_mails_register.php";
                </script>';
        }
        else{
          echo'<script>alert("Filing failed")</script>';
        }
      }
      else{
          echo'<script>alert("Filing failed")</script>';
        }
    }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
    }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    
  }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }
  }



//RE-FILE RECEIVED MAIL
  if(isset($_POST['re_file_recmail'])) {
    $rec_id=mysqli_real_escape_string($conn, $_POST['rec_id']);
    $regNumber=mysqli_real_escape_string($conn, $_POST['reg_number']);
    $fileNumber=mysqli_real_escape_string($conn, $_POST['filenumber']);
    $date_received=mysqli_real_escape_string($conn, $_POST['date_received']);
    $subject=mysqli_real_escape_string($conn, $_POST['subject']);
    $oldfile=mysqli_real_escape_string($conn, $_POST['oldfile']);
    $file=$_FILES['file'];

    $newfilenumber=str_replace("/", "_", $fileNumber);

    $path='../assets/includes/uploads/admin_files/'.$newfilenumber.'/'.$oldfile;
    if(!unlink($path)){
      echo'<script>alert("Error occured. Old file not found. New file will be created.")</script>';

      $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotreceive_mail` SET `filed_copy`='".$fileNameNew."',`mail_status`='FILED', `filing_date`='".date("Y-m-d")."' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

              $userquery="SELECT * FROM `dotadministrative_files` WHERE filenumber='".$fileNumber."'";
            $usersearch_result=mysqli_query($conn, $userquery);
            if(mysqli_num_rows($usersearch_result)==1){
       while($row=mysqli_fetch_assoc($usersearch_result)){
              $adminfilename=$row['filename'];
              $adminfile_id=$row['adminfile_id'];
            }
          }
            $insertFile="UPDATE `dotfiles` SET `subject`='".$subject."', `date_received`='".$date_received."', `filename`='".$adminfilename."', `filenumber`='".$fileNumber."', `filed_mail`='".$fileNameNew."', `adminfile_id`='".$adminfile_id."', `rec_id`='".$rec_id."' WHERE `mail_id`='".$regNumber."'";
            
              $result=mysqli_query($conn, $insertFile);
            if ($result){
          $fileDestination='../assets/includes/uploads/admin_files/'.$newfilenumber.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="incoming_mails_register.php";
                </script>';
        }
        else{
          echo'<script>alert("Filing failed")</script>';
        }
      }
      else{
          echo'<script>alert("Filing failed")</script>';
        }
    }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
    }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    
  }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }


    }
    else{

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotreceive_mail` SET `filed_copy`='".$fileNameNew."',`mail_status`='FILED', `filing_date`='".date("Y-m-d")."' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

              $userquery="SELECT * FROM `dotadministrative_files` WHERE filenumber='".$fileNumber."'";
            $usersearch_result=mysqli_query($conn, $userquery);
            if(mysqli_num_rows($usersearch_result)==1){
       while($row=mysqli_fetch_assoc($usersearch_result)){
              $adminfilename=$row['filename'];
            }
          }
            $insertFile="UPDATE `dotfiles` SET `subject`='".$subject."', `date_received`='".$date_received."', `filename`='".$adminfilename."', `filenumber`='".$fileNumber."', `filed_mail`='".$fileNameNew."', `rec_id`='".$rec_id."' WHERE `mail_id`='".$regNumber."'";
            
              $result=mysqli_query($conn, $insertFile);
            if ($result){
          $fileDestination='../assets/includes/uploads/admin_files/'.$newfilenumber.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="incoming_mails_register.php";
                </script>';
        }
        else{
          echo'<script>alert("Filing failed")</script>';
        }
      }
      else{
          echo'<script>alert("Filing failed")</script>';
        }
    }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
    }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    
  }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }
  }

}


//FILE PERSONAL FILE
  if(isset($_POST['file_personal'])) {
    
    $pfileName=mysqli_real_escape_string($conn, $_POST['filename']);
    $fileNumber=mysqli_real_escape_string($conn, $_POST['filenumber']);
    $subject=mysqli_real_escape_string($conn, $_POST['subject']);
    $file=$_FILES['file'];

    $newfilenumber=str_replace("/", "_", $fileNumber);

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

          $pfolder='../assets/includes/uploads/personal_files/'.$newfilenumber;

          if (!is_dir($pfolder)) {
            echo'<script>alert("File not found so a new file will be created");</script>';
            mkdir($pfolder) or die();
            $createIndex=fopen("../assets/includes/uploads/personal_files/".$newfilenumber."/index.php", "w");
                $errorText='<h2 class="mb-2 mx-2">Access Denied :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 You dont have permissions to access this page. Please contact administrator.</p>
    <a href="../../../../html/index.php" class="btn btn-primary">Back to home</a>';
                $createText=fwrite($createIndex, $errorText);
                fclose($createIndex);

            $insertFile="INSERT INTO `dotfiles_personal` (`subject`, `filename`, `filenumber`, `filed_mail`, `date_filed`) VALUES('".$subject."','".$pfileName."','".$fileNumber."','".$fileNameNew."','".date('Y-m-d')."')";
              $result=mysqli_query($conn, $insertFile);
            if ($result){
          $fileDestination='../assets/includes/uploads/personal_files/'.$newfilenumber.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="personal_files.php";
                </script>';
        }

        else{
          echo'<script>alert("Filing failed")</script>';
        }
      }
      else{
         
        $insertFile="INSERT INTO `dotfiles_personal`(`subject`, `filename`, `filenumber`, `filed_mail`, `date_filed`) VALUES('".$subject."','".$pfileName."','".$fileNumber."','".$fileNameNew."','".date('Y-m-d')."')";
              $result=mysqli_query($conn, $insertFile);
            if ($result){
          $fileDestination='../assets/includes/uploads/personal_files/'.$newfilenumber.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="personal_files.php";
                </script>';
        }
         else{
          echo'<script>alert("Filing failed")</script>';
        }

        }
     
     
    }
    else{
          echo'<script>alert("File size is too big")</script>';
        }
        
    }
     else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    
  }
    
  else{
      echo'<script>alert("File type not allowed")</script>';
    }
   }   


//DISPATCH MAIL AND CONT.

  if(isset($_POST['save_and_cont_dis'])){
      $date_dispatch=mysqli_real_escape_string($conn, strtoupper($_POST['date_dispatch']));
      $reg_number=mysqli_real_escape_string($conn, strtoupper($_POST['reg_number']));
      $reg_prefix=mysqli_real_escape_string($conn, strtoupper($_POST['reg_prefix']));
      $whom_sent=mysqli_real_escape_string($conn, strtoupper($_POST['whom_sent']));
      $letter_date=mysqli_real_escape_string($conn, strtoupper($_POST['letter_date']));
      $ref_number=mysqli_real_escape_string($conn, strtoupper($_POST['ref_number']));
      $subject=mysqli_real_escape_string($conn, strtoupper($_POST['subject']));
      $sent_by=mysqli_real_escape_string($conn, strtoupper($_POST['dispatched_by']));
      $year_dis=date("Y");
       $registry_number=$reg_prefix.''.$reg_number;
      
      
          $query = "SELECT * FROM dotreceive_mail WHERE registry_number='".$registry_number."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         echo'<script>alert("Registry number already exist")</script>';

             header('location: add_outgoing_mail.php');
            }
              else{
           $query="INSERT INTO `dotdispatch_mail`(`date_dispatch`, `registry_number`, `whom_sent`, `letter_date`, `ref_number`, `subject`, `sent_by`, `year_dis`) VALUES ('".$date_dispatch."','".$registry_number."','".$whom_sent."','".$letter_date."','".$ref_number."','".$subject."','".$sent_by."','".$year_dis."')";
            $result=mysqli_query($conn, $query);
            if ($result){
             
             echo'<script>
                alert("Saved successfully");
                window.location="outgoing_mails_register.php";
                </script>';
              }
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
      }

  //DISPATCH MAIL AND ADD.

  if(isset($_POST['save_and_add_dis'])){
      $date_dispatch=mysqli_real_escape_string($conn, strtoupper($_POST['date_dispatch']));
      $reg_number=mysqli_real_escape_string($conn, strtoupper($_POST['reg_number']));
      $reg_prefix=mysqli_real_escape_string($conn, strtoupper($_POST['reg_prefix']));
      $whom_sent=mysqli_real_escape_string($conn, strtoupper($_POST['whom_sent']));
      $letter_date=mysqli_real_escape_string($conn, strtoupper($_POST['letter_date']));
      $ref_number=mysqli_real_escape_string($conn, strtoupper($_POST['ref_number']));
      $subject=mysqli_real_escape_string($conn, strtoupper($_POST['subject']));
      $sent_by=mysqli_real_escape_string($conn, strtoupper($_POST['dispatched_by']));
      $year_dis=date("Y");
       $registry_number=$reg_prefix.''.$reg_number;
      
      
          $query = "SELECT * FROM dotreceive_mail WHERE registry_number='".$registry_number."'"; 
          $exist=mysqli_query($conn, $query);
            if ($exist->num_rows==1){
         echo'<script>alert("Registry number already exist")</script>';

             header('location: add_outgoing_mail.php');
            }
              else{
           $query="INSERT INTO `dotdispatch_mail`(`date_dispatch`, `registry_number`, `whom_sent`, `letter_date`, `ref_number`, `subject`, `sent_by`, `year_dis`) VALUES ('".$date_dispatch."','".$registry_number."','".$whom_sent."','".$letter_date."','".$ref_number."','".$subject."','".$sent_by."','".$year_dis."')";
            $result=mysqli_query($conn, $query);
            if ($result){
             
             echo'<script>
                alert("Saved successfully");
                window.location="add_outgoing_mail.php";
                </script>';
              }
            else{
          echo'<script>alert("Saved failed")</script>';
      }
              
  }
      }  

//EDIT MAIL AND CONT.

  if(isset($_POST['update_dismail'])){
     $date_dispatch=mysqli_real_escape_string($conn, strtoupper($_POST['date_dispatch']));
      $reg_number=mysqli_real_escape_string($conn, strtoupper($_POST['reg_number']));
      $reg_prefix=mysqli_real_escape_string($conn, strtoupper($_POST['reg_prefix']));
      $whom_sent=mysqli_real_escape_string($conn, strtoupper($_POST['whom_sent']));
      $letter_date=mysqli_real_escape_string($conn, strtoupper($_POST['letter_date']));
      $ref_number=mysqli_real_escape_string($conn, strtoupper($_POST['ref_number']));
      $subject=mysqli_real_escape_string($conn, strtoupper($_POST['subject']));
      $sent_by=mysqli_real_escape_string($conn, strtoupper($_POST['dispatched_by']));
      
      
              
           $update_query="UPDATE `dotdispatch_mail` SET `date_dispatch`='".$date_dispatch."',`whom_sent`='".$whom_sent."',`letter_date`='".$letter_date."',`ref_number`='".$ref_number."',`subject`='".$subject."',`sent_by`='".$sent_by."' WHERE `registry_number`='".$reg_number."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

              $update_query1="UPDATE `dotfiles` SET `date_received`='".$date_dispatch."', `subject`='".$subject."' WHERE `mail_id`='".$reg_number."'";
            $result1=mysqli_query($conn, $update_query1);
            if ($result1){
             echo'
              <script>
                alert("Saved successfully");
                window.location="outgoing_mails_register.php";
                </script>
             ';
              }
            }
            else{
          echo'<script>
                alert("An error occured");
                </script>';
      }
              
  }


  //FILE DISPATCH MAIL
  if(isset($_POST['file_dismail'])) {
    $rec_id=mysqli_real_escape_string($conn, $_POST['dis_id']);
    $regNumber=mysqli_real_escape_string($conn, $_POST['reg_number']);
    $fileNumber=mysqli_real_escape_string($conn, $_POST['filenumber']);
    $date_received=mysqli_real_escape_string($conn, $_POST['date_dispatch']);
    $subject=mysqli_real_escape_string($conn, $_POST['subject']);
    $file=$_FILES['file'];

    $newfilenumber=str_replace("/", "_", $fileNumber);

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotdispatch_mail` SET `filed_copy`='".$fileNameNew."',`mail_status`='FILED', `filing_date`='".date("Y-m-d")."' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

              $userquery="SELECT * FROM `dotadministrative_files` WHERE filenumber='".$fileNumber."'";
            $usersearch_result=mysqli_query($conn, $userquery);
            if(mysqli_num_rows($usersearch_result)==1){
       while($row=mysqli_fetch_assoc($usersearch_result)){
              $adminfilename=$row['filename'];
              $adminfile_id=$row['adminfile_id'];
            }
          }
            $insertFile="INSERT INTO `dotfiles`(`mail_id`,`subject`, `date_received`, `filename`, `filenumber`, `filed_mail`, `date_filed`, `mail_type`, `adminfile_id`, `rec_id`) VALUES('".$regNumber."','".$subject."','".$date_received."','".$adminfilename."','".$fileNumber."','".$fileNameNew."','".date('Y-m-d')."','DISPATCHED','".$adminfile_id."', '".$rec_id."')";
              $result=mysqli_query($conn, $insertFile);
            if ($result){
          $fileDestination='../assets/includes/uploads/admin_files/'.$newfilenumber.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="outgoing_mails_register.php";
                </script>';
        }
        else{
          echo'<script>alert("Filing failed")</script>';
        }
      }
      else{
          echo'<script>alert("Filing failed")</script>';
        }
    }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
    }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    
  }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }
  }



//RE-FILE DISPATCH MAIL
  if(isset($_POST['re_file_dismail'])) {
    $rec_id=mysqli_real_escape_string($conn, $_POST['dis_id']);
    $regNumber=mysqli_real_escape_string($conn, $_POST['reg_number']);
    $fileNumber=mysqli_real_escape_string($conn, $_POST['filenumber']);
    $date_received=mysqli_real_escape_string($conn, $_POST['date_received']);
    $subject=mysqli_real_escape_string($conn, $_POST['subject']);
    $oldfile=mysqli_real_escape_string($conn, $_POST['oldfile']);
    $file=$_FILES['file'];

    $newfilenumber=str_replace("/", "_", $fileNumber);

    $path='../assets/includes/uploads/admin_files/'.$newfilenumber.'/'.$oldfile;
    if(!unlink($path)){
      echo'<script>alert("Old file not found so a new file will be created.")</script>';

      $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotdispatch_mail` SET `filed_copy`='".$fileNameNew."',`mail_status`='FILED', `filing_date`='".date("Y-m-d")."' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

              $userquery="SELECT * FROM `dotadministrative_files` WHERE filenumber='".$fileNumber."'";
            $usersearch_result=mysqli_query($conn, $userquery);
            if(mysqli_num_rows($usersearch_result)==1){
       while($row=mysqli_fetch_assoc($usersearch_result)){
              $adminfilename=$row['filename'];
              $adminfile_id=$row['adminfile_id'];
            }
          }
            $insertFile="UPDATE `dotfiles` SET `subject`='".$subject."', `date_received`='".$date_received."', `filename`='".$adminfilename."', `filenumber`='".$fileNumber."', `filed_mail`='".$fileNameNew."', `adminfile_id`='".$adminfile_id."', `rec_id`='".$rec_id."' WHERE `mail_id`='".$regNumber."'";
            
              $result=mysqli_query($conn, $insertFile);
            if ($result){
          $fileDestination='../assets/includes/uploads/admin_files/'.$newfilenumber.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="outgoing_mails_register.php";
                </script>';
        }
        else{
          echo'<script>alert("Filing failed")</script>';
        }
      }
      else{
          echo'<script>alert("Filing failed")</script>';
        }
    }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
    }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    
  }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }


    }
    else{

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('pdf','jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError===0){
        if($fileSize<2000000){
          $fileNameNew=uniqid('',true).".".$fileActualExt;

           $update_query="UPDATE `dotdispatch_mail` SET `filed_copy`='".$fileNameNew."',`mail_status`='FILED', `filing_date`='".date("Y-m-d")."' WHERE `registry_number`='".$regNumber."'";
            $result=mysqli_query($conn, $update_query);
            if ($result){

              $userquery="SELECT * FROM `dotadministrative_files` WHERE filenumber='".$fileNumber."'";
            $usersearch_result=mysqli_query($conn, $userquery);
            if(mysqli_num_rows($usersearch_result)==1){
       while($row=mysqli_fetch_assoc($usersearch_result)){
              $adminfilename=$row['filename'];
            }
          }
            $insertFile="UPDATE `dotfiles` SET `subject`='".$subject."', `date_received`='".$date_received."', `filename`='".$adminfilename."', `filenumber`='".$fileNumber."', `filed_mail`='".$fileNameNew."', `rec_id`='".$rec_id."' WHERE `mail_id`='".$regNumber."'";
            
              $result=mysqli_query($conn, $insertFile);
            if ($result){
          $fileDestination='../assets/includes/uploads/admin_files/'.$newfilenumber.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo'<script>
                alert("File attached successfully");
                window.location="incoming_mails_register.php";
                </script>';
        }
        else{
          echo'<script>alert("Filing failed")</script>';
        }
      }
      else{
          echo'<script>alert("Filing failed")</script>';
        }
    }
        else{
          echo'<script>alert("File size is too big")</script>';
        }
    }
      else{
        echo'<script>alert("An error occured while uploading")</script>';
      }
    
  }
    else{
      echo'<script>alert("File type not allowed")</script>';
    }
  }

}



//Generate 20 random strings hashed
if(isset($_POST['gen_codes'])) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomStrings = array();

for ($i = 0; $i < 20; $i++) {
    $randomString = '';
    for ($j = 0; $j < 30; $j++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $randomStrings[] = $randomString;
}


$delquery="TRUNCATE `dotactivation_list`";
$delresult=mysqli_query($conn, $delquery);
// Save the random strings in the database
for ($i = 0; $i < 20; $i++) {
    $sql = "INSERT INTO dotactivation_list (code, status) VALUES ('" . $randomStrings[$i] . "', 'Active')";
    $result=mysqli_query($conn, $sql);
}
if ($result) {
        echo '<script>alert("Activation keys generated")</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


if (isset($_POST['enc_codes'])) {

  for ($i = 0; $i < 20; $i++) {
    $id = $_POST['id'][$i];
    $code = $_POST['code'][$i];

    //echo '<script>alert('.$id.')</script>';


    // Prepare the update statement
    $update_query = "UPDATE dotactivation_list SET code = '".hash("sha512",$code)."' WHERE id = '".$id."' ";
   $result= mysqli_query($conn, $update_query);
    // Execute the update statement
    
  }
  if ($result) {
      echo '<script>alert("Activation keys encrypted")</script>';
    } else {
       echo '<script>alert("Activation keys encrypted failed")</script>';
    }
}


// if(isset($_POST['enc_codes'])){
          
//       foreach ($_POST['code'] as $key => $value) {
//         $code=$_POST['code'][$key];
//         $id=$_POST['id'][$key];

//         $query="UPDATE `dotactivation_list` SET `code`='".$code."' WHERE id='".$id."'";
//             $result=mysqli_query($conn, $query);
            
//       }
//       if ($result){
//              echo'<script>alert("Updated successfully")</script>';
//               }
//             else{
//           echo'<script>alert("Update failed")</script>';
//       }
    
//       }


if (isset($_POST['activate'])){
 $code=mysqli_real_escape_string($conn, $_POST['code']);
$hash_code=hash("sha512", $code);

 $query="SELECT * FROM dotactivation_list WHERE code='".$hash_code."' AND status='Active'";
$result=mysqli_query($conn, $query);
            if(mysqli_num_rows($result)==1){
       while($row=mysqli_fetch_assoc($result)){

        $up="UPDATE dotactivation_list SET `status`='Used' WHERE `code`='".$hash_code."'";
        $resultup=mysqli_query($conn, $up);

        $up2="UPDATE dotstart_time SET `activation`='1' WHERE `id`='1'";
        $resultup2=mysqli_query($conn, $up2);

              echo '<script>alert("Thank you for activating. Enjoy using the system");
                 window.location="html/index.php";
                </script>'; 
            }
          }
          else{
            echo '<script>alert("The activation code is either invalid or used");
                 
                </script>'; 
          }
 
}

  ?>