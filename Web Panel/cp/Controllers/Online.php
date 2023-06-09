<?php
include_once("Models/Index_Model.php");

class Online extends Controller
{

    function __construct()
    {

        parent::__construct();
        $this->model = new Index_Model();

        if(isset($_GET['kill-id'])) {
            if (!empty($_GET["kill-id"])) {
                $killid = htmlentities($_GET['kill-id']);
                shell_exec("sudo kill -9 " . $killid);
            }
        }
        if(isset($_GET['kill-user'])) {
            if (!empty($_GET["kill-user"])) {
                $killuser = htmlentities($_GET['kill-user']);
                $dropbear = shell_exec("ps aux | grep -i dropbear | awk '{print $2}'");
                $dropbear = preg_split("/\r\n|\n|\r/", $dropbear);
                foreach ($dropbear as $pid) {

                    $num_drop = shell_exec("cat /var/log/auth.log | grep -i dropbear | grep -i \"Password auth succeeded\" | grep \"dropbear\[$pid\]\" | wc -l");
                    $user_drop = shell_exec("cat /var/log/auth.log | grep -i dropbear | grep -i \"Password auth succeeded\" | grep \"dropbear\[$pid\]\" | awk '{print $10}'");
                    $user_drop=str_replace("'", "",$user_drop);
                    $user_drop=str_replace("\n", "",$user_drop);
                    $user_drop = htmlentities($user_drop);

                    if ($num_drop > 0 && $user_drop==$killuser) {

                        shell_exec("sudo kill -9 " . $pid);
                    }
                }
                shell_exec("sudo killall -u " . $killuser);
            }
        }
        $this->view->Render("Online/index");
    }
}
