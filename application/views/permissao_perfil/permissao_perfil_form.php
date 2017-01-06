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
        <h2 style="margin-top:0px">Permissao_perfil <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Permissao <?php echo form_error('permissao') ?></label>
            <input type="text" class="form-control" name="permissao" id="permissao" placeholder="Permissao" value="<?php echo $permissao; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Perfil Id <?php echo form_error('perfil_id') ?></label>
            <input type="text" class="form-control" name="perfil_id" id="perfil_id" placeholder="Perfil Id" value="<?php echo $perfil_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('permissao_perfil') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>