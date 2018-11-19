<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


$db = getDbInstance();

// <div>Mobiliário - <?php echo $numMobiliario;>

 $nomeEmpresa = $_SESSION["nome_empresa"];
 $numCustomers = $db->getValue ("usuario where id_fk_empresa= $nomeEmpresa", "count(*)");
 $qtdPessoa = $db->getValue ("pessoa", "count(*)");
 $numDose = $db->getValue ("dose", "count(*)");

  $qtdHospital = $db->getValue ("empresa", "count(*)");



include_once('includes/header.php');
?>

<link rel="stylesheet" href="css/division.css">

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numCustomers; ?></div>
                            <div>Usuários</div>
                        </div>
                    </div>
                </div>
                <a href="customers.php">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
		 <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                 <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $qtdPessoa; ?></div>
                            <div>Criança </div>
                        </div>
                    </div>
                </div>
                <a href="produto.php">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
		
		
		 <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                            <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numDose; ?></div>
                            <div>Dose </div>
                        </div>
                    </div>
                </div>
                <a href="customers.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                   <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $qtdHospital; ?></div>
                            <div>Hospital</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
		<div class="division">
		</div>
        <div class="col-lg-6 col-md-24">
          <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

						<div class="col-lg-24">
                           <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3"></h4>
                                   
									
                                </div>
                            </div>
                        </div><!-- /# column -->

                        <div class="col-lg-24">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3"></h4>
                                    <canvas id="barChart"></canvas>
									
									
                                </div>
                            </div>
                        </div><!-- /# column -->

               

            </div><!-- .animated -->
        </div><!-- .content -->
        </div>
      
    </div>
	 <div class="col-lg-6 col-md-24">
          <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                        <div class="col-lg-24">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="mb-3"></h4>
                                   
                                </div>
                            </div>
                        </div><!-- /# column -->

                        <div class="col-lg-24">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3"></h4>
                                   <canvas id="sales-chart"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->
               

                 

            </div><!-- .animated -->
        </div><!-- .content -->
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">


            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

 <!--  Chart js -->
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/lib/chart-js/chartjs-init.js"></script>

<?php include_once('includes/footer.php'); ?>
