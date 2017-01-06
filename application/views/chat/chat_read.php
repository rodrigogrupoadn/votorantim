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
        <h2 style="margin-top:0px">Chat Read</h2>
        <table class="table">
	    <tr><td>Chatcol</td><td><?php echo $chatcol; ?></td></tr>
	    <tr><td>Id Usuario1</td><td><?php echo $id_usuario1; ?></td></tr>
	    <tr><td>Id Usuario2</td><td><?php echo $id_usuario2; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('chat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>