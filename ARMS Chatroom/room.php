<?php
session_start();

//echo $_POST['Username'];
$_SESSION['Username']=$_POST['Username'];
?>

<html style="background-color:#202020;">

<head>
<title>ARMS Chatroom</title>
</head>

</head>

<FRAMESET cols="200,*">
    <FRAME src="sidebar.php">
    <FRAMESET rows="*,45">
        <FRAME src="messages.php">
        <FRAME src="newmessage.php">
    </FRAMESET>
</FRAMESET>

</html>



