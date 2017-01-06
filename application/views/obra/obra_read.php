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
        <h2 style="margin-top:0px">Obra Read</h2>
        <table class="table">
	    <tr><td>Nome</td><td><?php echo $nome; ?></td></tr>
	    <tr><td>Endereco</td><td><?php echo $endereco; ?></td></tr>
	    <tr><td>Data Inicio</td><td><?php echo $data_inicio; ?></td></tr>
	    <tr><td>Data Previsao</td><td><?php echo $data_previsao; ?></td></tr>
	    <tr><td>Ativo</td><td><?php echo $ativo; ?></td></tr>
	    <tr><td>Id Eng Resp</td><td><?php echo $id_eng_resp; ?></td></tr>
	    <tr><td>Empresa Id</td><td><?php echo $empresa_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('obra') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>