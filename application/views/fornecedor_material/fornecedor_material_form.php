<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Fornecedor_material <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Fornecedor Id <?php echo form_error('fornecedor_id') ?></label>
            <input type="text" class="form-control" name="fornecedor_id" id="fornecedor_id" placeholder="Fornecedor Id" value="<?php echo $fornecedor_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Grupo Material Obra Id <?php echo form_error('grupo_material_obra_id') ?></label>
            <input type="text" class="form-control" name="grupo_material_obra_id" id="grupo_material_obra_id" placeholder="Grupo Material Obra Id" value="<?php echo $grupo_material_obra_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Obra Id <?php echo form_error('obra_id') ?></label>
            <input type="text" class="form-control" name="obra_id" id="obra_id" placeholder="Obra Id" value="<?php echo $obra_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('fornecedor_material') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>