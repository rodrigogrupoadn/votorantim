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
        <h2 style="margin-top:0px">Post List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('post/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('post/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('post'); ?>" class="btn btn-default">Reset</a>
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
		<th>Texto</th>
		<th>Data Criacao</th>
		<th>Largura Foto</th>
		<th>Altura Foto</th>
		<th>Usuario Id</th>
		<th>Fase Obra Id</th>
		<th>Empresa Id</th>
		<th>Obra Id</th>
		<th>Grupo Material Obra Id</th>
		<th>Action</th>
            </tr><?php
            foreach ($post_data as $post)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $post->texto ?></td>
			<td><?php echo $post->data_criacao ?></td>
			<td><?php echo $post->largura_foto ?></td>
			<td><?php echo $post->altura_foto ?></td>
			<td><?php echo $post->usuario_id ?></td>
			<td><?php echo $post->fase_obra_id ?></td>
			<td><?php echo $post->empresa_id ?></td>
			<td><?php echo $post->obra_id ?></td>
			<td><?php echo $post->grupo_material_obra_id ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('post/read/'.$post->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('post/update/'.$post->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('post/delete/'.$post->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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