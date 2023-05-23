<?php
include_once("Models/Reinstall_Model.php");

class Reinstall extends Controller
{
	function __construct()
	{
		parent::__construct();
        if (isset($_COOKIE["xpkey"])) {
            $key_login = explode(':', $_COOKIE["xpkey"]);
            $query = $this->db->prepare("select * from setting where adminuser='" . $key_login[0] . "' and login_key='" . $key_login[1] . "'");
            $query->execute();
            $queryCount = $query->rowCount();

            $query_ress = $this->db->prepare("select * from admins where username_u='" . $key_login[0] . "' and login_key='" . $key_login[1] . "'");
            $query_ress->execute();
            $queryCount_ress = $query_ress->rowCount();
            if ($queryCount < 1) {
                header("location: login");
            } elseif ($queryCount_ress < 1) {
                header("location: login");
            } else {
                header("location: login");
            }
        } else {
            header("location: login");
        }
        $this->model = new Reinstall_Model();
        $this->model->install();
	}


}
