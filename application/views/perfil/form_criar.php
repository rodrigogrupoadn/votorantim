
    <form action="Perfil/create_action" method="post">
	    <div class="form-group">
            <label for="varchar">Descricao <?php echo form_error('descricao') ?></label>
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descricao" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo"  />
        </div>
	    <div class="form-group">
            <label for="int">Empresa Id <?php echo form_error('empresa_id') ?></label>
            <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $perfil->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('perfil') ?>" class="btn btn-default">Cancelar</a>
	</form>

