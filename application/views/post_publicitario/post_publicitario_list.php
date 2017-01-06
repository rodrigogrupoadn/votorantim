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
        <h2 style="margin-top:0px">Post_publicitario List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('post_publicitario/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('post_publicitario/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('post_publicitario'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nome</th>
		<th>Data Criacao</th>
		<th>Foto</th>
		<th>Texto</th>
		<th>Ativo</th>
		<th>Largura Foto</th>
		<th>Altura Foto</th>
		<th>Id Usuario Criadro</th>
		<th>Action</th>
            </tr><?php
            foreach ($post_publicitario_data as $post_publicitario)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $post_publicitario->nome ?></td>
			<td><?php echo $post_publicitario->data_criacao ?></td>
			<td><?php echo $post_publicitario->foto ?></td>
			<td><?php echo $post_publicitario->texto ?></td>
			<td><?php echo $post_publicitario->ativo ?></td>
			<td><?php echo $post_publicitario->largura_foto ?></td>
			<td><?php echo $post_publicitario->altura_foto ?></td>
			<td><?php echo $post_publicitario->id_usuario_criadro ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('post_publicitario/read/'.$post_publicitario->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('post_publicitario/update/'.$post_publicitario->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('post_publicitario/delete/'.$post_publicitario->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>