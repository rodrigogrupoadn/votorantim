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
        <h2 style="margin-top:0px">Curtida <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="timestamp">Data Criacao <?php echo form_error('data_criacao') ?></label>
            <input type="text" class="form-control" name="data_criacao" id="data_criacao" placeholder="Data Criacao" value="<?php echo $data_criacao; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Usuario Id <?php echo form_error('usuario_id') ?></label>
            <input type="text" class="form-control" name="usuario_id" id="usuario_id" placeholder="Usuario Id" value="<?php echo $usuario_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Post Id <?php echo form_error('post_id') ?></label>
            <input type="text" class="form-control" name="post_id" id="post_id" placeholder="Post Id" value="<?php echo $post_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('curtida') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>