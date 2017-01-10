
    <form action="Fase_obra/update_action" method="post">
	    <div class="form-group">
            <label for="varchar">Descricao <?php echo form_error('descricao') ?></label>
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descricao" value="<?php echo $fase_obra->descricao; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo" value="<?php echo $fase_obra->ativo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Empresa Id <?php echo form_error('empresa_id') ?></label>
            <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id" value="<?php echo $fase_obra->empresa_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $fase_obra->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('fase_obra') ?>" class="btn btn-default">Cancelar</a>
	</form>


