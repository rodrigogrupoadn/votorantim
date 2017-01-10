
    <form action="Classificacao/create_action" method="post">
	    <div class="form-group">
            <label for="varchar">Classificacao <?php echo form_error('classificacao') ?></label>
            <input type="text" class="form-control" name="classificacao" id="classificacao" placeholder="Classificacao" />
        </div>
	    <div class="form-group">
            <label for="int">Usuario Id <?php echo form_error('usuario_id') ?></label>
            <input type="text" class="form-control" name="usuario_id" id="usuario_id" placeholder="Usuario Id" />
        </div>
	    <div class="form-group">
            <label for="int">Fornecedor Id <?php echo form_error('fornecedor_id') ?></label>
            <input type="text" class="form-control" name="fornecedor_id" id="fornecedor_id" placeholder="Fornecedor Id"  />
        </div>
	    <input type="hidden" name="id" value="<?php echo $classificacao->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('classificacao') ?>" class="btn btn-default">Cancel</a>
	</form>
	

