<?php
require_once('bookmark_fns.php'); 
session_start();
do_html_header('Recommending URLs'); 
check_valid_user();
echo "Could not find any bookmarks to recommend.";
// give menu of options
display_user_menu($_SESSION['valid_user']);
do_html_footer(); 
?>
