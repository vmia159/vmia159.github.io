<?php
require_once('bookmark_fns.php');
session_start();
do_html_header("Changing password");
check_valid_user();
display_changepw_form();
display_user_menu($_SESSION['valid_user']);
?>