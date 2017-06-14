<?php

if(isset($_POST['btnOK']))
{
   	$dbhost = 'sql110.0fees.net:3306';
	$dbuser = 'fees0_5382574';
	$dbpass = 'yuhaiweb';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');

	$dbname = 'fees0_5372353_default';
	mysql_select_db($dbname);


   $name    = trim($_POST['name']);
   $email   = trim($_POST['email']);
   $url     = trim($_POST['url']);
   $message = trim($_POST['message']);

   if(!get_magic_quotes_gpc())
   {
      $message = addslashes($message);
   }


   // if the visitor do not enter the url
   // set $url to an empty string
   if ($url == 'http://')
   {
      $url = '';
   }

   $query = "INSERT INTO guestbook (name,
                                    email,
                                    url,
                                    message,
                                    entry_date)
             VALUES ('$name',
                     '$email',
                     '$url',
                     '$message',
                     current_date)";

   mysql_query($query) or die('Error, query failed');

   header('Location: ' . $_SERVER['REQUEST_URI']);
   echo $_SERVER['REQUEST_URI'];
   
   exit;
}
?>
