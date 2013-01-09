<?php

define ('DBPATH','localhost');
define ('DBUSER','root');
define ('DBPASS','cabot1234');
define ('DBNAME','live_chat');

session_start();

global $dbh;
$dbh  = mysql_connect(DBPATH,DBUSER,DBPASS);
$dbSl = mysql_selectdb(DBNAME,$dbh);
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
<link href="style/gemoticons.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery.gemoticons.js"></script>
<script type="text/javascript" src="js/chat.js"></script>


	<script type="text/javascript">
/* jQuery(document).ready(function(){
	$(".chatboxmessagecontent").gemoticon();
	alert($(".chatboxmessagecontent").html());

}); */
jQuery(document).ready(function(){
$('#main_container').live('mousemove', function() {
	$(".chatboxmessagecontent").gemoticon();
	}); 
$('#chatbox').live('keyup', function() {
	$(".chatboxmessagecontent").gemoticon();
	}); 
$(".chatboxmessagecontent").gemoticon();
});



</script>
</head>
<body>
<form type="post" name="loginId" id="loginID">
<div id="main_container">
<?php 
$select_user = mysql_query("select * from user");
if(mysql_num_rows($select_user)>0)
{
  while($select_arr = mysql_fetch_array($select_user))
  {
   if($select_arr['loggedin']==1)
   {
      $status = 'active.png';
   } 
   else 
   {
     $status = 'offline.png';
   }
   if($select_arr['username']!=$_SESSION['username'])  
   {
     
  ?>
    
 <a href="javascript:void(0)" onclick="return chatWith('<?php echo $select_arr['username'];?>')">Chat With <?php echo $select_arr['username'];?><img src="images/<?php echo $status;?>"></a><br>
    <?php
   } 
  }  
}

?>
  
 <!--<a href="javascript:void(0)" onclick="javascript:chatWith('preetha')">Chat With preetha</a>
<a href="javascript:void(0)" onclick="javascript:chatWith('sunith')">Chat With sunith</a>

 YOUR BODY HERE -->
 <span id="Sunith">:)</span>
</div>

</form>

</body>
</html>