<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "Você não tem permissão para efectuar esta operação !";
    	header('location: pessoa.php');
        exit;

	}
    $pessoas_id = $del_id;

    $db = getDbInstance();
    $db->where('IdPessoa', $pessoas_id);
    $status = $db->delete('pessoa');
    
    if ($status) 
    {
        $_SESSION['info'] = "Registro Eliminado com Sucesso!";
        header('location: pessoa.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Não é possivél Eliminar este registro";
    	header('location: pessoa.php');
        exit;

    }
    
}