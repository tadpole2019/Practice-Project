<?php
date_default_timezone_set("Asia/Taipei");
echo "目前的時間".date("Y-m-d H:i:s")."\n";
echo "明天的日期".date('Y-m-d', strtotime('+1 day'))."\n";
echo "昨天的日期".date('Y-m-d', strtotime('-1 day'))."\n";

$Date1 = date("Y-m-d");
$Date2 = "2024-5-10";

$time = strtotime($Date1)-strtotime($Date2);
$datetime = round($time/3600/24);
echo "今天與2024年5月10日相差".$datetime."天";
?>