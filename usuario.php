<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

$nomeEmpresa = $_SESSION["nome_empresa"];
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
$select = array('id_usuario', 'primeiro_nome', 'ultimo_nome', 'user_name', 'email_usuario', 'data_cadastro','logo_url','id_fk_empresa');

//Start building query according to input parameters.
// If search string
if ($search_string) 
{
    $db->where('primeiro_nome', '%' . $search_string . '%', 'like');
	$db->where('id_fk_empresa',$nomeEmpresa, '=');
    $db->orwhere('ultimo_nome', '%' . $search_string . '%', 'like');
}

if ($nomeEmpresa) 
{

    $db->where('id_fk_empresa',$nomeEmpresa, '=');

}

//If order by option selected
if ($order_by)
{
    $db->orderBy($filter_col, $order_by);
}

//Set pagination limit
$db->pageLimit = $pagelimit;

//Get result of the query.
$usuario = $db->arraybuilder()->paginate("usuario", $page, $select);
$total_pages = $db->totalPages;

// get columns for order filter
foreach ($usuario as $value) {
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
            <h1 class="page-header"><i class='glyphicon glyphicon-search'></i> Buscar Usuário</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            <a href="add_usuario.php?operation=create">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Novo Usuário </button>
	            </a>
            </div>
        </div>
    </div>
        <?php include('./includes/flash_messages.php') ?>
    <!--    Begin filter section-->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Pesquisar</label>
            <input type="text" class="form-control" id="input_search" name="search_string"  placeholder="Nome" value="<?php echo $search_string; ?>">
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

                <th>Nome</th>
                <th>Usuário</th>
				<th>E-mail</th>
				<th>Data Cadastro</th>
				<th class='text-center'>Acção</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $row) : ?>
                <tr>
					<td><?php echo htmlspecialchars($row['primeiro_nome']." ".$row['ultimo_nome']); ?></td>				
	                <td><?php echo htmlspecialchars($row['user_name']) ?></td>
	                <td><?php echo htmlspecialchars($row['email_usuario']) ?> </td>
					<td><?php echo htmlspecialchars($row['data_cadastro']) ?></td>			
	                <td><span class="pull-right">
					<a href="edit_usuario.php?usuario_id=<?php echo $row['id_usuario'] ?>&operation=edit" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>

					<a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['id_usuario'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
				</tr>

						<!-- Delete Confirmation Modal-->
					 <div class="modal fade" id="confirm-delete-<?php echo $row['id_usuario'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_usuario.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirm</h4>
						        </div>
						        <div class="modal-body">
						      
						        		<input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['id_usuario'] ?>">
						        	
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
                echo '<li' . $li_class . '><a href="usuario.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <!--    Pagination links end-->

</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>

