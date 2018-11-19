<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

//Get current page.
$page = filter_input(INPUT_GET, 'page');

//Per page limit for pagination.
$pagelimit = 10;

if (!$page) {
    $page = 1;
}

// If filter types are not selected we show latest created data first
if (!$filter_col) {
    $filter_col = "data_cadastro";
}
if (!$order_by) {
    $order_by = "Desc";
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('idPessoa', 'nome', 'pai', 'mae', 'dataNascimento','telefone','provincia','municipio','bairro','data_cadastro','photo');

//Start building query according to input parameters.
// If search string
if ($search_string) 
{
    $db->where('idPessoa', '%' . $search_string . '%', 'like');

    $db->orwhere('nome', '%' . $search_string . '%', 'like');
}


//If order by option selected
if ($order_by)
{
    $db->orderBy($filter_col, $order_by);
}

//Set pagination limit
$db->pageLimit = $pagelimit;

//Get result of the query.
$pessoas = $db->arraybuilder()->paginate("pessoa", $page, $select);
$total_pages = $db->totalPages;

// get columns for order filter
foreach ($pessoas as $value) {
    foreach ($value as $col_name => $col_value) {
        $filter_options[$col_name] = $col_name;
    }
    //execute only once
    break;
}
include_once 'includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header"><i class='glyphicon glyphicon-search'></i> Buscar </h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            <a href="add_pessoa.php?operation=create">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Novo  </button>
	            </a>
            </div>
        </div>
    </div>
        <?php include('./includes/flash_messages.php') ?>
    <!--    Begin filter section-->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Pesquisar</label>
            <input type="text" class="form-control" id="input_search" name="search_string"  placeholder="Código ou Nome" value="<?php echo $search_string; ?>">
            <label for ="input_order">Ordenar por</label>
            <select name="filter_col" class="form-control">

                <?php
                foreach ($filter_options as $option) {
                    ($filter_col === $option) ? $selected = "selected" : $selected = "";
                    echo ' <option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                ?>

            </select>

            <select name="order_by" class="form-control" id="input_order">

                <option value="Asc" <?php
                if ($order_by == 'Asc') {
                    echo "selected";
                }
                ?> >Asc</option>
                <option value="Desc" <?php
                if ($order_by == 'Desc') {
                    echo "selected";
                }
                ?>>Desc</option>
            </select>
			<button type="submit" value="Buscar" class="btn btn-default"><span class="glyphicon glyphicon-search" ></span> Buscar</button>
        </form>
    </div>
<!--   Filter section end-->

    <hr>


    <table class="table">
        <thead>
            <tr class="info">

                <th>Código</th>
                <th>Nome Completo</th>
				<th>Nome do Pai</th>
			    <th>Nome da Mãe</th>
				<th>Data Nascimento</th>
                <th class='text-right'>Telemóvel</th>
   				<th class='text-center'>Provincia</th>
                <th class='text-center'>Muninicipio</th>
				<th class='text-center'>Bairro</th>
				<th class='text-center'>Data Cadastro</th>
				<th>Imagem</th>
				<th class='text-center'>Acção</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoas as $row) : ?>
                <tr>				
	                <td><?php echo $row['idPessoa'] ?></td>
	                <td><?php echo htmlspecialchars($row['nome']) ?></td>
					 <td><?php echo htmlspecialchars($row['pai']) ?></td>
					  <td><?php echo htmlspecialchars($row['mae']) ?></td>
					   <td><?php echo htmlspecialchars($row['dataNascimento']) ?></td>
					    <td><?php echo htmlspecialchars($row['telefone']) ?></td>
						 <td><?php echo htmlspecialchars($row['provincia']) ?></td>
						  <td><?php echo htmlspecialchars($row['municipio']) ?></td>
						   <td><?php echo htmlspecialchars($row['bairro']) ?></td>
			         <td><?php echo htmlspecialchars($row['data_cadastro']) ?></td>
							
					<td><img width="50px" height="30px" src="fotos/<?php echo $row['photo']; ?>" alt="Logo"></td>
					
	                <td><span class="pull-right">
					<a href="edit_pessoa.php?pessoas_id=<?php echo $row['idPessoa'] ?>&operation=edit" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>
					<a href="add_vacina.php?vacinas_id=<?php echo $row['idPessoa'] ?>&operation=edit" class="btn btn-success" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>

					<a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['idPessoa'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
				</tr>

						<!-- Delete Confirmation Modal-->
					 <div class="modal fade" id="confirm-delete-<?php echo $row['idPessoa'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_pessoa.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirm</h4>
						        </div>
						        <div class="modal-body">
						      
						        		<input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['idPessoa'] ?>">
						        	
						          <p>Are you sure you want to delete this customer?</p>
						        </div>
						        <div class="modal-footer">
						        	<button type="submit" class="btn btn-default pull-left">Yes</button>
						         	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						        </div>
						      </div>
					      </form>
					      
					    </div>
  					</div>
            <?php endforeach; ?>      
        </tbody>
    </table>


   
<!--    Pagination links-->
    <div class="text-center">

        <?php
        if (!empty($_GET)) {
            //we must unset $_GET[page] if previously built by http_build_query function
            unset($_GET['page']);
            //to keep the query sting parameters intact while navigating to next/prev page,
            $http_query = "?" . http_build_query($_GET);
        } else {
            $http_query = "?";
        }
        //Show pagination links
        if ($total_pages > 1) {
            echo '<ul class="pagination text-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                ($page == $i) ? $li_class = ' class="active"' : $li_class = "";
                echo '<li' . $li_class . '><a href="pessoa.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <!--    Pagination links end-->

</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>

