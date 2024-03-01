<a type="button" href="mail_compose.php" class="btn btn-danger waves-effect btn-compose m-b-15">COMPOSE</a>
<ul class="" id="mail-folders">

<li class="">
<a href="mail_inbox.php" title="Inbox" <?php if($page == "inbox"){echo "class='active'";} ?>>Inbox <?php echo '('.$count.')'?>
</a>
</li>
<li>
	
<a href="mail_outbox.php" title="Sent" class="<?php if($page=='sent'){echo 'active';} ?>">Sent </a>
</li>
<li>
<a href="javascript:;" title="Draft">Draft</a>
</li>
<li>
<a href="javascript:;" title="Bin">Bin</a>
</li>
<li>
<a href="javascript:;" title="Important">Important</a>
</li>
<li>
<a href="javascript:;" title="Starred">Starred</a>
</li>
</ul>
<h5 class="b-b p-10 text-strong">Labels</h5>
<ul class="" id="mail-labels">
<li>
<a href="javascript:;">
<i class="material-icons col-red">local_offer</i>Family</a>
</li>
<li>
<a href="javascript:;">
<i class="material-icons col-blue">local_offer</i>Work</a>
</li>
<li>
<a href="javascript:;">
<i class="material-icons col-orange">local_offer</i>Shop</a>
</li>
<li>
<a href="javascript:;">
<i class="material-icons col-cyan">local_offer</i>Themeforest</a>
</li>
<li>
<a href="javascript:;">
<i class="material-icons col-blue-grey">local_offer</i>Google</a>
</li>
</ul>
<h5 class="b-b p-10 text-strong">Online</h5>
<?php
	include '../scripts/dbconn.php';
      $check_login="SELECT * FROM ws_users 
      inner join ws_staffprofile on ws_staffprofile.staff_id=ws_users.username
      WHERE username!='".$_SESSION['Staff_ID']."' AND online='1'";
      $check_result=mysqli_query($conn, $check_login);
      if(mysqli_num_rows($check_result)>0){
      	while($row=mysqli_fetch_assoc($check_result)){
?>
<ul class="online-user" id="online-offline">
<li><a href="javascript:;"> <img alt="image" src="assets/img/users/user-2.png"
class="rounded-circle" width="35" data-toggle="tooltip" title="<?php echo $row['fname']." ".$row['lname']; ?>">
<?php echo $row['fname']." ".$row['lname']; ?>
</a></li>
</ul>
<?php } } ?>