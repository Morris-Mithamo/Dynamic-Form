<?php
//3:16pm 8/4/2018 Author:1110111111010010.0
$DB_HostName ='localhost';
$DB_UserName ='root';
$DB_Password ='';
$DB_Database ='email_development';
if($Connect = mysqli_connect($DB_HostName,$DB_UserName,$DB_Password,$DB_Database)){}else{die("<b>Connection Error </b>"."<i>".mysqli_connect_error()."</i>");}
 ?>
