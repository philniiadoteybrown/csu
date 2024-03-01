

<div class="row">
<?php
                $query_q="SELECT * FROM ws_mail_forward WHERE receiver_id='".$_SESSION['staff_id']."' AND status='Unread'";
        $search_result_q=mysqli_query($conn, $query_q);
                  ?>
                  <?php if($search_result_q->num_rows>0){ ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          
                          <h5 class="font-15 blink">
                          <div class="alert alert-danger" role="alert">
                          You have Unread Mails
                          </div>
                        </h5>                  
                        
                          <p class="mb-0 blink"><a href="mydesk_incoming.php"><span class="col-green">Your attention is needed</span></a></p>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <?php } ?>
           
            <?php
                $query_q1="SELECT * FROM ws_memos WHERE receiver_id='".$_SESSION['staff_id']."' AND read_status='Unread'";
        $search_result_q1=mysqli_query($conn, $query_q1);
                  ?>
                  <?php if($search_result_q1->num_rows>0){ ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          
                          <h5 class="font-15 blink">
                          <div class="alert alert-danger" role="alert">
                          Memo Alert
                          </div>
                        </h5>                  
                        
                          <p class="mb-0 blink"><a href="mydesk_memos.php"><span class="col-green">See More</span></a></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

         <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <h4>Notice Board</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <table class="table table-striped" id="">
                        <tr>
                          <th>Author</th>
                          <th>Title</th>
                          <th>Created At</th>
                          <th>Content</th>
                        </tr>
                        <?php
                        $query="SELECT * FROM ws_noticeboard
                        inner join ws_staffprofile on ws_staffprofile.staff_id=ws_noticeboard.posted_by";
                        $search_result=mysqli_query($conn, $query);
                        while($fetch = mysqli_fetch_assoc($search_result)){
                        ?>
                        <tr>
                          
                          <td><?php echo $fetch['fname']." ".$fetch['lname'] ?></td>
                          <td><?php echo $fetch['subject'] ?></td>
                          <td><?php echo $fetch['notice_date'] ?></td>
                          <td>
                            <?php echo $fetch['content'] ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </table>
                
              </div>
            </div>
          </div>