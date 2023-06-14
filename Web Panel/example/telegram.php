<?php
include_once("../cp/Config/database.php");
include_once("../cp/Libs/jdf.php");

header("Content-Type: text/html; charset=utf-8");
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$setting = $conn->query("SELECT * FROM setting")->fetch();
$API = "https://api.telegram.org/bot" . $setting['tgtoken'] . "/";
$adminid = $setting['tgid'];

$update = json_decode(file_get_contents('php://input'), TRUE);
$chatID = $update["message"]["chat"]["id"];
$chatfirst_name = $update["message"]["chat"]["first_name"];
$chatlast_name = $update["message"]["chat"]["last_name"];
$chattext = $update["message"]["text"];
$newline = urlencode("\n");
file_get_contents($API . "sendChatAction?chat_id=" . $chatID . "&action=typing");


if (strpos($chattext, "/start") !== false) {
    $start_text='درود کاربر گرامی'.$newline.
        'جهت استعلام اکانت خود نام کاربری و کلمه عبور را به صورت زیر نوشته و ارسال کنید'.$newline.
        'username:password';
    file_get_contents($API . "sendMessage?chat_id=".$chatID."&text=".$start_text."&parse_mode=HTML");
}
else
{
    $explodetext=explode(':',$chattext);
    $username=$explodetext[0];
    $password=$explodetext[1];
    $check_user = $conn->query("SELECT * FROM users where username='$username' and password='$password'")->rowCount();
    if($check_user>0) {

        $user = $conn->query("select * from users,Traffic where users.username='$username' and Traffic.user='$username'")->fetch();
        if (1024 < $user["total"]) {
            $to = round($user["total"] / 1024, 2) . " گیگابایت";
        } else {
            $to = $user["total"] . " مگابایت";
        }
        $expdate=$user['finishdate'];
        $expdate=explode('-',$expdate);
        if($expdate[1]<10) {
            $m = $expdate[1];
        }else{
            $m=$expdate[1];
        }
        if($expdate[2]<10) {
            $d =$expdate[2];
        }else{
            $d=$expdate[2];
        }
        if(LANG=='fa-ir') {
            if (!empty($user['finishdate'])) {
                $finishdate = explode('-', $user['finishdate']);
                $finishdate = gregorian_to_jalali($finishdate[0], $finishdate[1], $finishdate[2]);
                if ($finishdate[2] >= 10) {
                    $finishday = $finishdate[2];
                } else {
                    $finishday = '0' . $finishdate[2];
                }
                if ($finishdate[1] >= 10) {
                    $finishmon = $finishdate[1];
                } else {
                    $finishmon = '0' . $finishdate[1];
                }
                $expdate = $finishday . '-' . $finishmon . '-' . $finishdate[0];
            } else {
                $expdate = '';
            }
        }
        else
        {
            $expdate=$expdate[0].'/'.$m.'/'.$d;
        }
        $message="نام کاربری: $username $newline کلمه عبور:$password $newline ترافیک مصرف شده: $to $newline انقضا: $expdate";
        file_get_contents($API . "sendMessage?chat_id=" . $chatID . "&text=".$message);
    }
    else{
        $message='نام کاربری و کلمه عبور صحیح نمی باشد';
        file_get_contents($API . "sendMessage?chat_id=" . $chatID . "&text=".$message);

    }
    //end


}
?>