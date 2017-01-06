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
        <h2 style="margin-top:0px">Mensagem <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="mensagem">Mensagem <?php echo form_error('mensagem') ?></label>
            <textarea class="form-control" rows="3" name="mensagem" id="mensagem" placeholder="Mensagem"><?php echo $mensagem; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Chat Id <?php echo form_error('chat_id') ?></label>
            <input type="text" class="form-control" name="chat_id" id="chat_id" placeholder="Chat Id" value="<?php echo $chat_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Usuario Enviou <?php echo form_error('id_usuario_enviou') ?></label>
            <input type="text" class="form-control" name="id_usuario_enviou" id="id_usuario_enviou" placeholder="Id Usuario Enviou" value="<?php echo $id_usuario_enviou; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mensagem') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>