<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0"><?php echo online_users_lang; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="pc-dt-simple">
                                <thead>
                                <tr>
                                    <th><?php echo username_tb_lang; ?></th>
                                    <th>IP</th>
                                    <th class="text-center"><?php echo action_tb_lang; ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $duplicate = [];
                                $m = 1;
                                $dropb = shell_exec("cat /var/log/auth.log | grep -i dropbear | grep -i \"Password auth succeeded\" | grep \"for 'ttes'\" | awk '{print $5}'");
                                //print_r($dropb);
                                $dropbear = shell_exec("ps aux | grep -i dropbear | awk '{print $2}'");
                                $dropbear = preg_split("/\r\n|\n|\r/", $dropbear);
                                $drop_dup=[];
                                $list = shell_exec("sudo lsof -i :" . PORT . " -n | grep -v root | grep ESTABLISHED");
                                $onlineuserlist = preg_split("/\r\n|\n|\r/", $list);
                                foreach ($onlineuserlist as $user) {
                                    $user = preg_replace("/\\s+/", " ", $user);
                                    if (strpos($user, ":AAAA") !== false) {
                                        $userarray = explode(":", $user);
                                    } else {
                                        $userarray = explode(" ", $user);
                                    }
                                    if (strpos($userarray[8], "->") !== false) {
                                        $userarray[8] = strstr($userarray[8], "->");
                                        $userarray[8] = str_replace("->", "", $userarray[8]);
                                        $userip = substr($userarray[8], 0, strpos($userarray[8], ":"));
                                    } else {
                                        $userip = $userarray[8];
                                    }
                                    $color = "#dc2626";
                                    if (!in_array($userarray[2], $duplicate)) {
                                        $color = "#269393";
                                        array_push($duplicate, $userarray[2]);
                                    }
                                    if (!empty($userarray[2]) && $userarray[2] !== "sshd") {
                                        $drop_dup=$userarray[2];

                                        ?>
                                        <tr>
                                            <td><?php echo $userarray[2]; ?> <i
                                                        style="color:<?php echo $color; ?>!important;"
                                                        class="ti ti-live-photo"></i></td>
                                            <td><?php echo $userip; ?><br><small>Protocol:SSH</small></td>
                                            <td class="text-center">
                                                <ul class="list-inline me-auto mb-0">
                                                    <li class="list-inline-item align-bottom">
                                                        <a href="online&kill-id=<?php echo $userarray[1]; ?>"
                                                           class="btn btn-light-primary">
                                                            Kill ID
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item align-bottom">
                                                        <a href="online&kill-user=<?php echo $userarray[2]; ?>"
                                                           class="btn btn-light-danger">
                                                            Kill USER
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <?php

                                    }

                                }
                                foreach ($dropbear as $pid) {

                                    $num_drop = shell_exec("cat /var/log/auth.log | grep -i dropbear | grep -i \"Password auth succeeded\" | grep \"dropbear\[$pid\]\" | wc -l");
                                    $user_drop = shell_exec("cat /var/log/auth.log | grep -i dropbear | grep -i \"Password auth succeeded\" | grep \"dropbear\[$pid\]\" | awk '{print $10}'");
                                    $ip_drop = shell_exec("cat /var/log/auth.log | grep -i dropbear | grep -i \"Password auth succeeded\" | grep \"dropbear\[$pid\]\" | awk '{print $12}'");
                                    $user_drop=str_replace("'", "",$user_drop);
                                    if ($num_drop > 0 ) {


                                        $color = "#dc2626";
                                        if(!array_search($user_drop, $drop_dup) !== false){
                                            $color = "#269393";
                                            array_push($drop_dup, $user_drop);
                                        }
                                        $onlinecount = count($drop_dup, COUNT_RECURSIVE);
                                        if($onlinecount>1){
                                            $color = "#dc2626";
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $user_drop; ?> <i
                                                        style="color:<?php echo $color; ?>!important;"
                                                        class="ti ti-live-photo"></i></td>
                                            <td><?php echo $ip_drop; ?><br><small>Protocol:Dropbaer</small></td>
                                            <td class="text-center">
                                                <ul class="list-inline me-auto mb-0">
                                                    <li class="list-inline-item align-bottom">
                                                        <a href="online&kill-id=<?php echo $pid; ?>"
                                                           class="btn btn-light-primary">
                                                            Kill ID
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item align-bottom">
                                                        <a href="online&kill-user=<?php echo $user_drop; ?>"
                                                           class="btn btn-light-danger">
                                                            Kill USER
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
