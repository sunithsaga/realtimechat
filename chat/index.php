<?php

define ('DBPATH','localhost');
define ('DBUSER','root');
define ('DBPASS','cabot1234');
define ('DBNAME','live_chat');

session_start();

global $dbh;
$dbh  = mysql_connect(DBPATH,DBUSER,DBPASS);
$dbSl = mysql_selectdb(DBNAME,$dbh);

if(isset($_POST['submit']))
{
   
    $Selct_qry = mysql_query("select * from user where username='".$_POST['username']."' and password='".md5($_POST['password'])."'");
    echo mysql_num_rows($Selct_qry);
    if(mysql_num_rows($Selct_qry)>0)
    {
      $Selct_arr = mysql_fetch_array($Selct_qry);

      $update = mysql_query("update user set loggedin='1' where username='".$Selct_arr['username']."'");
      $_SESSION['username'] = $Selct_arr['username'];
        header("location:chatting.php"); // Must be already set 
    }
    
  
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd" >

<html>
<head>
<title>Sample Chat Application</title>
<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
}
</style>

<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

</head>
<body>
<form method="post" name="loginId" id="loginID" >
<div id="main_container">


<input type="text" name="username" id="username"><br>
<input type="password" name="password" id="password"><br>
<input type="submit" name="submit" id="submit" value="Submit">

</div>
</form>

</body>
</html>