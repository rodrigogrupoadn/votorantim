<?php include('application/views/template/header.php'); ?>

        <!--main content start  -->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <section class="box_container showback">
          	<h3>              <i class="fa fa-university" aria-hidden="true"></i> Obras cadastradas</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                       <button class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#myModalCriar"> Adicionar nova obra</button>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('obra/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('obra'); ?>" class="btn btn-default">Resetar</a>
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
		<th>Nome</th>
		<th>Endereco</th>
		<th>Data Inicio</th>
		<th>Data Previsao</th>
		<th>Ativo</th>
		<th>Id Eng Resp</th>
		<th>Empresa Id</th>
		<th>Ações</th>
            </tr><?php
            foreach ($obra_data as $obra)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $obra->nome ?></td>
			<td><?php echo $obra->endereco ?></td>
			<td><?php echo $obra->data_inicio ?></td>
			<td><?php echo $obra->data_previsao ?></td>
			<td><?php echo $obra->ativo ?></td>
			<td><?php echo $obra->id_eng_resp ?></td>
			<td><?php echo $obra->empresa_id ?></td>
			<td  width="200px">
             <button class="btn btn-success  btn-xs" data-toggle="modal" data-target="#myModal<?php echo $start ?>"> <i class="fa fa-eye" aria-hidden="true"></i></button>
                <button class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#myModalEditar<?php echo $start ?>"><i class="fa fa-pencil"></i></button>               
				<?php 
				echo anchor(site_url('obra/delete/'.$obra->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-flat btn-danger btn-xs" onclick="javasciprt: return confirm(\'Você tem certeza ?\')"'); 
				?>
				<?php 
			/*	echo anchor(site_url('obra/read/'.$obra->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('obra/update/'.$obra->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('obra/delete/'.$obra->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); */
				?>
			</td>
		</tr>
        <!-- Modal EDITAR-->
						<div class="modal fade" id="myModalEditar<?php echo $start ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><?php echo $obra->nome ?></h4>
						      </div>
						      <div class="modal-body">
                                		<?php include ('form_editar.php'); ?>
                     	      </div>
						     </div>
						  </div>
						</div>   	
						<!-- Button trigger modal -->
						
				
						
						<!-- Modal -->
						<div class="modal fade" id="myModal<?php echo $start ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><?php echo $obra->nome ?></h4>
						      </div>
						      <div class="modal-body">
                                <span class="view_line"><span class="title_line">Obra: </span><?php echo $obra->nome ?></span>
                                <span class="view_line"><span class="title_line">Local: </span><?php echo $obra->endereco ?></span>
                                <span class="view_line"><span class="title_line">Inicio: </span><?php echo$obra->data_inicio ?></span>
                                <span class="view_line"><span class="title_line">Previsão: </span><?php echo  $obra->data_previsao ?></span>
                                <span class="view_line"><span class="title_line">status: </span><?php echo $obra->ativo ?></span>
                                <span class="view_line"><span class="title_line">Engenheiro responsável: </span><?php echo $obra->id_eng_resp ?></span>
                                <span class="view_line"><span class="title_line">Empresa: </span><?php echo $obra->empresa_id ?></span>
                                                                	      </div>
						      <div class="modal-footer">
								  	    <a href="<?php echo site_url('obra') ?>" class="btn btn-default">Cancel</a>
							  </div>
						    </div>
						  </div>
						</div>   
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
						        <h4 class="modal-title" id="myModalLabel">Cadastrar nova obra</h4>
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
