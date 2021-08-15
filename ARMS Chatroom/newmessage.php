<?php
session_start();
echo "<body style='background-color: #202020'>";
echo "<word style='color: #FFFFFF'>";

echo "<html>";
echo "<head></head> <body>";
echo "<form action='newmessage.php', method='POST'>";
echo "<input type='text' name='message' style='background-color:#202020; color:#FFFFFF;' required minlength='1' maxlength='5000' size='125'/>";
echo "<input type='submit' name='Send' value='Send' style='background-color:#4a4a4a; color:#FFFFFF;'/>";
echo "</form>";
if (ISSET($_POST['message'])) {
date_default_timezone_set('America/New_York');

$cache_new = '[' . date('H:i:s') . ']' . ': ' . $_SESSION['Username'] . ": " . $_POST['message'] . "<br>";
$file = "log.txt";
$handle = fopen($file, "r+");
$len = strlen($cache_new);
$final_len = filesize($file) + $len;
$cache_old = fread($handle, $len);

rewind($handle);
$i = 1;
while (ftell($handle) < $final_len) {
  fwrite($handle, $cache_new);
  $cache_new = $cache_old;
  $cache_old = fread($handle, $len);
  fseek($handle, $i * $len);
  $i++;
}
}
echo "<form action='index.php', method='GET', target='_parent'>";
echo "<input type='submit' name='Logout', value='Log Out' style='background-color:#B00000; color:#FFFFFF; position:absolute; right:2%; bottom:35%;'/>";
echo "</form>";
echo "</body>";
echo "</html>";

?>