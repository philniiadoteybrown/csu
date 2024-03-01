
<a type="button" href="write_memo_dce_dcd.php" class="btn btn-danger waves-effect btn-compose m-b-15">Write Memo</a>
<!-- <a type="button" href="write_memo.php" class="btn btn-primary waves-effect btn-compose m-b-15">Write Memo to All HoDs/HoUs</a>
<a type="button" href="write_memo.php" class="btn btn-secondary waves-effect btn-compose m-b-15">Write Memo to Others</a> -->
<ul class="" id="mail-folders">
<li class="">
<?php
$query = "SELECT COUNT(*) as count FROM ws_memos WHERE receiver_id='".$_SESSION['staff_id']."' AND read_status='Unread'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $count = $row['count']; 
?>
<a href="mydesk_memos.php" title="Inbox">Unread 
</a>
</li>
<li class="">
    <?php
$query = "SELECT COUNT(*) as count FROM ws_memos WHERE receiver_id='".$_SESSION['staff_id']."' AND read_status='Read'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $count = $row['count']; 
?>
<a href="memo_pending.php" title="Inbox" >Read 
</a>
</li>
<li class="">
    <?php
$query = "SELECT COUNT(*) as count FROM ws_memos WHERE sender_id='".$_SESSION['staff_id']."' AND memo_status='Pending'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $count = $row['count']; 
?>
<a href="memo_pending.php" title="Inbox" >Pending
</a>
</li>
<li>
	
<a href="memo_approved.php" title="Sent">Approved </a>
</li>
<?php
    include 'assets/scripts/dbconn.php';
      $check_login="SELECT * FROM ws_users 
      inner join ws_staffprofile on ws_staffprofile.staff_id=ws_users.username
      WHERE username!='".$_SESSION['Staff_ID']."' AND online='1'";
      $check_result=mysqli_query($conn, $check_login);
      if(mysqli_num_rows($check_result)>0){
        while($row=mysqli_fetch_assoc($check_result)){
?>

<h5 class="b-b p-10 text-strong">Online</h5>

<ul class="online-user" id="online-offline">
<li><a href="javascript:;"> <img alt="image" src="assets/img/users/user-2.png"
class="rounded-circle" width="35" data-toggle="tooltip" title="<?php echo $row['fname']." ".$row['lname']; ?>">
<?php echo $row['fname']." ".$row['lname']; ?>
</a></li>
</ul>
<?php } } ?>