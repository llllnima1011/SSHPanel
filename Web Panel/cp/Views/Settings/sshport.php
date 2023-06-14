<div class="card-body">
    <div class="alert alert-danger" role="alert"><?php echo setting_sshport_alert_lang;?></div>
    <small><?php echo setting_sshport_desc_lang;?></small>
    <form class="validate-me" action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-lg-6">
                <input class="form-control" type="hidden" name="ssh_port_old" id="text_min_max" value="<?php echo PORT;?>">
                <input class="form-control" type="text" name="ssh_port" id="text_min_max" value="<?php echo PORT;?>" required="">
                <small class="form-text text-muted"><?php echo setting_sshport_lable_lang;?></small>
            </div>

            <div class="col-lg-6">
                <input class="form-control" type="text" name="sshtlsport" id="text_min_max" value="<?php echo $ssh_tls_port;?>" required="">
                <small class="form-text text-muted"><?php echo setting_sshtlsport_lable_lang;?></small>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4 col-form-label"></div>
            <div class="col-lg-6">
                <input type="submit" class="btn btn-primary" name="changeport" value="<?php echo register_date_tb_lang;?>">
            </div>
        </div>
    </form>
</div>
