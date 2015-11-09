<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_php_mysql = "localhost";
$database_php_mysql = "facturas";
$username_php_mysql = "root";
$password_php_mysql = "1234";
$php_mysql = mysql_pconnect($hostname_php_mysql, $username_php_mysql, $password_php_mysql) or trigger_error(mysql_error(),E_USER_ERROR); 
?>