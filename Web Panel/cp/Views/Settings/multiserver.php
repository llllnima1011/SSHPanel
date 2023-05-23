<div class="card-body">
    <div class="alert alert-warning" role="alert"><?php echo setting_multiserver_alert_lang;?></div>

    <form class="validate-me" id="validate-me" data-validate="" novalidate="true">
                  <div class="form-group row">
                    <div class="col-lg-6">
                      <input type="password" name="confirm-password" id="confirm-password" data-bouncer-match="#password" class="form-control" data-bouncer-mismatch-message="Your passwords do not match." required="">
                      <small class="form-text text-muted"><?php echo setting_multiserver_ip_lang;?></small>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-6">
                      <input class="form-control" type="text" minlength="3" maxlength="9" name="text_min_max" id="text_min_max" required="">
                      <small class="form-text text-muted"><?php echo setting_multiserver_uname_lang;?></small>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-6">
                      <input class="form-control" type="text" name="text_min_max" id="text_min_max" required="">
                      <small class="form-text text-muted"><?php echo setting_multiserver_pass_lang;?></small>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-4 col-form-label"></div>
                    <div class="col-lg-6">
                      <input type="submit" class="btn btn-primary" value="<?php echo modal_submit_lang;?>">
                    </div>
                  </div>
                </form>
                <hr>
                <div class="col-sm-12">
          				<div class="card table-card">
          					<div class="card-body">
          						<div class="table-responsive">
          							<table class="table table-hover" id="pc-dt-simple">
          								<thead>
          									<tr>
          										<th>#</th>
          										<th><?php echo setting_multiserver_iptb_lang;?></th>
          										<th><?php echo username_tb_lang;?></th>
          										<th><?php echo password_tb_lang;?></th>
          										<th class="text-center"><?php echo action_tb_lang;?></th>
          									</tr>
          								</thead>
          								<tbody>
          									
          									</tbody>
          							</table>
          						</div>
          					</div>
          				</div>
          			</div>

              </div>
