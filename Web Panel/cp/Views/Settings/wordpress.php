<div class="card-body">
    <div class="form-group row">
        <div class="col-lg-12">

            <p class="form-text text-muted"><b style="color:red"><?php echo setting_wordpress_desc1_lang;?></b></p>
            <p class="form-text text-muted"><?php echo setting_wordpress_desc2_lang;?></p>
            <p class="form-text text-muted"><?php echo setting_wordpress_desc3_lang;?></p>
            <code>bash <(curl -Ls
                https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/main/wp-install.sh
                --ipv4)</code>
            <br>
            <p class="form-text text-muted"><?php echo setting_wordpress_desc4_lang;?></p>
            <p class="form-text text-muted"><?php echo setting_wordpress_desc5_lang;?></p>
            <p class="form-text text-muted"><?php echo setting_wordpress_desc6_lang;?></p>
            <p class="form-text text-muted"><?php echo setting_wordpress_desc7_lang;?></p>
            <p class="form-text text-muted"><b><?php echo setting_wordpress_desc8_lang;?></b></p>
            <p class="form-text text-muted"><a href="<?php
                $r = explode(':', path);
                echo $r[0]."://".$r[1];?>" target="_blank"><?php echo setting_wordpress_install_lang;?></a> </p>
            <br>



        </div>
    </div>


</div>
