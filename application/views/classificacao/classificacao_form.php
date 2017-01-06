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
        <h2 style="margin-top:0px">Classificacao <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Classificacao <?php echo form_error('classificacao') ?></label>
            <input type="text" class="form-control" name="classificacao" id="classificacao" placeholder="Classificacao" value="<?php echo $classificacao; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Usuario Id <?php echo form_error('usuario_id') ?></label>
            <input type="text" class="form-control" name="usuario_id" id="usuario_id" placeholder="Usuario Id" value="<?php echo $usuario_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Fornecedor Id <?php echo form_error('fornecedor_id') ?></label>
            <input type="text" class="form-control" name="fornecedor_id" id="fornecedor_id" placeholder="Fornecedor Id" value="<?php echo $fornecedor_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('classificacao') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>