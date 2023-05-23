<?php
include_once("Models/Users_Model.php");
class Users extends Controller
{
	public function __construct()
	{
		parent::__construct();
        
		$this->model = new Users_Model();
		$this->index();
	}
	public function index()
	{
        $users=$this->model->users();
        $setting=$this->model->Get_settings();

        //  echo "<pre>";
       // print_r($users);
        $data = array(
            "for" => $users,
            "setting" => $setting
        );
        if(isset($_GET['active'])) {
            if (!empty($_GET["active"])) {
                $usernme = htmlentities($_GET['active']);
                $data_sybmit = array(
                    'username' => $usernme
                );
                $this->model->submit_ative($data_sybmit);
            }
        }

        if(isset($_GET['deactive'])) {
            if (!empty($_GET["deactive"])) {
                $usernme = htmlentities($_GET['deactive']);
                $data_sybmit = array(
                    'username' => $usernme
                );
                $this->model->submit_deative($data_sybmit);
            }
        }

        if(isset($_GET['delete']))
        {
            $usernme = htmlentities($_GET['delete']);
            $data_sybmit = array(
                'username' =>$usernme
            );
            $this->model->delete_user($data_sybmit);
        }

        if(isset($_GET['reset-traffic']))
        {
            $usernme = htmlentities($_GET['reset-traffic']);
            $data_sybmit = array(
                'username' =>$usernme
            );
            $this->model->reset_traffic($data_sybmit);
        }

        $this->submit_index();
        $this->submit_index_bulk();
		$this->view->Render("Users/index",$data);
	}
    function submit_index(){

        if (isset($_POST['submit']))
        {
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']);
            $email = htmlentities($_POST['email']);
            $mobile = htmlentities($_POST['mobile']);
            $multiuser = htmlentities($_POST['multiuser']);
            $connection_start = htmlentities($_POST['connection_start']);
            $traffic = htmlentities($_POST['traffic']);
            $type_traffic = htmlentities($_POST['type_traffic']);
            $expdate = htmlentities($_POST['expdate']);
            $desc = htmlentities($_POST['desc']);
            if(!empty($connection_start)) { $st_date=''; }
            else { $st_date=date("Y-m-d"); }
            if ($type_traffic == "gb") {
                $traffic = $traffic * 1024;
            } else {
                $traffic = $traffic;
            }
            $data_sybmit = array(
                'username' =>$username,
                'password' => $password,
                'email' => $email,
                'mobile' => $mobile,
                'multiuser' => $multiuser,
                'startdate' => $st_date,
                'finishdate' => $expdate,
                'finishdate_one_connect' => $connection_start,
                'enable' => 'true',
                'traffic' => $traffic,
                'referral' => '',
                'info' => $desc
            );
            //shell_exec("bash adduser " . $username . " " . $password);
            $this->model->submit_index($data_sybmit);
            //header('location: users');


        }

    }

    //bulk user
    function submit_index_bulk(){


        if (isset($_POST['bulk']))
        {
            $count_user = htmlentities($_POST['count_user']);
            $start_user = htmlentities($_POST['start_user']);
            $start_number = htmlentities($_POST['start_number']);

            $password = htmlentities($_POST['password']);
            $pass_random = htmlentities($_POST['pass_random']);
            $char_pass = htmlentities($_POST['char_pass']);

            $multiuser = htmlentities($_POST['multiuser']);
            $connection_start = htmlentities($_POST['connection_start']);
            $traffic = htmlentities($_POST['traffic']);
            $type_traffic = htmlentities($_POST['type_traffic']);
            if ($type_traffic == "gb") {
                $traffic = $traffic * 1024;
            } else {
                $traffic = $traffic;
            }
            for ($i = 0; $i < $count_user; $i++) {
                if ($start_number < $start_number + $count_user) {
                    $list_users[] = $start_user . $start_number;
                    $start_number++;
                }
            }

            foreach ($list_users as $user) {
                $data_sybmit = array(
                    'username' => $user,
                    'password' => $password,
                    'email' => 'کاربر عمده',
                    'mobile' => '',
                    'multiuser' => $multiuser,
                    'startdate' => '',
                    'finishdate' => '',
                    'finishdate_one_connect' => $connection_start,
                    'enable' => 'true',
                    'traffic' => $traffic,
                    'referral' => '',
                    'info' => 'کاربرعمده',
                    'pass_rand' => $pass_random,
                    'pass_char' => $char_pass
                );
                //shell_exec("bash adduser " . $username . " " . $password);
                $this->model->submit_index($data_sybmit);
                //header('location: users');

            }


        }

    }


}
