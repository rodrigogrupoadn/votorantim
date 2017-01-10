
    <form action="Fornecedor_material/create_action" method="post">
	    <div class="form-group">
            <label for="int">Fornecedor Id <?php echo form_error('fornecedor_id') ?></label>
            <input type="text" class="form-control" name="fornecedor_id" id="fornecedor_id" placeholder="Fornecedor Id" />
        </div>
	    <div class="form-group">
            <label for="int">Grupo Material Obra Id <?php echo form_error('grupo_material_obra_id') ?></label>
            <input type="text" class="form-control" name="grupo_material_obra_id" id="grupo_material_obra_id" placeholder="Grupo Material Obra Id" />
        </div>
	    <div class="form-group">
            <label for="int">Obra Id <?php echo form_error('obra_id') ?></label>
            <input type="text" class="form-control" name="obra_id" id="obra_id" placeholder="Obra Id"  />
        </div>
	   
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('grupo_material') ?>" class="btn btn-default">Cancelar</a>
	</form>


