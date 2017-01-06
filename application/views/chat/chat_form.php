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
        <h2 style="margin-top:0px">Chat <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Chatcol <?php echo form_error('chatcol') ?></label>
            <input type="text" class="form-control" name="chatcol" id="chatcol" placeholder="Chatcol" value="<?php echo $chatcol; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Usuario1 <?php echo form_error('id_usuario1') ?></label>
            <input type="text" class="form-control" name="id_usuario1" id="id_usuario1" placeholder="Id Usuario1" value="<?php echo $id_usuario1; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Usuario2 <?php echo form_error('id_usuario2') ?></label>
            <input type="text" class="form-control" name="id_usuario2" id="id_usuario2" placeholder="Id Usuario2" value="<?php echo $id_usuario2; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('chat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>