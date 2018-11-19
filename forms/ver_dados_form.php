<fieldset>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> Dados Completo</h3>
            </div>
            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				<div id="load_img">
					<img class="img-responsive" src="fotos/<?php echo $edit ? $vacinas['photo'] : ''; ?>" alt="Logo">
					
				</div>
				<br>				
					<div class="row">
  						<div class="col-md-12">
							<div class="form-group">
								<input class='filestyle' data-buttonText="Logo" type="file" name="photo" id="photo">
							</div>
						</div>
						
					</div>
				</div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Nome Completo:</td>
                        <td><input type="text" class="form-control input-sm" name="nome" value="<?php echo $edit ? $vacinas['nome'] : ''; ?>" required></td>
                      </tr>
					  <tr>
                        <td class='col-md-3'>Nome do Pai:</td>
                        <td><input type="text" class="form-control input-sm" name="pai" value="<?php echo $edit ? $vacinas['pai'] : ''; ?>" required></td>
                      </tr>
					  <tr>
                        <td class='col-md-3'>Nome da Mãe:</td>
                        <td><input type="text" class="form-control input-sm" name="mae" value="<?php echo $edit ? $vacinas['mae'] : ''; ?>" required></td>
                      </tr>
					  	     <tr>
                        <td class='col-md-3'>Data de Nascimento:</td>
                        <td><input type="text" class="form-control input-sm" name="dataNascimento" value="<?php echo $edit ? $vacinas['dataNascimento'] : ''; ?>" required></td>
                      </tr>
                      <tr>
                        <td>Telemóvel:</td>
                        <td><input type="text" class="form-control input-sm" name="telefone" value="<?php echo $edit ? $vacinas['telefone'] : ''; ?>" required></td>
                      </tr>
					  <tr>
                        <td>Provincia:</td>
                        <td><input type="text" class="form-control input-sm" name="provincia" value="<?php echo $edit ? $vacinas['provincia'] : ''; ?>" required></td>
                      </tr>
					  <tr>
                        <td>Município:</td>
                        <td><input type="text" class="form-control input-sm" name="municipio" value="<?php echo $edit ? $vacinas['municipio'] : ''; ?>"></td>
                      </tr>
					  <tr>
                        <td>Bairro:</td>
                        <td><input type="text" class="form-control input-sm" name="bairro" value="<?php echo $edit ? $vacinas['bairro'] : ''; ?>"></td>
                      </tr>
				                  
                        
                     
                    </tbody>
                  </table>
                  
                  
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
              </div>
            </div>
                 <div class="panel-footer text-center">                 
                 </div>
               
          </div>
        </div>
</fieldset>
<script type="text/javascript" src="./js/bootstrap-filestyle.js"> </script>