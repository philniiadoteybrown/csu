<div class="modal fade bd-example-modal-lg" id="addfolder" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Directory/Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                              <?php if(isset($success)) { ?>
                              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $success ?>
                      </div>
                    </div>
                              <?php }elseif(isset($warning)) { ?>
                              <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $warning ?>
                      </div>
                    </div>
                              <?php }elseif(isset($error)) { ?>
                              <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $error ?>
                      </div>
                    </div>
                              <?php } ?>
                              <form action="" method="POST">
                              <div class="form-group">
                              <label>Menu Name</label>
                              <input type="text" class="form-control" name="menu_name" required tabindex="0">
                              </div>
                              <div class="form-group">
                              <label>Menu Icon</label>
                              <input type="text" class="form-control" name="menu_icon" tabindex="0">
                              </div>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="addmenu">Submit</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>


        <div class="modal fade bd-example-modal-lg" id="addedu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width: 1400px;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Education History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                              <?php if(isset($success)) { ?>
                              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $success ?>
                      </div>
                    </div>
                              <?php }elseif(isset($warning)) { ?>
                              <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $warning ?>
                      </div>
                    </div>
                              <?php }elseif(isset($error)) { ?>
                              <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $error ?>
                      </div>
                    </div>
                              <?php } ?>
                              <form action="" method="POST">
                    <table class="table table-bordered" id="table_field">
                      <thead>
                        <tr>
                          <th scope="col">Name of Institution</th>
                          <th scope="col">Period From</th>
                          <th scope="col">Period To</th>
                          <th scope="col">Qualification</th>
                          <th scope="col">Course of Study</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><input type="text" class="form-control" name="noi[]" placeholder="">
                            <input type="hidden" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>">
                          </th>
                          <td><input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" name="pe_from[]" placeholder=""></td>
                          <td><input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" name="pe_to[]" placeholder=""></td>
                          <td><input type="text" class="form-control" name="qual[]" placeholder=""></td>
                          <td><input type="text" class="form-control" name="cos[]" placeholder=""></td>
                          <td><input type="button" class="form-control btn-success" id="add" name="add" value="Add More"></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                        <input type="submit" class="form-control btn-primary" name="addedu" id="" value="Save">
                      </div>
                    </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>



<div class="modal fade bd-example-modal-lg" id="addlang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width: 1400px;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Languages</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                              <?php if(isset($success)) { ?>
                              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $success ?>
                      </div>
                    </div>
                              <?php }elseif(isset($warning)) { ?>
                              <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $warning ?>
                      </div>
                    </div>
                              <?php }elseif(isset($error)) { ?>
                              <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $error ?>
                      </div>
                    </div>
                              <?php } ?>
                              <form action="" method="POST">
                    <table class="table table-bordered" id="table_field3">
                      <thead>
                        <tr>
                          <th scope="col">Language</th>
                          <th scope="col">Spoken Level</th>
                          <th scope="col">Reading Level</th>
                          <th scope="col">Writing Level</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><input type="text" class="form-control" name="lang[]" placeholder=""></th><input type="hidden" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>">
                          <td> <select id="inputState" class="form-control" name="sl[]">
                          <option selected>Choose...</option>
                          <option>Advanced</option>
                          <option>Intermediate</option>
                          <option>Beginner</option>
                        </select></td>
                          <td> <select id="inputState" class="form-control" name="rl[]">
                          <option selected>Choose...</option>
                          <option>Advanced</option>
                          <option>Intermediate</option>
                          <option>Beginner</option>
                        </select></td>
                        <td> <select id="inputState" class="form-control" name="wl[]">
                          <option selected>Choose...</option>
                          <option>Advanced</option>
                          <option>Intermediate</option>
                          <option>Beginner</option>
                        </select></td>
                          <td><input type="button" class="form-control btn-success" id="add_l" name="add_l" value="Add More"></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                        <input type="submit" class="form-control btn-primary" name="addlang" id="" value="Save">
                      </div>
                    </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>


<div class="modal fade bd-example-modal-lg" id="adddep" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width: 1400px;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Dependants</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                              <?php if(isset($success)) { ?>
                              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $success ?>
                      </div>
                    </div>
                              <?php }elseif(isset($warning)) { ?>
                              <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $warning ?>
                      </div>
                    </div>
                              <?php }elseif(isset($error)) { ?>
                              <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $error ?>
                      </div>
                    </div>
                              <?php } ?>
                              <form action="" method="POST">
                    <table class="table table-bordered" id="table_field4">
                      <thead>
                        <tr>
                          <th scope="col">Fullname</th>
                          <th scope="col">Address</th>
                          <th scope="col">Contact</th>
                          <th scope="col">Relationship</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input type="text" class="form-control" id="" name="d_fullname[]" placeholder=" "><input type="text" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>"></td>
                          <td><input type="text" class="form-control" id="" name="d_address[]" placeholder=" "></td>
                          <td><input type="text" class="form-control" id="" name="d_contact[]" placeholder=" "></td>
                          <td><input type="text" class="form-control" id="" name="d_relation[]" placeholder=" "></td>
                          <td><input type="button" class="form-control btn-success" id="add_d" name="add_d" value="Add More"></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                        <input type="submit" class="form-control btn-primary" name="adddep" id="" value="Save">
                      </div>
                    </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>


<div class="modal fade bd-example-modal-lg" id="addtrain" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width: 1400px;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Trainings Attended</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                   
                              <form action="" method="POST">
                    <table class="table table-bordered" id="table_field1">
                      <thead>
                        <tr>
                          <th scope="col">Skill/Training Type</th>
                          <th scope="col">Training Institution</th>
                          <th scope="col">Year Obtained</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><input type="text" class="form-control" name="sty[]" placeholder=""><input type="hidden" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>"></th>
                          <td><input type="text" class="form-control" name="train_inst[]" placeholder=""></td>
                          <td><input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" name="date_ob[]" placeholder=""></td>
                          <td><input type="button" class="form-control btn-success" id="add_t" name="add_t" value="Add More"></td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                        <input type="submit" class="form-control btn-primary" name="addtrain" id="" value="Save">
                      </div>
                    </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>




        <script type="text/javascript">
    $(document).ready(function(){
      var html=' <tr><th scope="row"><input type="text" class="form-control" name="noi[]" placeholder=""><input type="hidden" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>"></th><td><input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" name="pe_from[]" placeholder=""></td><td><input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" name="pe_to[]" placeholder=""></td><td><input type="text" class="form-control" name="qual[]" placeholder=""></td><td><input type="text" class="form-control" name="cos[]" placeholder=""></td><td><input type="button" class="form-control btn-danger" id="remove" name="remove" value="Remove"></td></tr>';

      var max=3;
      var x=1;

      $("#add").click(function(){
        if(x<=max){
        $("#table_field").append(html);
        x++;
      }
      });
      $("#table_field").on('click', '#remove', function(){
        $(this).closest('tr').remove();
        x--;
      });
    });

    $(document).ready(function(){
      var html='<tr><th scope="row"><input type="text" class="form-control" name="sty[]" placeholder=""><input type="hidden" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>"></th><td><input type="text" class="form-control" name="train_inst[]" placeholder=""></td><td><input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" name="date_ob[]" placeholder=""></td><td><input type="button" class="form-control btn-danger" id="remove_t" name="remove_t" value="Remove"></td></tr>';
      var max=3;
      var x=1;

      $("#add_t").click(function(){
        if(x<=max){
        $("#table_field1").append(html);
        x++;
      }
      });
      $("#table_field1").on('click', '#remove_t', function(){
        $(this).closest('tr').remove();
        x--;
      });
    });

    $(document).ready(function(){
      var html='<tr><th scope="row"><input type="text" class="form-control" name="soc[]" placeholder=""><input type="hidden" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>"></th></td><td><input type="button" class="form-control btn-danger" id="remove_s" name="remove_s" value="Remove"></td></tr>';
      max=3
      var x=1;

      $("#add_s").click(function(){
        if(x<=max){
        $("#table_field2").append(html);
        x++;
      }
      });
      $("#table_field2").on('click', '#remove_s', function(){
        $(this).closest('tr').remove();
        x--;
      });
    });


    $(document).ready(function(){
      var html='<tr><th scope="row"><input type="text" class="form-control" name="lang[]" placeholder=""><input type="hidden" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>"></th><td> <select id="inputState" class="form-control" name="sl[]"><option selected>Choose...</option><option>Advanced</option><option>Intermediate</option><option>Beginner</option></select></td><td> <select id="inputState" class="form-control" name="rl[]"><option selected>Choose...</option><option>Advanced</option><option>Intermediate</option><option>Beginner</option></select></td><td> <select id="inputState" class="form-control" name="wl[]"><option selected>Choose...</option><option>Advanced</option><option>Intermediate</option><option>Beginner</option></select></td><td><input type="button" class="form-control btn-danger" id="remove_l" name="remove_l" value="Add More"></td></tr>';

      max=3;
      var x=1;

      $("#add_l").click(function(){
        if(x<=max){
        $("#table_field3").append(html);
        x++;
      }
      });
      $("#table_field3").on('click', '#remove_l', function(){
        $(this).closest('tr').remove();
        x--;
      });
    });

    $(document).ready(function(){
      var html='<tr><td><input type="text" class="form-control" id="" name="d_fullname[]" placeholder=" "><input type="hidden" class="form-control" name="staff_id[]" value="<?php echo $_SESSION['ssid'] ?>"></td><td><input type="text" class="form-control" id="" name="d_address[]" placeholder=" "></td><td><input type="text" class="form-control" id="" name="d_contact[]" placeholder=" "></td><td><input type="text" class="form-control" id="" name="d_relation[]" placeholder=" "></td><td><input type="button" class="form-control btn-danger" id="remove_d" name="remove_d" value="Remove"></td></tr>';
      var max=3;
      var x=1;

      $("#add_d").click(function(){
        if(x<=max){
        $("#table_field4").append(html);
        x++;
      }
      });
      $("#table_field4").on('click', '#remove_d', function(){
        $(this).closest('tr').remove();
        x--;
      });
    });
  </script>




  <div class="modal fade bd-example-modal-lg" id="addleave" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width: 1400px;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Leave Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                   
                              <form action="" method="POST">
                    <table class="table table-bordered" id="table_field_lt">
                      <thead>
                        <tr>
                          <th scope="col">Type Name</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input type="text" class="form-control" name="leave_type[]" placeholder=""></td>
                          <td><input type="button" class="form-control btn-success" id="add_lt" name="add_lt" value="Add More"></td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                        <input type="submit" class="form-control btn-primary" name="addleavetype" id="" value="Save">
                      </div>
                    </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>

<script>
        $(document).ready(function(){
      var html='<tr><td scope="row"><input type="text" class="form-control" name="leave_type[]" placeholder=""></td><td><input type="button" class="form-control btn-danger" id="remove_lt" name="remove_lt" value="Remove"></td></tr>';
      max=3
      var x=1;

      $("#add_lt").click(function(){
        if(x<=max){
        $("#table_field_lt").append(html);
        x++;
      }
      });
      $("#table_field_lt").on('click', '#remove_lt', function(){
        $(this).closest('tr').remove();
        x--;
      });
    });
  </script>



  <div class="modal fade bd-example-modal-lg" id="addleave1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                           
                              <form action="" method="POST">
                              <div class="form-group">
                              <label>Leave Type</label>
                              <select class="custom-select" id="js-example-basic-single" name="l_type" aria-label="Default select example" required>
                                <option selected> </option>
                                  <?php
                                  $query="SELECT * FROM `ws_leave_type`";
                                  $search_result=mysqli_query($conn, $query);
                                  while($fetch = mysqli_fetch_array($search_result)){
                                  ?>
                                <option value="<?php echo $fetch['type_id'] ?>"><?php echo $fetch['leave_type'] ?></option>
                                <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                              <label>Job Grade</label>
                              <select class="custom-select" id="js-example-basic-single" name="j_grade" aria-label="Default select example" required>
                                <option selected>Choose...</option>
                                  <?php
                                  $query="SELECT * FROM `ws_grades`";
                                  $search_result=mysqli_query($conn, $query);
                                  while($fetch = mysqli_fetch_array($search_result)){
                                  ?>
                                <option value="<?php echo $fetch['grad_id'] ?>"><?php echo $fetch['grade_name'] ?></option>
                                <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                              <label>No. of Allowed Days</label>
                              <input type="number" class="form-control" name="leave_days" tabindex="0">
                              </div>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="addleave">Submit</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>




        <div class="modal fade bd-example-modal-lg" id="applyleave_member" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Leave Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <?php
                                  $query="SELECT * FROM `ws_grades` WHERE grade_name='".$_SESSION['j_grade']."'";
                                  $search_result=mysqli_query($conn, $query);
                                  while($fetch = mysqli_fetch_array($search_result)){
                                   $grade_id=$fetch['grad_id'];
                                  }

                                   $query_xz="SELECT * FROM `ws_staffprofile` WHERE unit='".$_SESSION['unit']."' AND position='Head'";
                                  $search_result_xz=mysqli_query($conn, $query_xz);
                                  while($fetch_xz = mysqli_fetch_array($search_result_xz)){
                                   $supervisor=$fetch_xz['staff_id'];
                                   $rank_ini=$fetch_xz['rank_initials'];
                                  }

                                  ?>
                           
                              <form action="" method="POST">
                              <div class="form-group">
                                <?php  $memo_num=substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",4)),0,4)."_".time();// ?>
                      <input type="hidden" id="subject" class="form-control" name="memo_number" value="<?php echo $memo_num; ?>" readonly>
                                <input type="hidden" class="form-control" name="staff_id" value="<?php echo $_SESSION['staff_id'] ?>"  placeholder="">
                                <input type="hidden" class="form-control" name="sent_to" value="<?php echo $supervisor ?>"  placeholder="">
                                <input type="hidden" class="form-control" name="" value="<?php echo $_SESSION['unit'] ?>"  placeholder="">
                                <input type="hidden" id="subject" class="form-control" name="rank_ini" value="<?php echo $rank_ini; ?>" readonly>
                              <label>Leave Type</label>
                              <select class="custom-select" id="js-example-basic-single" name="l_type" aria-label="Default select example" required>
                                <option selected>Choose...</option>
                                  <?php
                                  $query01="SELECT * FROM `ws_leave`
                                  inner join ws_leave_type on ws_leave_type.type_id=ws_leave.type_id
                                   WHERE `j_grade`='".$grade_id."'";
                                  $search_result01=mysqli_query($conn, $query01);
                                  while($fetch01 = mysqli_fetch_array($search_result01)){
                                  ?>
                                <option value="<?php echo $fetch01['type_id'] ?>"><?php echo $fetch01['leave_type'] ?></option>
                                <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                              <label>Start Date</label>
                              <input type="date" class="form-control" name="start_date" id="start_date" onchange="calculateDateDifference()" required placeholder="">
                              </div>
                              <div class="form-group">
                              <label>End Date</label>
                              <input type="date" class="form-control" name="end_date" id="end_date" onchange="calculateDateDifference()" required placeholder="">
                              </div>
                              <div class="form-group">
                              <label>Days</label>
                              <input type="number" id="date_difference" name="date_difference" class="form-control" readonly tabindex="0">
                              </div>
                              <div class="form-group">
                      <label>Reason</label>
                       <textarea id="summernote" class="summernote" name="leave_reason" ></textarea>
                      </div>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="applyleave">Submit</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>

        <script>
        function calculateDateDifference() {
            const startDate = new Date(document.getElementById("start_date").value);
            const endDate = new Date(document.getElementById("end_date").value);

            if (startDate && endDate) {
                // Get the time difference in milliseconds
                const timeDifference = endDate - startDate;

                // Convert milliseconds to days
                const millisecondsPerDay = 24 * 60 * 60 * 1000;
                let differenceInDays = Math.round(timeDifference / millisecondsPerDay);

                // Exclude weekends (Saturday and Sunday) from the count
                const startDay = startDate.getDay();
                const endDay = endDate.getDay();

                const fullWeeks = Math.floor(differenceInDays / 7);
                const remainingDays = differenceInDays % 7;

                if (startDay === 6 && endDay === 0) {
                    // If the start date is Saturday and end date is Sunday, adjust the count
                    differenceInDays -= 1;
                } else if (startDay === 6 || startDay === 0) {
                    // If the start date is a weekend, adjust the count
                    differenceInDays -= (startDay === 6 ? 1 : 2);
                } else if (endDay === 6 || endDay === 0) {
                    // If the end date is a weekend, adjust the count
                    differenceInDays -= (endDay === 6 ? 2 : 1);
                }

                // Calculate the new difference in days
                differenceInDays = fullWeeks * 5 + remainingDays;

                document.getElementById("date_difference").value = differenceInDays+1;
            }
        }
    </script>


 <div class="modal fade bd-example-modal-lg" id="applyleave_head" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Leave Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <?php
                                  $query="SELECT * FROM `ws_grades` WHERE grade_name='".$_SESSION['j_grade']."'";
                                  $search_result=mysqli_query($conn, $query);
                                  while($fetch = mysqli_fetch_array($search_result)){
                                   $grade_id=$fetch['grad_id'];
                                  }

                                   $query_xz="SELECT * FROM `ws_staffprofile` WHERE rank='District Coordinating Director'";
                                  $search_result_xz=mysqli_query($conn, $query_xz);
                                  while($fetch_xz = mysqli_fetch_array($search_result_xz)){
                                   $supervisor=$fetch_xz['staff_id'];
                                   $rank_ini=$fetch_xz['rank_initials'];
                                  }

                                  ?>
                           
                              <form action="" method="POST">
                              <div class="form-group">
                                <?php  $memo_num=substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",4)),0,4)."_".time();// ?>
                      <input type="hidden" id="subject" class="form-control" name="memo_number" value="<?php echo $memo_num; ?>" readonly>
                                <input type="hidden" class="form-control" name="staff_id" value="<?php echo $_SESSION['staff_id'] ?>"  placeholder="">
                                <input type="text" class="form-control" name="sent_to" value="<?php echo $supervisor ?>"  placeholder="">
                                <input type="hidden" class="form-control" name="" value="<?php echo $_SESSION['unit'] ?>"  placeholder="">
                                <input type="hidden" id="subject" class="form-control" name="rank_ini" value="<?php echo $rank_ini; ?>" readonly>
                              <label>Leave Type</label>
                              <select class="custom-select" id="js-example-basic-single" name="l_type" aria-label="Default select example" required>
                                <option selected>Choose...</option>
                                  <?php
                                  $query01="SELECT * FROM `ws_leave`
                                  inner join ws_leave_type on ws_leave_type.type_id=ws_leave.type_id
                                   WHERE `j_grade`='".$grade_id."'";
                                  $search_result01=mysqli_query($conn, $query01);
                                  while($fetch01 = mysqli_fetch_array($search_result01)){
                                  ?>
                                <option value="<?php echo $fetch01['type_id'] ?>"><?php echo $fetch01['leave_type'] ?></option>
                                <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                              <label>Start Date</label>
                              <input type="date" class="form-control" name="start_date" id="start_date" onchange="calculateDateDifference()" required placeholder="">
                              </div>
                              <div class="form-group">
                              <label>End Date</label>
                              <input type="date" class="form-control" name="end_date" id="end_date" onchange="calculateDateDifference()" required placeholder="">
                              </div>
                              <div class="form-group">
                              <label>Days</label>
                              <input type="number" id="date_difference" name="date_difference" class="form-control" readonly tabindex="0">
                              </div>
                              <div class="form-group">
                      <label>Reason</label>
                       <textarea id="summernote" class="summernote" name="leave_reason" ></textarea>
                      </div>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="applyleave">Submit</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>

        <script>
        function calculateDateDifference() {
            const startDate = new Date(document.getElementById("start_date").value);
            const endDate = new Date(document.getElementById("end_date").value);

            if (startDate && endDate) {
                // Get the time difference in milliseconds
                const timeDifference = endDate - startDate;

                // Convert milliseconds to days
                const millisecondsPerDay = 24 * 60 * 60 * 1000;
                let differenceInDays = Math.round(timeDifference / millisecondsPerDay);

                // Exclude weekends (Saturday and Sunday) from the count
                const startDay = startDate.getDay();
                const endDay = endDate.getDay();

                const fullWeeks = Math.floor(differenceInDays / 7);
                const remainingDays = differenceInDays % 7;

                if (startDay === 6 && endDay === 0) {
                    // If the start date is Saturday and end date is Sunday, adjust the count
                    differenceInDays -= 1;
                } else if (startDay === 6 || startDay === 0) {
                    // If the start date is a weekend, adjust the count
                    differenceInDays -= (startDay === 6 ? 1 : 2);
                } else if (endDay === 6 || endDay === 0) {
                    // If the end date is a weekend, adjust the count
                    differenceInDays -= (endDay === 6 ? 2 : 1);
                }

                // Calculate the new difference in days
                differenceInDays = fullWeeks * 5 + remainingDays;

                document.getElementById("date_difference").value = differenceInDays+1;
            }
        }
    </script>

    <div class="modal fade bd-example-modal-lg" id="viewleave_hod" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <?php
                                  $query="SELECT * FROM `ws_leave_request2`
                                  inner join ws_leave_type on ws_leave_type.type_id=ws_leave_request2.leave_type 
                                   WHERE staff_id='".$_SESSION['nSID']."' AND id='".$_SESSION['rID']."'";
                                  $search_result=mysqli_query($conn, $query);
                                  while($fetch = mysqli_fetch_array($search_result)){
                                   $s_id=$fetch['staff_id'];

                                  

                                   $query_x="SELECT * FROM `ws_staffprofile` WHERE staff_id='".$s_id."'";
                                  $search_result_x=mysqli_query($conn, $query_x);
                                  while($fetch_x = mysqli_fetch_array($search_result_x)){
                                   $from=$fetch_x['rank_initials'];
                                   $from_r=$fetch_x['rank'];
                                   $sfn=$fetch_x['fname']." ".$fetch_x['lname'];
                                  }

                                   $query_xy="SELECT * FROM `ws_staffprofile` WHERE staff_id='".$fetch['sent_to']."'";
                                  $search_result_xy=mysqli_query($conn, $query_xy);
                                  while($fetch_xy = mysqli_fetch_array($search_result_xy)){
                                   $th=$fetch_xy['rank_initials'];
                                   $th_r=$fetch_xy['rank'];
                                  }

                                  $query_xz="SELECT * FROM `ws_staffprofile` WHERE rank='District Coordinating Director'";
                                  $search_result_xz=mysqli_query($conn, $query_xz);
                                  while($fetch_xz = mysqli_fetch_array($search_result_xz)){
                                   $to=$fetch_xz['rank_initials'];
                                   $to_r=$fetch_xz['rank'];
                                   $dcd=$fetch_xz['staff_id'];
                                  }

                                  $query_xv="SELECT * FROM `ws_leave_credit` WHERE staff_id='".$s_id."' AND leave_type='".$_SESSION['lt']."'";
                                  $search_result_xv=mysqli_query($conn, $query_xv);
                                  while($fetch_xv = mysqli_fetch_array($search_result_xv)){
                                   $adays=$fetch_xv['allowed_days'];
                                  }

                                  ?>
                           
                              <form action="" method="POST">
                              <input type="text" id="subject" class="form-control" name="start_date" value="<?php echo $fetch['start_date']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="end_date" value="<?php echo $fetch['end_date']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="sent_to" value="<?php echo $dcd; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="ndays" value="<?php echo $fetch['ndays']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="leave_type" value="<?php echo $fetch['type_id']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="date_applied" value="<?php echo $fetch['date_applied']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="staff_id" value="<?php echo $fetch['staff_id']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="leave_reason" value="<?php echo $fetch['reason']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="p_key" value="<?php echo $fetch['id']; ?>" readonly>

                              <div class="form-group">
                      <label>Reason</label>
                       <textarea id="summernote" class="summernote" name="" >

                        <h1 style="text-center"><u>Memorandum</u></h1>
                        <?php echo "<b>From &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".  $from_r." (".$from.")" ?><br>
                        <?php echo "<b>To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>". $to_r." (".$to.")" ?><br>
                        <?php echo "<b>Through &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".  $th_r." (".$th.")" ?><br>
                        <?php echo "<b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>". $fetch['date_applied'] ?><br>

                        <?php if($_SESSION['ndays']<$adays){ ?>

                        <?php echo "<b>subject&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>"."<u><b> REQUEST FOR PART OF ". strtoupper($fetch['leave_type'])."</b></u>" ?><br><br> 
                      <?php } else {?>
                        <?php echo "<b>subject&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>"."<u><b> REQUEST FOR ". strtoupper($fetch['leave_type'])."</b></u>" ?><br><br> 
                      <?php } ?>
                        <?php echo $fetch['reason'] ?>

                        Signed by:<br>
                        <b><?php echo $sfn ?></b><br>
                        <br>
                      </textarea>

                        
                      </div>
                      <div class="form-group">
                      <label>Comment</label>
                       <textarea id="summernote" class="summernote" name="comment_msg" ></textarea>
                      </div>
                    <?php } ?>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="approveleaveHOD">Approve</button>
                              <button class="btn btn-danger mr-1" type="submit" name="denyleaveHOD">Deny</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>



        <div class="modal fade bd-example-modal-lg" id="viewleave_dcd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <?php
                                  $query="SELECT * FROM `ws_leave_request2`
                                  inner join ws_leave_type on ws_leave_type.type_id=ws_leave_request2.leave_type 
                                   WHERE staff_id='".$_SESSION['nSID']."' AND id='".$_SESSION['rID']."'";
                                  $search_result=mysqli_query($conn, $query);
                                  while($fetch = mysqli_fetch_array($search_result)){
                                   $s_id=$fetch['staff_id'];

                                  

                                   $query_x="SELECT * FROM `ws_staffprofile` WHERE staff_id='".$s_id."'";
                                  $search_result_x=mysqli_query($conn, $query_x);
                                  while($fetch_x = mysqli_fetch_array($search_result_x)){
                                   $from=$fetch_x['rank_initials'];
                                   $from_r=$fetch_x['rank'];
                                   $sfn=$fetch_x['fname']." ".$fetch_x['lname'];
                                  }

                                   $query_xy="SELECT * FROM `ws_staffprofile` WHERE staff_id='".$fetch['sent_to']."'";
                                  $search_result_xy=mysqli_query($conn, $query_xy);
                                  while($fetch_xy = mysqli_fetch_array($search_result_xy)){
                                   $th=$fetch_xy['rank_initials'];
                                   $th_r=$fetch_xy['rank'];
                                  }

                                  $query_xz="SELECT * FROM `ws_staffprofile` WHERE rank='District Coordinating Director'";
                                  $search_result_xz=mysqli_query($conn, $query_xz);
                                  while($fetch_xz = mysqli_fetch_array($search_result_xz)){
                                   $to=$fetch_xz['rank_initials'];
                                   $to_r=$fetch_xz['rank'];
                                   $dcd=$fetch_xz['staff_id'];
                                  }

                                  $query_xv="SELECT * FROM `ws_leave_credit` WHERE staff_id='".$s_id."' AND leave_type='".$_SESSION['lt']."'";
                                  $search_result_xv=mysqli_query($conn, $query_xv);
                                  while($fetch_xv = mysqli_fetch_array($search_result_xv)){
                                   $adays=$fetch_xv['allowed_days'];
                                  }

                                  ?>
                           
                              <form action="" method="POST">
                              <input type="text" id="subject" class="form-control" name="start_date" value="<?php echo $fetch['start_date']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="end_date" value="<?php echo $fetch['end_date']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="sent_to" value="<?php echo $dcd; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="ndays" value="<?php echo $fetch['ndays']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="leave_type" value="<?php echo $fetch['type_id']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="date_applied" value="<?php echo $fetch['date_applied']; ?>" readonly>
                              <input type="text" id="subject" class="form-control" name="staff_id" value="<?php echo $fetch['staff_id']; ?>" readonly>

                              <div class="form-group">
                      <label>Reason</label>
                       <textarea id="summernote" class="summernote" name="leave_reason" >

                        <h1 style="text-center"><u>Memorandum</u></h1>
                        <?php echo "<b>From &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".  $from_r." (".$from.")" ?><br>
                        <?php echo "<b>To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>". $to_r." (".$to.")" ?><br>
                        <?php echo "<b>Through &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".  $th_r." (".$th.")" ?><br>
                        <?php echo "<b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>". $fetch['date_applied'] ?><br>

                        <?php if($_SESSION['ndays']<$adays){ ?>

                        <?php echo "<b>subject&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>"."<u><b> REQUEST FOR PART OF ". strtoupper($fetch['leave_type'])."</b></u>" ?><br><br> 
                      <?php } else {?>
                        <?php echo "<b>subject&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>"."<u><b> REQUEST FOR ". strtoupper($fetch['leave_type'])."</b></u>" ?><br><br> 
                      <?php } ?>
                        <?php echo $fetch['reason'] ?>

                        Signed by:<br>
                        <b><?php echo $sfn ?></b><br>
                        <br>
                      </textarea>

                        
                      </div>
                    <?php } ?>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="approveleaveDCD">Approve</button>
                              <button class="btn btn-danger mr-1" type="submit" name="denyleaveDCD">Deny</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>



  <div class="modal fade bd-example-modal-lg" id="rename_folder" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Rename Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                              <?php if(isset($success)) { ?>
                              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $success ?>
                      </div>
                    </div>
                              <?php }elseif(isset($warning)) { ?>
                              <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $warning ?>
                      </div>
                    </div>
                              <?php }elseif(isset($error)) { ?>
                              <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $error ?>
                      </div>
                    </div>
                              <?php } ?>
                              <form action="" method="POST">
                              <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="id" required tabindex="0" value="<?php echo $_SESSION['fid'] ?>">
                              <input type="text" class="form-control" name="new_name" required tabindex="0" value="<?php echo $_SESSION['re_name'] ?>">
                              <input type="text" class="form-control" name="old_name" required tabindex="0" value="<?php echo $_SESSION['re_name'] ?>">
                              </div>
                              <div class="form-group">
                              <label>Description</label>
                              <input type="text" class="form-control" name="des" tabindex="0" value="<?php echo $_SESSION['des'] ?>">
                              </div>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="rename_folder">Submit</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>


 <div class="modal fade bd-example-modal-lg" id="addLedger" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Ledger Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                              <?php if(isset($success)) { ?>
                              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $success ?>
                      </div>
                    </div>
                              <?php }elseif(isset($warning)) { ?>
                              <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $warning ?>
                      </div>
                    </div>
                              <?php }elseif(isset($error)) { ?>
                              <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $error ?>
                      </div>
                    </div>
                              <?php } ?>
                              <form action="" method="POST">
                              <div class="form-group">
                              <label>Ledger Code</label>
                              <?php  $gen=substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",2)),0,2);
                              $timestamp = (string) time(); // Convert the timestamp to a string
$limitedTimestamp = substr($timestamp, 0, 4); // Keep the first 6 characters
$memo_num=$gen.$limitedTimestamp;
                              // ?>
                              <input type="text" class="form-control" name="ledger_code" required tabindex="0" value="<?php echo $memo_num ?>" readonly>
                              
                              </div>
                              <div class="form-group">
                              <label>Ledger Name</label>
                              <input type="text" class="form-control" name="ledger_name" required tabindex="0" >
                              </div>
                              <div class="form-group">
                              <label>Ledger Description</label>
                              <input type="text" class="form-control" name="ledger_des" required tabindex="0" >
                              </div>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="addLedger">Submit</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>





<div class="modal fade bd-example-modal-lg" id="addsraItems" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width: 1400px;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Items for <?php echo "SRA No.: ".$_SESSION['sra_no'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                   
                              <form action="" method="POST">
                    <table class="table table-bordered" id="table_field1">
                      <thead>
                        <tr>
                          <!-- <th>Item</th> -->
                          <th width="30%">Details of Order/Service</th>
                          <th>Folio No.</th>
                          <th>Ordered</th>
                           <th>Received</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <tr>
                          <td><input type="text" class="form-control" name="details[]" required placeholder=""></td>
                          <td><input type="text" class="form-control"  name="folio[]" readonly value="<?php echo $_SESSION['folio']; ?>" required placeholder="">
                          <input type="text" class="form-control"  name="sra_no[]" readonly value="<?php echo $_SESSION['sra_no']; ?>" required placeholder=""></td>
                          <td><input type="number" onkeyup="performAddition()" id="num1" class="form-control" name="ordered[]" required placeholder=""></td>
                          <td><input type="number" onkeyup="performAddition()" id="num2" class="form-control"  name="received[]" required placeholder=""></td>
                          <td><input type="number" class="form-control" id="balance"  name="balance[]" required readonly></td>
                          <td><input type="button" class="form-control btn-success" id="add_t" name="add_t" value="+"></td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-3">
                        <input type="submit" class="form-control btn-primary" name="addtrain" id="" value="Save">
                      </div>
                    </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>




        <script type="text/javascript">
    $(document).ready(function(){
    var html='<tr><td><input type="text" class="form-control" name="details[]" required placeholder=""></td><td><input type="text" class="form-control"  name="folio[]" value="<?php echo $folio_num; ?>" required placeholder=""><input type="text" class="form-control"  name="sra_no[]" readonly value="<?php echo $_SESSION['sra_no']; ?>" required placeholder=""></td><td><input type="number" onkeyup="performAddition()" id="num1" class="form-control" name="ordered[]" required placeholder=""></td><td><input type="number" onkeyup="performAddition()" id="num2" class="form-control"  name="received[]" required placeholder=""></td><td><input type="number" class="form-control" id="balance"  name="balance[]" required readonly></td><td><input type="button" class="form-control btn-danger" id="remove_t" name="remove_t" value="-"></td></tr>';

      var max=50;
      var x=1;

      $("#add_t").click(function(){
        if(x<=max){
        $("#table_field1").append(html);
        x++;
      }
      });
      $("#table_field1").on('click', '#remove_t', function(){
        $(this).closest('tr').remove();
        x--;
      });
    });

    function performAddition() {
            var num1 = parseFloat(document.getElementById("num1").value) || 0;
            var num2 = parseFloat(document.getElementById("num2").value) || 0;
            
            var sum = num1 - num2;
            
            document.getElementById("balance").value = sum;
        }
</script>








 <script>
$(document).ready(function() {
  // Initialize Select2 on the select element
  $('#selectBox').select2();

  // Select all options
  $('#selectBox').find('option').prop('selected', true);
  $('#selectBox').trigger('change'); // Trigger the change event
});
</script>




<div class="modal fade bd-example-modal-lg" id="addstoreItems" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Store Items</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                              <?php if(isset($success)) { ?>
                              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $success ?>
                      </div>
                    </div>
                              <?php }elseif(isset($warning)) { ?>
                              <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $warning ?>
                      </div>
                    </div>
                              <?php }elseif(isset($error)) { ?>
                              <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $error ?>
                      </div>
                    </div>
                              <?php } ?>
                              <?php

        $query="SELECT * FROM ws_storeItems";
        $search_result=mysqli_query($conn, $query);
        if($search_result->num_rows>0){
          while($fetch = mysqli_fetch_assoc($search_result)){
            $ic=$fetch['item_code'];
          }
          $nic=$ic+1;
        }
        else{
          $nic=1000;
        }
          ?>
                              <form action="" method="POST">
                              <div class="form-group">
                              <label>Item Code</label>
                              <input type="text" class="form-control" name="code" required tabindex="0" value="<?php echo $nic ?>">
                              </div>
                              <div class="form-group">
                              <label>Item Name</label>
                              <input type="text" class="form-control" name="item_name" tabindex="0">
                              </div>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="addItem">Submit</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>



<div class="modal fade bd-example-modal-lg" id="sraApproval" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Order/Service Approval</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                              <?php if(isset($success)) { ?>
                              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $success ?>
                      </div>
                    </div>
                              <?php }elseif(isset($warning)) { ?>
                              <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $warning ?>
                      </div>
                    </div>
                              <?php }elseif(isset($error)) { ?>
                              <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $error ?>
                      </div>
                    </div>
                  <?php } ?>
                             
                              <form action="" method="POST">
                              <div class="form-group">
                              <label>SRA No.</label>
                              <input type="text" class="form-control" name="sra_no" readonly> tabindex="0" value="<?php echo $_SESSION['sra_no'] ?>">
                              <input type="hidden" class="form-control" name="oic" required tabindex="0" value="<?php echo $_SESSION['staff_id'] ?>">
                              <input type="hidden" class="form-control" name="j_title" required tabindex="0" value="<?php echo $_SESSION['rank'] ?>">
                              <input type="hidden" class="form-control" name="unit" required tabindex="0" value="<?php echo $_SESSION['unit'] ?>">
                              </div>
                              <div class="form-group">
                            <div class="section-title">I certify that the service has been performed according to order</div>
                    <div class="pretty p-icon p-curve p-tada">
                      <input type="radio" name="approve" required>
                      <div class="state p-primary-o">
                        <i class="icon material-icons">done</i>
                        <label>Approve</label>
                      </div>
                    </div>
                  </div>
                              <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit" name="sraApproval">Submit</button>
                              </div>
                              </form>
                            </div>
              </div>
            </div>
          </div>
        </div>
