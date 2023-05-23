<?php

class Edituser_Model extends Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        if (isset($_COOKIE["xpkey"])) {
            $key_login = explode(':', $_COOKIE["xpkey"]);
            $Ukey=$key_login[0];
            $Pkey=$key_login[1];
            $query = $this->db->prepare("select * from setting where adminuser='" .$Ukey. "' and login_key='" .$_COOKIE["xpkey"]. "'");
            $query->execute();
            $queryCount = $query->rowCount();
            $query_ress = $this->db->prepare("select * from admins where username_u='" . $Ukey . "' and login_key='" . $_COOKIE["xpkey"] . "'");
            $query_ress->execute();
            $queryCount_ress = $query_ress->rowCount();
            if ($queryCount == 0 && $queryCount_ress == 0) {
                header("location: login");
            }
        } else {
            header("location: login");
        }
    }

    public function user($data_sybmit)
    {

        $query = $this->db->prepare("select * from users  WHERE username='".$data_sybmit['username']."'");
        $query->execute();
        $queryCount = $query->fetchAll();
        return $queryCount;
    }
    public function submit_update($data_sybmit)
    {
        $password=$data_sybmit['password'];
        $email=$data_sybmit['email'];
        $username=$data_sybmit['username'];
        $mobile=$data_sybmit['mobile'];
        $multiuser=$data_sybmit['multiuser'];
        $finishdate=$data_sybmit['finishdate'];
        $traffic=$data_sybmit['traffic'];
        $info=$data_sybmit['info'];
        $data = [
            'password'=>$password,
            'email' => $email,
            'mobile' => $mobile,
            'multiuser' => $multiuser,
            'finishdate' => $finishdate,
            'traffic' => $traffic,
            'info' => $info,
            'username' => $username
        ];

        $sql = "UPDATE users SET password=:password, email=:email,mobile=:mobile,multiuser=:multiuser,finishdate=:finishdate,traffic=:traffic,info=:info WHERE username=:username";

        $statement = $this->db->prepare($sql);

        if($statement->execute($data)) {
          shell_exec("sudo killall -u " . $username);
          shell_exec("bash Libs/sh/changepass ".$username." ".$password);
            header("Location: users");
        }
        //header("Location: users");
    }

}
