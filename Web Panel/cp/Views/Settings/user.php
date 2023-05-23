<div class="card-body">
    <form class="validate-me" action="" method="post" enctype="multipart/form-data">

                  <div class="form-group row">
                  <?php echo status_tb_lang;?>:
                      <?php
                      if ($multiuser=='on') {
                          echo '<span class="badge bg-light-success rounded-pill f-12" style="width:100px">'.active_tb_lang.'</span>';
                      } else {
                          echo '<span class="badge bg-light-danger rounded-pill f-12" style="width:100px">'.deactive_tb_lang.'</span>';
                      }
                      ?>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-4 col-form-label"></div>
                    <div class="col-lg-6">
                      <input type="submit" class="btn btn-primary" name="on_limit_user" value="<?php echo active_u_act_tb_lang;?>">
                      <input type="submit" class="btn btn-warning" name="off_limit_user" value="<?php echo deactive_u_act_tb_lang;?>">
                    </div>
                  </div>
<hr>
<?php echo setting_multiuser_dec_lang;?><br><br>
        <div class="form-group row">
            <?php echo status_tb_lang;?>:
            <?php
            if ($ststus_multiuser=='on') {
                echo '<span class="badge bg-light-success rounded-pill f-12" style="width:100px">'.active_tb_lang.'</span>';
            } else {
                echo '<span class="badge bg-light-danger rounded-pill f-12" style="width:100px">'.deactive_tb_lang.'</span>';
            }
            ?>
        </div>

        <div class="form-group row">
            <div class="col-lg-4 col-form-label"></div>
            <div class="col-lg-6">
                <input type="submit" class="btn btn-primary" name="on_status_user" value="<?php echo active_u_act_tb_lang;?>">
                <input type="submit" class="btn btn-warning" name="off_status_user" value="<?php echo deactive_u_act_tb_lang;?>">
            </div>
        </div>
                </form>
              </div>
