<fieldset>


    <div class="form-group">
        <label for="nome">Nome *</label>
        <input type="text" name="nome" value="<?php echo $edit ? $pessoas['nome'] : ''; ?>" placeholder="Nome do Produto" class="form-control" required="required" id="nome">
    </div>
	<div class="form-group">
        <label for="pai">Nome do Pai *</label>
        <input type="text" name="pai" value="<?php echo $edit ? $pessoas['pai'] : ''; ?>" placeholder="Nome do Produto" class="form-control" required="required" id="pai">
    </div>
	<div class="form-group">
        <label for="mae">Nome da Mãe *</label>
        <input type="text" name="mae" value="<?php echo $edit ? $pessoas['mae'] : ''; ?>" placeholder="Nome do Produto" class="form-control" required="required" id="mae">
    </div>
	  <div class="form-group">
        <label>Data de Nascimento</label>
        <input name="dataNascimento" value="<?php echo $edit ? $pessoas['dataNascimento'] : ''; ?>"  placeholder="Data Inicio da Promoção" class="form-control"  type="date">
    </div>
		  <div class="form-group">
        <label>Telemóvel</label>
        <input name="telefone" value="<?php echo $edit ? $pessoas['telefone'] : ''; ?>"  placeholder="Telemóvel" class="form-control"  type="text">
    </div>
	
	
		  <div class="form-group">
        <label>Provícia</label>
        <input name="provincia" value="<?php echo $edit ? $pessoas['provincia'] : ''; ?>"  placeholder="provincia" class="form-control"  type="text">
    </div>
	
	
		  <div class="form-group">
        <label>Municipio</label>
        <input name="municipio" value="<?php echo $edit ? $pessoas['municipio'] : ''; ?>"  placeholder="municipio" class="form-control"  type="text">
    </div>
	
	 <div class="form-group">
        <label>Bairro</label>
        <input name="bairro" value="<?php echo $edit ? $pessoas['bairro'] : ''; ?>"  placeholder="bairro" class="form-control"  type="text">
    </div>    	
    
  <div class="form-group">
        <label for="imagefile">Imagem</label>
            <input  class='filestyle' data-buttonText=" Imagem do pessoas" type="file" name="photo" value="<?php echo $edit ? $pessoas['photo'] : ''; ?>" id="photo">
    </div>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
<script type="text/javascript" src="./js/bootstrap-filestyle.js"> </script>