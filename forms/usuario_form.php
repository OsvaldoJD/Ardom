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
                        <td class='col-md-3'>Primeiro Nome:</td>
                        <td><input type="text" class="form-control input-sm" name="primeiro_nome" placeholder="Primeiro Nome" value="<?php echo $edit ? $usuarios['primeiro_nome'] : ''; ?>"  required></td>
                      </tr>
					  <tr>
                        <td class='col-md-3'>Ultimo Nome:</td>
                        <td><input type="text" class="form-control input-sm" name="ultimo_nome" placeholder="Ultimo Nome" value="<?php echo $edit ? $usuarios['ultimo_nome'] : ''; ?>" required></td>
                      </tr>
					  <tr>
                        <td class='col-md-3'>Usuário:</td>
                        <td><input type="text" class="form-control input-sm" name="user_name" placeholder="Usuário" value="<?php echo $edit ? $usuarios['user_name'] : ''; ?>" pattern="[a-zA-Z0-9]{2,64}" required></td>
                      </tr>
					  <tr>
                        <td class='col-md-3'>Senha:</td>
                        <td><input type="password" class="form-control input-sm" name="passwd"placeholder="********"   pattern=".{6,}" title="Senha ( min . 6 caracteres)" required></td>
                      </tr>
                      <tr>
                        <td>Correio Electrónico:</td>
                        <td><input type="email" class="form-control input-sm" name="email_usuario" placeholder="Correio electrónico" value="<?php echo $edit ? $usuarios['email_usuario'] : ''; ?>" ></td>
                      </tr>
					  <tr>
                        <td>Foto:</td>
                        <td><input type="file" class='filestyle' data-buttonText="Logo" name="logo_url" value="<?php echo $edit ? $usuarios['logo_url'] : ''; ?>"></td>
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