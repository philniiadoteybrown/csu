<div class="card-body">
                    <div class="table-responsive">
<table class="table table-striped" id="">
      <thead>
        <tr>
          <th>Record ID</th>
          <th width="10%">Date Received</th>
          <th>Registry #</th>
          <th width="20%">Subject</th>
          <th>Status</th>
          <th width="10%">Actions</th>
          <th>Current Location</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $query="SELECT * FROM `ws_receive_mail` ORDER BY `ws_receive_mail`.`rec_id` DESC LIMIT 10";
        $search_result=mysqli_query($conn, $query);
        while($fetch = mysqli_fetch_assoc($search_result)){
          $mail_status=$fetch['mail_status'];
          ?>
          <tr>
            <td><?php echo $fetch['rec_id']; ?></td>
            <td><?php echo $fetch['date_received']; ?></td>
            <td><?php echo $fetch['registry_number']; ?></td>
            <td><?php echo $fetch['subject']; ?></td>
            <?php if($mail_status=='RECEIVED' && $mail_status!='FILE' && $mail_status!='FORWARDED'){?>  
            <td><a href="mail_forward_1.php?id=<?php echo $fetch['rec_id']; ?>" type="button" class="btn btn-light"><i class="fas fa-forward"></i> Forward</a></td>
            <?php } else { ?>
            <td><?php echo $fetch['mail_status']; ?></td>
            <?php } ?>
            <td>
              <div class="buttons">
                <?php if($mail_status=='RECEIVED'){?>
                <a title="Edit" href="editfilecategory?id=<?php echo $fetch['rec_id']; ?>"  class="btn btn-icon btn-sm btn-primary"><i class="far fa-edit"></i></a>
                <a title="Re-attach copy" href="editfilecategory?id=<?php echo $fetch['rec_id']; ?>"  class="btn btn-icon btn-sm btn-secondary"><i class="far fa-edit"></i></a>
                <a title="Delete" href="#" title="Delete" onclick="del(<?php echo $fetch['rec_id']; ?>)"class="btn btn-icon btn-sm btn-danger"><i class="fas fa-times"></i></a>
                <?php } ?>
                <?php if($mail_status=='FILE'){?>
                <a title="File Mail" href="file_mail.php?id=<?php echo $fetch['rec_id']; ?>"  class="btn btn-icon btn-md btn-warning"><i class="fas fa-file-upload"></i></a>
                <?php } 
                 if($mail_status=='FILED'){ 
                $query_filed="SELECT * FROM `ws_files` WHERE `mail_id`='".$fetch['registry_number']."'";
          $search_result_filed=mysqli_query($conn, $query_filed);
          while($fetch_filed = mysqli_fetch_array($search_result_filed)){
           $fnum=$fetch_filed['file_id'];
          }
          ?>
                <a href="content_viewer2.php?id=<?php echo $fnum; ?>" type="button" class="btn btn-sm btn-primary"><i class="far fa-eye"></i> <i class="fas fa-paperclip"></i></a>
              <?php } else { ?>
                <a href="content_viewer.php?id=<?php echo $fetch['rec_id']; ?>" type="button" class="btn btn-sm btn-success"><i class="far fa-eye"></i> <i class="fas fa-paperclip"></i></a>
              <?php } ?>
                
              
              </div>
            </td>
            <td>
              <?php
              $query_move="SELECT * FROM `ws_staffprofile` WHERE `staff_id`='".$fetch['file_movement']."'";
          $search_result_move=mysqli_query($conn, $query_move);
          while($fetch_move = mysqli_fetch_array($search_result_move)){
           $stafname=$fetch_move['fname'].' '.$fetch_move['lname'];
          }
          if($mail_status=='FORWARDING') {
              ?>
              <?php echo strtoupper($stafname); }
              elseif($mail_status=='FILE'){
                echo strtoupper($fetch['file_movement']);
              }elseif($mail_status=='FILED'){
                echo "IN FILE";
              }
              ?>
            </td>
          </tr>
          <?php
//$n++;
        }
        ?>
      </tbody>

    </table>
  </div>
</div>