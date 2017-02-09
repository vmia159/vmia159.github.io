<?php
function do_html_header($title) { 
  // print an HTML header
?>
<html>
<head>
<title><?php echo $title;?></title>
<style> 
  body { font-family: Arial, Helvetica, sans-serif; font-size: 13px } 
  li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px } 
  hr { color: #3333cc; width=300px; text-align:left} 
  span {color: #cccccc}
  a { color: #000000 }
</style>
</head>
<body>
<img src="bookmark.gif" alt="PHPbookmark logo" border="0" 
     align="left" valign="bottom" height="55" width="57" />
<h1>PHPbookmark</h1>
<hr />
<?php 
  if($title) {
  do_html_heading($title);
}
}

?>

<?php
function display_site_info(){
?>
<html>
<body>
<ul>
  <li>Store your bookmarks online with us!</li>
  <li>See what other users use!</li>
  <li>Share your favorite links with others!</li>
  </ul>
  <p><a href="register_form.php">Not a member?</a></p>
   </body>
  </html>
  <?php
}
?>

<?php
function display_login_form() {
?>
<html>
<body>
<form method="post" action="member.php">
  <table bgcolor="#cccccc">
   <tr>
     <td colspan="2">Members log in here:</td>
   <tr>
     <td>Username:</td>
     <td><input type="text" name="username"/></td></tr>
   <tr>
     <td>Password:</td>
     <td><input type="password" name="passwd"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="Log in"/></td></tr>
   <tr>
     <td colspan="2"><a href="forgot_form.php">Forgot your password?</a></td>
   </tr>
 </table></form>
 <?php
} 
?>

<?php
function do_html_footer(){
?>
</body>
</html>
<?php
}
?>

<?php
function display_registration_form(){
?>
<html>
<body>
  <h2>User Registration</h2>
 <form method="post" action="register_new.php">
 <table bgcolor="#cccccc">
   <tr>
     <td>Email address:</td>
     <td><input type="text" name="email" size="30" maxlength="100"/></td></tr>
   <tr>
     <td>Preferred username <br />(max 16 chars):</td>
     <td valign="top"><input type="text" name="username"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>Password <br />(between 6 and 16 chars):</td>
     <td valign="top"><input type="password" name="passwd"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>Confirm password:</td>
     <td><input type="password" name="passwd2" size="16" maxlength="16"/></td></tr>
   <tr>
     <td colspan=2 align="center">
     <input type="submit" value="Register"></td></tr>
 </table></form>

<?php
}
?>

<?php 
function do_html_heading($title){
?>
<html><h2><?php echo $title?></h2>
<?php
}
?>

<?php
function do_html_url($directpage,$text){
?>
<html>
<br>
<a href="<?php echo $directpage?>"><?php echo $text?></a>
<?php
}
?>

<?php
function display_user_urls($username){
  $urlarray= get_user_urls($username);
  $length= count($urlarray);
  
  if($length>0)
  {
	  ?>
	  <form name="bm_table" action="delete_bms.php" method="post">
	  <table width="300" cellpadding="2" cellspacing="0">
	  <tbody>
	  <tr bgcolor="#cccccc">
	  <td>
	  <strong>Bookmark</strong>
	  </td>
	  <td>
	  <strong>Delete?</strong>
	  </td>
	  </tr>
	  <?php
	  for($i=0;$i<$length;$i++)
	  {
		if($i % 2 == 0)
		{
		$color="#ffffff";
		$url=$urlarray[$i+1];
		echo "<tr bgcolor=\"".$color."\">
		<td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td>
		<td><input type=\"checkbox\" name=\"del_me[]\" value=\"".$url."\"/></td> 
		</tr>";
		}
		else
		{
		$color="#cccccc";
		$url=$urlarray[$i+1];
		echo "<tr bgcolor=\"".$color."\">
		<td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td>
		<td><input type=\"checkbox\" name=\"del_me[]\" value=\"".$url."\"/></td> 
		</tr>";
		}
	    
	  }
	  ?>
	  </tbody>
	  </table>
	  </form>
	  
	  <?php
  }
}
?>

<?php
function display_user_menu($username){
  ?>
  <hr>
  <a href="member.php">Home</a>
  &nbsp; | &nbsp;
  <a href="add_bm_form.php">Add BM</a>
  &nbsp; | &nbsp;
  <?php
  if(count(get_user_urls($username))==0)
  {
	  ?>
	  <span>Delete BM</span>
	  <?php
  }
  else
  {
	  ?>
	  <a href="#" onclick="bm_table.submit();">Delete BM</a>
	  <?php
  }
  ?>
  &nbsp; | &nbsp;
  <a href="change_passwd_form.php">Change password</a>
  <br>
  <a href="recommend.php">Recommend URLs to me</a>
  &nbsp; | &nbsp;
  <a href="logout.php">Logout</a>
  <hr>  
  <?php
}
?>

<?php
function display_changepw_form(){
	?>
	
<form action="change_passwd.php" method="post">
  <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
  <tbody>
   <tr>
    <td>Old password:</td>
	<td>
		<input type="password" name="old_passwd" size="16" maxlength="16">
	</td>
   </tr>
   <tr>
    <td>New password:</td>
	<td>
		<input type="password" name="new_passwd" size="16" maxlength="16">
	</td>
   </tr>
   <tr>
    <td>Repeat new password:</td>
	<td>
		<input type="password" name="new_passwd2" size="16" maxlength="16">
	</td>
   </tr>
   <tr>
	<td colspan="2 align="center">
		<input type="submit" value="Change password">
	</td>
	</tr>
   </tbody>
 </table></form>
 <?php
}
?>

<?php
function display_resetpw_form(){
	?>
	<form action="forgot_passwd.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Enter your username</td>
       <td><input type="text" name="username" size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan=2 align="center">
       <input type="submit" value="Change password"/>
   </td></tr>
   </table>
	<?php
}
?>

<?php 
function display_addbm_form(){
	?>
	<form name="bm_table" action="add_bms.php" method="post">
	<table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
	<tr><td>New BM:</td>
	<td><input type="text" name="new_url" value="http://"
     size="30" maxlength="255"/></td></tr>
	<tr><td colspan="2" align="center">
    <input type="submit" value="Add bookmark"/></td></tr>
	</table>
	</form>
<?php
}
?>
