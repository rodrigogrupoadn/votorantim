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
        <h2 style="margin-top:0px">Post <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Texto <?php echo form_error('texto') ?></label>
            <input type="text" class="form-control" name="texto" id="texto" placeholder="Texto" value="<?php echo $texto; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Data Criacao <?php echo form_error('data_criacao') ?></label>
            <input type="text" class="form-control" name="data_criacao" id="data_criacao" placeholder="Data Criacao" value="<?php echo $data_criacao; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Largura Foto <?php echo form_error('largura_foto') ?></label>
            <input type="text" class="form-control" name="largura_foto" id="largura_foto" placeholder="Largura Foto" value="<?php echo $largura_foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Altura Foto <?php echo form_error('altura_foto') ?></label>
            <input type="text" class="form-control" name="altura_foto" id="altura_foto" placeholder="Altura Foto" value="<?php echo $altura_foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Usuario Id <?php echo form_error('usuario_id') ?></label>
            <input type="text" class="form-control" name="usuario_id" id="usuario_id" placeholder="Usuario Id" value="<?php echo $usuario_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Fase Obra Id <?php echo form_error('fase_obra_id') ?></label>
            <input type="text" class="form-control" name="fase_obra_id" id="fase_obra_id" placeholder="Fase Obra Id" value="<?php echo $fase_obra_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Empresa Id <?php echo form_error('empresa_id') ?></label>
            <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id" value="<?php echo $empresa_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Obra Id <?php echo form_error('obra_id') ?></label>
            <input type="text" class="form-control" name="obra_id" id="obra_id" placeholder="Obra Id" value="<?php echo $obra_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Grupo Material Obra Id <?php echo form_error('grupo_material_obra_id') ?></label>
            <input type="text" class="form-control" name="grupo_material_obra_id" id="grupo_material_obra_id" placeholder="Grupo Material Obra Id" value="<?php echo $grupo_material_obra_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('post') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>