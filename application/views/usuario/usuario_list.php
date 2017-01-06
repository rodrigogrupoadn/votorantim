<?php include('application/views/template/header.php'); ?>

        <!--main content start  -->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <section class="box_container showback">
          	<h3><i class="fa fa-users" aria-hidden="true"></i> Usuários cadastrados</h3>
          	<div class="row mt">
          		<div class="col-lg-12">

 
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
               
				 <button class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#myModalCriar"> Adicionar novo</button>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('usuario/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('usuario'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
   <table class="table table-striped table-advance table-hover">
            <tr>
                <th>No</th>
		<th>Nome</th>
		<th>Email</th>
		<th>Senha</th>
		<th>Cargo</th>
		<th>Departamento</th>
		<th>Ddd1</th>
		<th>Telefone1</th>
		<th>Ddd2</th>
		<th>Telefone2</th>
	
		<th>Empresa</th>

		<th>Ações</th>
            </tr><?php
            foreach ($usuario_data as $usuario)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $usuario->nome ?></td>
			<td><?php echo $usuario->email ?></td>
			<td><?php echo $usuario->senha ?></td>
			<td><?php echo $usuario->cargo ?></td>
			<td><?php echo $usuario->departamento ?></td>
			<td><?php echo $usuario->ddd1 ?></td>
			<td><?php echo $usuario->telefone1 ?></td>
			<td><?php echo $usuario->ddd2 ?></td>
			<td><?php echo $usuario->telefone2 ?></td>
	
			<td><?php echo $usuario->empresa_id ?></td>
		
			<td>
 

                <button class="btn btn-success  btn-xs" data-toggle="modal" data-target="#myModal<?php echo $start ?>"> <i class="fa fa-eye" aria-hidden="true"></i></button>
                <button class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#myModalEditar<?php echo $start ?>"><i class="fa fa-pencil"></i></button>               
				<?php 
			// //echo anchor(site_url('usuario/read/'.$usuario->id),'Read'); 
				//echo ' | '; 
			//	echo anchor(site_url('usuario/update/'.$usuario->id),'Update'); 
				//echo ' | '; 
				echo anchor(site_url('usuario/delete/'.$usuario->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-flat btn-danger btn-xs" onclick="javasciprt: return confirm(\'Você tem certeza ?\')"'); 
				?>
			</td>
		</tr>

        			<!-- Modal EDITAR-->
						<div class="modal fade" id="myModalEditar<?php echo $start ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><?php echo $usuario->nome ?></h4>
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
						        <h4 class="modal-title" id="myModalLabel"><?php echo $usuario->nome ?></h4>
						      </div>
						      <div class="modal-body">
						        <span class="view_line"><span class="title_line">E-mail: </span><?php echo $usuario->email ?></span>
                                <span class="view_line"><span class="title_line">Senha: </span><?php echo $usuario->senha ?></span>
                                <span class="view_line"><span class="title_line">Cargo: </span><?php echo $usuario->cargo ?></span>
                                <span class="view_line"><span class="title_line">Departamento: </span><?php echo $usuario->departamento ?></span>
                                <span class="view_line"><span class="title_line">DDD 1: </span><?php echo $usuario->ddd1 ?></span>
                                <span class="view_line"><span class="title_line">Telefone 1: </span><?php echo $usuario->telefone1 ?></span>
                                <span class="view_line"><span class="title_line">DDD 2: </span><?php echo $usuario->ddd2 ?></span>
                                <span class="view_line"><span class="title_line">Telefone 2: </span><?php echo $usuario->telefone2 ?></span>
                                <span class="view_line"><span class="title_line">Status Chat: </span><?php echo $usuario->chat_ativo ?></span>
                                <span class="view_line"><span class="title_line">Empresa: </span><?php echo $usuario->empresa_id ?></span>
                                <span class="view_line"><span class="title_line">Perfil: </span><?php echo $usuario->perfil_id ?></span>
                     
						      </div>
						      <div class="modal-footer">
								  	    <a href="<?php echo site_url('usuario') ?>" class="btn btn-default">Cancel</a>
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
						        <h4 class="modal-title" id="myModalLabel">Cadastrar novo usuário</h4>
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
          	</div>
			</section>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include('application/views/template/footer.php'); ?>
