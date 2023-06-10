<?php

class Reinstall_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function install()
    {
        $statements = [
            'CREATE TABLE setting(
	        id   INT AUTO_INCREMENT,
	        adminuser  VARCHAR(100) NOT NULL,
	        adminpassword VARCHAR(100) NULL,
	        sshport VARCHAR(100) NULL,
	        tgtoken   VARCHAR(100) NULL,
					tgid   VARCHAR(50) NULL,
					language   VARCHAR(100) NULL,
					permissions   VARCHAR(100) NULL,
					credit   VARCHAR(100) NULL,
	        PRIMARY KEY(id)
	    );',
            'CREATE TABLE users(
						id   INT AUTO_INCREMENT,
						username  VARCHAR(100) NOT NULL,
						password VARCHAR(50) NULL,
						email   VARCHAR(100) NULL,
						mobile   VARCHAR(100) NULL,
						multiuser   VARCHAR(100) NULL,
						startdate   VARCHAR(100) NULL,
						finishdate   VARCHAR(100) NULL,
						finishdate_one_connect   VARCHAR(100) NULL,
						enable   VARCHAR(100) NULL,
						traffic   VARCHAR(100) NULL,
						referral   VARCHAR(100) NULL,
						info   VARCHAR(100) NULL,
						PRIMARY KEY(id)
				);',
            'CREATE TABLE servers(
							id  INT AUTO_INCREMENT,
							serverip  VARCHAR(100) NOT NULL,
							serverlocation VARCHAR(100) NULL,
							serverusername   VARCHAR(100) NULL,
							serverpassword   VARCHAR(100) NULL,
							PRIMARY KEY(id)
					);',
            'CREATE TABLE ApiToken(
								id  INT AUTO_INCREMENT,
								Token  VARCHAR(100) NOT NULL,
								Description VARCHAR(100) NULL,
								Allowips   VARCHAR(100) NULL,
								enable   VARCHAR(100) NULL,
								PRIMARY KEY(id)
						);',
            'CREATE TABLE admins(
								id  INT AUTO_INCREMENT,
								username_u VARCHAR(100) NOT NULL,
								password_u VARCHAR(100) NULL,
								permission_u VARCHAR(100) NULL,
								credit_u VARCHAR(250) NULL,
								condition_u VARCHAR(100) NULL,
								PRIMARY KEY(id)
						);',
            'CREATE TABLE Traffic(
									id  INT AUTO_INCREMENT,
									user  VARCHAR(100) NOT NULL,
									download VARCHAR(100) NULL,
									upload   VARCHAR(100) NULL,
									total   VARCHAR(100) NULL,
									CONSTRAINT reference_unique UNIQUE (user),
									PRIMARY KEY(id)
							)'];

        // execute SQL statements
        foreach ($statements as $statement) {
            $this->db->exec($statement);
        }
        $sql=$this->db->prepare("TRUNCATE TABLE `setting`");
        $sql->execute();
        $sql = "INSERT INTO `setting` (`id`,`adminuser`, `adminpassword`, `sshport`) VALUES (NULL,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(DB_USER, DB_PASS, PORT));

        $query = $this->db->prepare("select * from users");
        $query->execute();
        $queryCount = $query->fetchAll();
        foreach ($queryCount as $value) {
            // echo $value['username']."<br>";
            $tr=$value['username'];
            $stmt = $this->db->prepare("SELECT * FROM Traffic WHERE user=:user");
            $stmt->execute(['user' => $tr]);
            $user = $stmt->rowCount();
            if($user==0) {
                echo"ok";
                $sql1 = "INSERT INTO `Traffic` (`user`, `download`, `upload`, `total` ) VALUES (?,?,?,?)";
                $stmt1 = $this->db->prepare($sql1);
                $stmt1->execute(array($tr, '0', '0', '0'));
            }
        }

        $sql = "ALTER TABLE users ADD COLUMN finishdate_one_connect VARCHAR(100) AFTER finishdate;";
        $this->db->query($sql);
        $sql = "ALTER TABLE users ADD COLUMN customer_user VARCHAR(100) AFTER finishdate_one_connect;";
        $this->db->query($sql);
        $sql = "ALTER TABLE setting ADD COLUMN multiuser VARCHAR(100) AFTER credit;";
        $this->db->query($sql);
        $sql = "ALTER TABLE setting ADD COLUMN ststus_multiuser VARCHAR(100) AFTER multiuser;";
        $this->db->query($sql);
        $sql = "ALTER TABLE setting ADD COLUMN login_key VARCHAR(100) AFTER ststus_multiuser;";
        $this->db->query($sql);
        $sql = "ALTER TABLE setting ADD COLUMN dropb_port VARCHAR(100) AFTER login_key;";
        $this->db->query($sql);
        $sql = "ALTER TABLE setting ADD COLUMN dropb_tls_port VARCHAR(100) AFTER login_key;";
        $this->db->query($sql);
        $sql = "ALTER TABLE setting ADD COLUMN ssh_tls_port VARCHAR(100) AFTER dropb_tls_port;";
        $this->db->query($sql);
        $sql = "ALTER TABLE admins ADD COLUMN login_key VARCHAR(100) AFTER condition_u;";
        $this->db->query($sql);

        $sql = "UPDATE setting SET multiuser=? WHERE id=?";
        $this->db->prepare($sql)->execute(['on', '1']);

        echo "success";
    }
}
