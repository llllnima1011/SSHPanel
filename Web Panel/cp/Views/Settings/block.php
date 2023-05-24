<div class="card-body">
    <div class="form-group row">
        <div class="col-lg-12">

            <p class="form-text text-muted"><?php echo setting_block_dec1_lang;?></p>
            <p class="form-text text-muted"><?php echo setting_block_dec2_lang;?></p>
            <code>sudo apt-get install curl unzip perl</code>
            <br>
            <code>sudo apt-get install xtables-addons-common -y</code>
            <br>
            <code>sudo apt-get install libtext-csv-xs-perl libmoosex-types-netaddr-ip-perl -y</code>
            <br>
            <code>bash <(curl -Ls
                https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/main/block_iran.sh
                --ipv4)</code>
            <br>
            <p class="form-text text-muted"><?php echo setting_block_dec3_lang;?></p>
            <br>

            <div class="form-group">
                <?php echo status_tb_lang;?>: <?php
                $limitlist = shell_exec("sudo iptables -L OUTPUT");
                $limitlist = preg_split("/\r\n|\n|\r/", $limitlist);
                $iptablesnumber = count($limitlist) - 3;
                if (0 < $iptablesnumber) {
                    echo '<span class="badge bg-light-success rounded-pill f-12" style="width:100px">'.active_tb_lang.'</span>';
                } else {
                    echo '<span class="badge bg-light-danger rounded-pill f-12" style="width:100px">'.deactive_tb_lang.'</span>';
                }
                ?></div><br>
            <form class="validate-me" action="" method="post" enctype="multipart/form-data">
                <input type="submit" name="active_blockip" class="btn btn-warning" value="<?php echo active_u_act_tb_lang;?>">
                <input type="submit" name="deactive_blockip" class="btn btn-success" value="<?php echo deactive_u_act_tb_lang;?>">

            </form>

        </div>
    </div>


</div>
