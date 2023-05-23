<div class="card-body">
                <form class="validate-me" id="validate-me" data-validate="" novalidate="true">
                  <div class="form-group row">
                    <div class="col-lg-6">
                        <div class="alert alert-warning" role="alert"><?php echo setting_telegram_alert_lang;?></div>

                        <?php echo setting_telegram_desc1_lang;?>
                      <BR>
                        <?php echo setting_telegram_desc2_lang;?>
                        <BR>
                      <?php echo setting_telegram_desc3_lang;?>
                      <BR>
                        <a href="https://github.com/Alirezad07/X-Panel-SSH-User-Management"><?php echo setting_telegram_ssl_lang;?></a>
                    </div>
                  </div>
                      <div class="form-group row">
                      <div class="col-lg-6">
                      <input type="password" name="confirm-password" id="confirm-password" data-bouncer-match="#password" class="form-control" data-bouncer-mismatch-message="Your passwords do not match." required="">
                      <small class="form-text text-muted"><?php echo setting_telegram_token_lable_lang;?></small>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-6">
                      <input class="form-control" type="text" minlength="3" maxlength="9" name="text_min_max" id="text_min_max" required="">
                      <small class="form-text text-muted"><?php echo setting_telegram_id_lable_lang;?></small>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-4 col-form-label"></div>
                    <div class="col-lg-6">
                      <input type="submit" class="btn btn-primary" value="<?php echo register_date_tb_lang;?>">
                    </div>
                  </div>
                </form>
              </div>
