<fieldset>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> Registro de Vacina</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
					  <tr>
                        <td class='col-md-3'>Vacinar:</td>
                        <td>
			      <select class="form-control" id="listar_vacina" name="estado_producto" required>
					<option value="" selected>-- Selecciona Vacina --</option>
					<option value="Pólio">Pólio</option>
					<option value="Sarampo">Sarampo</option>
					<option value="BCG">BCG</option>
					<option value="Rotavírus">Rotavírus</option>

		          </select>
						</td>
                      </tr>
					  		  <tr>
                  <td class='col-md-3'>Dose:</td>
                   <td>
			      <select class="form-control" id="listar_vacina" name="estado_producto" required>
					<option value="" selected>-- Seleciona à Dose --</option>
					<option value="1">1º Dose</option>
					<option value="2">2º Dose</option>
					<option value="3">3º Dose</option>
					<option value="0">Dose Única</option>

		          </select>
						</td>
                      </tr>
					 				                  
                        
                     
                    </tbody>
                  </table>
                  
                  
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
              </div>
            </div>
                 <div class="panel-footer text-center">
                    
                     
                            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-send"></i>  Cadastrar</button>
                       
                       
                    </div>
               
          </div>
        </div>
</fieldset>
<script type="text/javascript" src="./js/bootstrap-filestyle.js"> </script>