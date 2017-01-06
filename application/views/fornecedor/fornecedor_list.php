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
        <h2 style="margin-top:0px">Fornecedor List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('fornecedor/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('fornecedor/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('fornecedor'); ?>" class="btn btn-default">Reset</a>
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
		<th>Razao Social</th>
		<th>Cnpj</th>
		<th>Ddd1</th>
		<th>Telefone1</th>
		<th>Ddd2</th>
		<th>Telefone2</th>
		<th>Email</th>
		<th>Ativo</th>
		<th>Empresa Id</th>
		<th>Action</th>
            </tr><?php
            foreach ($fornecedor_data as $fornecedor)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $fornecedor->razao_social ?></td>
			<td><?php echo $fornecedor->cnpj ?></td>
			<td><?php echo $fornecedor->ddd1 ?></td>
			<td><?php echo $fornecedor->telefone1 ?></td>
			<td><?php echo $fornecedor->ddd2 ?></td>
			<td><?php echo $fornecedor->telefone2 ?></td>
			<td><?php echo $fornecedor->email ?></td>
			<td><?php echo $fornecedor->ativo ?></td>
			<td><?php echo $fornecedor->empresa_id ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('fornecedor/read/'.$fornecedor->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('fornecedor/update/'.$fornecedor->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('fornecedor/delete/'.$fornecedor->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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