<div class="card-body">
    <form class="validate-me" action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-lg-12">
                <p class="form-text text-muted"><b style="color:red"><?php echo setting_fakeadd_alert_lang;?></b></p>

                <input type="text" name="fake_address" id="confirm-password" placeholder="<?php echo setting_fake_address_lang;?>" value="<?php echo fakeurl;?>" class="form-control" >
                <input type="hidden" name="fake_address_old" id="confirm-password" placeholder="<?php echo setting_fake_address_lang;?>" value="<?php echo fakeurl;?>" class="form-control" >
                <small class="form-text text-muted"><?php echo setting_fakeadd_web_lang;?></small>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4 col-form-label"></div>
            <div class="col-lg-6">
                <input type="submit" name="fakeurl" class="btn btn-primary" value="<?php echo register_date_tb_lang;?>">
            </div>
        </div>
    </form>

</div>
