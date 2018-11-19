<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$empresa_id = filter_input(INPUT_GET, 'empresa_id', FILTER_SANITIZE_STRING);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
 $db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	
	    //Get customer id form query string parameter.
    $empresa_id = filter_input(INPUT_GET, 'empresa_id', FILTER_SANITIZE_STRING);

	$foto = $_FILES['logo_url'];
	
	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		// Largura máxima em pixels
		$largura = 3000;
		// Altura máxima em pixels
		$altura = 3000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 9000000000;
 
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco

		    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
			
			    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    
   // $data_to_update['updated_at'] = date('Y-m-d H:i:s');
	$data_to_update['logo_url'] =$nome_imagem;
    $db = getDbInstance();
    $db->where('id_empresa',$empresa_id);
    $stat = $db->update('empresa', $data_to_update);
	
	
	   if($stat)
    {
        $_SESSION['success'] = $nome_imagem;
        //Redirect to the listing page,
        header('location: empresa.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    } 
		
	
	
		}
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
	}

     
}

//If edit variable is set, we are performing the update operation.
if($edit)
{
    $db->where('id_empresa', $empresa_id);
    //Get data to pre-populate the form.
    $empresas = $db->getOne("empresa");
}
?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header"><i class='glyphicon glyphicon-edit'></i> Editar Hospital</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/edit_empresa_form.php'); 
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>