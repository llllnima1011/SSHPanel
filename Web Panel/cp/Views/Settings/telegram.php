<div class="card-body">
    <form class="validate-me" action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-lg-12">
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
                <input type="text" name="tokenbot" class="form-control" value="<?php echo $tgtoken;?>" required="">
                <small class="form-text text-muted"><?php echo setting_telegram_token_lable_lang;?></small>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6">
                <input class="form-control" type="text" name="idtelegram" value="<?php echo $tgid;?>" required="">
                <small class="form-text text-muted"><?php echo setting_telegram_id_lable_lang;?></small>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4 col-form-label"></div>
            <div class="col-lg-6">
                <input type="submit" name="submitbot" class="btn btn-primary" value="<?php echo register_date_tb_lang;?>">
            </div>
        </div>
    </form>
</div>
