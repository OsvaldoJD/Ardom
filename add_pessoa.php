<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';


//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$foto = $_FILES['photo'];
	
	
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

    $data_to_store = filter_input_array(INPUT_POST);
    //Insert timestamp
	$data_to_store['data_cadastro'] = date('Y-m-d H:i:s');
    $data_to_store['photo'] =$nome_imagem;
    $db = getDbInstance();
    $last_id = $db->insert ('pessoa', $data_to_store);
    
		if($last_id)
    {
    	$_SESSION['success'] = $nome_imagem;
    	header('location: pessoa.php');
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

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;

require_once 'includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header"><i class='glyphicon glyphicon-edit'></i> Novo</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="produto_form" enctype="multipart/form-data">
       <?php  include_once('./forms/pessoa_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#produto_form").validate({
       rules: {
            f_name: {
                required: true,
                minlength: 3
            },
            l_name: {
                required: true,
                minlength: 3
            },   
        }
    });
});
</script>

<?php include_once 'includes/footer.php'; ?>