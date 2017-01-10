
    <form action="Fornecedor_material/update_action" method="post">
	    <div class="form-group">
            <label for="int">Fornecedor Id <?php echo form_error('fornecedor_id') ?></label>
            <input type="text" class="form-control" name="fornecedor_id" id="fornecedor_id" placeholder="Fornecedor Id" value="<?php echo $fornecedor_material->fornecedor_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Grupo Material Obra Id <?php echo form_error('grupo_material_obra_id') ?></label>
            <input type="text" class="form-control" name="grupo_material_obra_id" id="grupo_material_obra_id" placeholder="Grupo Material Obra Id" value="<?php echo $fornecedor_material->grupo_material_obra_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Obra Id <?php echo form_error('obra_id') ?></label>
            <input type="text" class="form-control" name="obra_id" id="obra_id" placeholder="Obra Id" value="<?php echo $fornecedor_material->obra_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $fornecedor_material->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('fornecedor_material') ?>" class="btn btn-default">Cancelar</a>
	</form>


