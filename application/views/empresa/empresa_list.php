<?php include('application/views/template/header.php'); ?>

        <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <section class="box_container showback">
          	<h3><i class="fa fa-users" aria-hidden="true"></i> Empresas cadastradas</h3>

          	<div class="row mt">
          		<div class="col-lg-12">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('empresa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('empresa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('empresa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
  <table class="table table-striped table-advance table-hover">
            <tr>
                <th>No</th>
		<th>Razao Social</th>
		<th>Cnpj</th>
		<th>Email</th>
		<th>Ddd1</th>
		<th>Telefone1</th>
		<th>Ddd2</th>
		<th>Endereco</th>
		<th>Representante</th>
		<th>Contato</th>
		<th>Action</th>
            </tr><?php
            foreach ($empresa_data as $empresa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $empresa->razao_social ?></td>
			<td><?php echo $empresa->cnpj ?></td>
			<td><?php echo $empresa->email ?></td>
			<td><?php echo $empresa->ddd1 ?></td>
			<td><?php echo $empresa->telefone1 ?></td>
			<td><?php echo $empresa->ddd2 ?></td>
			<td><?php echo $empresa->endereco ?></td>
			<td><?php echo $empresa->representante ?></td>
			<td><?php echo $empresa->contato ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('empresa/read/'.$empresa->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('empresa/update/'.$empresa->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('empresa/delete/'.$empresa->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
			</section>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include('application/views/template/footer.php'); ?>
