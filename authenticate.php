<?php 
require_once './config/config.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $username = filter_input(INPUT_POST, 'username');
    $passwd = filter_input(INPUT_POST, 'passwd');
    $remember = filter_input(INPUT_POST, 'remember');
    $passwd=  md5($passwd);
   	
    //Get DB instance. function is defined in config.php
    $db = getDbInstance();

    $db->where ("user_name", $username);
    $db->where ("passwd", $passwd);
    $row = $db->get('usuario');
     
    if ($db->count >= 1) {
        $_SESSION['user_logged_in'] = TRUE;
        $_SESSION['admin_type'] = $row[0]['admin_type'];
		$_SESSION['nome_usuario'] = $row[0]['user_name'];
		$_SESSION['nome_empresa'] = $row[0]['id_fk_empresa'];
       	if($remember)
       	{
       		setcookie('username',$username , time() + (86400 * 90), "/");
       		setcookie('password',$passwd , time() + (86400 * 90), "/");
       	}
        header('Location:index.php');
        exit;
    } else {
        $_SESSION['login_failure'] = "Invalid user name or password";
        header('Location:login.php');
        exit;
    }
  
}