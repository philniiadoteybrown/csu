
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