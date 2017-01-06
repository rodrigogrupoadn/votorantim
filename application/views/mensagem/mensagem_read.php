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
        <h2 style="margin-top:0px">Mensagem Read</h2>
        <table class="table">
	    <tr><td>Mensagem</td><td><?php echo $mensagem; ?></td></tr>
	    <tr><td>Chat Id</td><td><?php echo $chat_id; ?></td></tr>
	    <tr><td>Id Usuario Enviou</td><td><?php echo $id_usuario_enviou; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mensagem') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>