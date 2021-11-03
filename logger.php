<?php
    session_start();
    function getIP() { if (isset($_SERVER)) { if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { $realip = $_SERVER['HTTP_X_FORWARDED_FOR']; } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) { $realip = $_SERVER['HTTP_CLIENT_IP']; } else { $realip = $_SERVER['REMOTE_ADDR']; } } else { if (getenv("HTTP_X_FORWARDED_FOR")) { $realip = getenv( "HTTP_X_FORWARDED_FOR"); } elseif (getenv("HTTP_CLIENT_IP")) { $realip = getenv("HTTP_CLIENT_IP"); } else { $realip = getenv("REMOTE_ADDR"); } } return $realip; }

    $ips = fopen("./log.txt", "a+");
    $ip = getIP();
    
    $log = date("D, H:i:s ") . $_SESSION['Username'].', '.$ip.PHP_EOL;
    fwrite($ips, $log);
    fclose($ips);
?>
