<?php include('application/views/template/header.php'); ?>

        <!--main content start  -->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <section class="box_container showback">
          	<h3><i class="fa fa-university" aria-hidden="true"></i> Fornecedores Material</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                      <button class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#myModalCriar">Novo fornecedor de material</button>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('fornecedor_material/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('fornecedor_material'); ?>" class="btn btn-default">Resetar</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Buscar</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
       <table class="table table-bordered table-striped table-condensed">
            <tr>
                <th>No</th>
		<th>Fornecedor Id</th>
		<th>Grupo Material Obra Id</th>
		<th>Obra Id</th>
		<th>Ações</th>
            </tr><?php
            foreach ($fornecedor_material_data as $fornecedor_material)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $fornecedor_material->fornecedor_id ?></td>
			<td><?php echo $fornecedor_material->grupo_material_obra_id ?></td>
			<td><?php echo $fornecedor_material->obra_id ?></td>
				<td  width="200px">
              <!--<button class="btn btn-success  btn-xs" data-toggle="modal" data-target="#myModal<?php echo $start ?>"> <i class="fa fa-eye" aria-hidden="true"></i></button>-->
                <button class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#myModalEditar<?php echo $start ?>"><i class="fa fa-pencil"></i></button>               
				<?php 
				echo anchor(site_url('fornecedor_material/delete/'.$start),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-flat btn-danger btn-xs" onclick="javasciprt: return confirm(\'Você tem certeza ?\')"'); 
				?>
				<?php 
				/*echo anchor(site_url('fornecedor_material/read/'.$fornecedor_material->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('fornecedor_material/update/'.$fornecedor_material->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('fornecedor_material/delete/'.$fornecedor_material->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); */
				?>
			</td>
		</tr>
        <!-- Modal EDITAR-->
						<div class="modal fade" id="myModalEditar<?php echo $start ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><?php echo $fornecedor_material->fornecedor_id ?></h4>
						      </div>
						      <div class="modal-body">
                                		<?php include ('form_editar.php'); ?>
                     	      </div>
						     </div>
						  </div>
						</div>   	
						<!-- Button trigger modal -->
						
                <?php
            }
            ?>
        </table>
                        
        <!-- Modal criar-->
						<div class="modal fade" id="myModalCriar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Cadastrar fornecedor de material</h4>
						      </div>
						      <div class="modal-body">
                                		<?php include ('form_criar.php'); ?>
                     	      </div>
						      <div class="modal-footer"></div>
						    </div>
						  </div>
						</div>   	
						<!-- Button trigger modal -->
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary  btn-xs">Total de registros : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
              	</div>
			</section>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include('application/views/template/footer.php'); ?>
