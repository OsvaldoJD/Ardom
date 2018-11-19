<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sistema de Gestão de Vacina</title>

        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="css/bootstrap.min.css"/>

        <!-- MetisMenu CSS não-->
        <link href="js/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts icones -->
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file://  *198*codigo*numero#-->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/jquery.min.js" type="text/javascript"></script> 

    </head>

    <body>

        <div id="wrapper"   style="background-color:#ffffff">

            <!-- Navigation -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true ) : ?>
                <nav class="navbar navbar-default-bg navbar-static-top" role="navigation" style="background-color:#383838" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href=""  style="color:#ffffff">SGV - Sistema de Gestão de Vacina</a>
                    </div>
                    <!-- /.navbar-header -->

                    <ul class="nav navbar-top-links navbar-right">
                        <!-- /.dropdown -->
				<?php
				
					$nomeUser = $_SESSION["nome_usuario"];
				?>
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color:#B81D22">
                                <i class="fa fa-user fa-fw"></i><b style="color:#ffffff">Usuário : <?php echo $nomeUser;?></b> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user" >
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil do Usuário</a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuração</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->

                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse" style="background-color:#ffffff">
                            <ul class="nav" id="side-menu">
                                <li>
                                    <a href="index.php" style="color:#000000"><i class="fa fa-dashboard fa-fw" ></i> Dashboard</a>
                                </li>
								<li <?php echo (CURRENT_PAGE =="pessoa.php" || CURRENT_PAGE=="add_pessoa.php") ? 'class="active"' : '' ; ?>>
                                    <a href="#" style="color:#000000"><i class="fa fa-archive"></i> Gerir vacinas<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                            		<li>
                                        <a href="pessoa.php" style="color:#000000"><i class="fa fa-list fa-fw"></i> Criança</a>
                                    </li>
									<li>
                                        <a href="#" style="color:#000000"><i class="fa fa-list fa-fw"></i> Vacina </a>
                                    </li>
									
									
                                    </ul>
                                </li>
								
								<li <?php echo (CURRENT_PAGE =="empresa.php" || CURRENT_PAGE=="add_empresa.php") ? 'class="active"' : '' ; ?>>
                                    <a href="#" style="color:#000000"><i class="glyphicon glyphicon-cog"></i> Configuração<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                       
										 <li>
                                            <a href="#" style="color:#000000"><i class="fa fa-archive"></i> Dose </a>
                                        </li>
										 <li>
                                            <a href="empresa.php" style="color:#000000"><i class="fa fa-handshake-o"></i> Hospital</a>
                                        </li>
										 <li>
                                            <a href="#" style="color:#000000"><i class="fa fa-archive"></i> Tipo de Vacinas </a>
                                        </li>
									<li>
                                        <a href="usuario.php" style="color:#000000"><i class="fa fa-user-circle fa-fw"></i> Utilizadores</a>
                                    </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>
            <?php endif; ?>
            <!-- The End of the Header -->