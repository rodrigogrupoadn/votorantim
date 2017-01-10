
    <form action="Grupo_material/update_action" method="post">
	    <div class="form-group">
            <label for="varchar">Descricao <?php echo form_error('descricao') ?></label>
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descricao" value="<?php echo $grupo_material->descricao; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo" value="<?php echo $grupo_material->ativo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Empresa Id <?php echo form_error('empresa_id') ?></label>
            <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id" value="<?php echo $grupo_material->empresa_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $grupo_material->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('grupo_material') ?>" class="btn btn-default">Cancelar</a>
	</form>


