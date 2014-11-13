<?php
require_once('include/config.php');
require_once('include/functions.php');

/* Check to see if the form was submitted from installed domain */

$domain=$_SERVER['HTTP_HOST'];
$uri = parse_url($_SERVER['HTTP_REFERER']);
$r_domain = substr($uri['host'],strpos($uri['host'],"."),strlen($uri['host']));

if ($domain == $r_domain){

              /* open the connection to database */
             $link = f_sqlConnect(DB_USER,DB_PASSWORD,DB_NAME);
            
			  /* Prevent SQL injection attacks */
              $_POST =f_clean($_POST);


            $value1 = $_POST ['input1'];
			$value2 = $_POST ['input2'];
			
			$sql = "INSERT INTO demo (input1,input2) VALUES ('$value1','$value2')";
			 
			 if (!mysql_query($sql)) {
			 die ('Error: ' .mysql_error());
			 }
			 else{
			 echo 'Form submitted sucessfully';
			 }
			
			mysql_close();
	}
?>