<fieldset>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> Configuración</h3>
            </div>
            <div class="panel-body">
              <div class="row">
			  
                  <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Descição Categoria:</td>
                        <td><input type="text" class="form-control input-sm" name="descricao_categoria" placeholder="Categoria" value="<?php echo $edit ? $categorias['descricao'] : ''; ?>"  required></td>
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