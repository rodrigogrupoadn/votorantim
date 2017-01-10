<?php include('application/views/template/header.php'); ?>

        <!--main content start  -->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <section class="box_container showback">
          	<h3><i class="fa fa-paper-plane" aria-hidden="true"></i> Posts cadastrados</h3>
          	<div class="row mt">
          		<div class="col-lg-12">

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
               <button class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#myModalCriar"> Adicionar novo post</button>
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
                                    <a href="<?php echo site_url('post'); ?>" class="btn btn-default">Resetar</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary " type="submit">Buscar</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped table-condensed">
            <tr>
                <th>No</th>
		<th>Texto</th>
		<th>Data Criacao</th>
		<th>Usuario</th>
		<th>Fase Obra</th>
		<th>Empresa</th>
		<th>Obra</th>
		<th>Grupo Material Obra</th>
		<th>Ações</th>
            </tr><?php
            foreach ($post_data as $post)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $post->texto ?></td>
			<td><?php echo $post->data_criacao ?></td>
		
			<td><?php
				$query = $this->db->query("SELECT * FROM usuario WHERE id = $post->usuario_id");
				foreach ($query->result() as $user)
				{echo $user->nome;}
				?>
			</td>
			<td>
			<?php
				$query = $this->db->query("SELECT * FROM fase_obra WHERE id = $post->fase_obra_id");
				foreach ($query->result() as $user)
				{echo $user->descricao;}
				?>
				</td>
			<td>
				<?php
				$query = $this->db->query("SELECT * FROM empresa WHERE id = $post->empresa_id");
				foreach ($query->result() as $user)
				{echo $user->razao_social;}
				?>
				</td>
			<td>
						<?php
				$query = $this->db->query("SELECT * FROM obra WHERE id = $post->obra_id");
				foreach ($query->result() as $user)
				{echo $user->nome;}
				?>
				</td>
			<td>
							<?php
				$query = $this->db->query("SELECT * FROM grupo_material WHERE id = $post->grupo_material_obra_id");
				foreach ($query->result() as $user)
				{echo $user->descricao;}
				?>
			</td>
			<td>
  <button class="btn btn-success  btn-xs" data-toggle="modal" data-target="#myModal<?php echo $start ?>"> <i class="fa fa-eye" aria-hidden="true"></i></button>
                <button class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#myModalEditar<?php echo $start ?>"><i class="fa fa-pencil"></i></button>               
				<?php 
				echo anchor(site_url('post/delete/'.$post->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-flat btn-danger btn-xs" onclick="javasciprt: return confirm(\'Você tem certeza ?\')"'); 
				?>
				<?php 
				/*echo anchor(site_url('post/read/'.$post->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('post/update/'.$post->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('post/delete/'.$post->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); */
				?>
			</td>
		</tr>

        	<!-- Modal EDITAR-->
						<div class="modal fade" id="myModalEditar<?php echo $start ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><?php echo $post->texto ?></h4>
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
						        <h4 class="modal-title" id="myModalLabel"><?php echo $post->texto ?></h4>
						      </div>
						      <div class="modal-body">
                                <span class="view_line"><span class="title_line">Texto: </span><?php echo $post->texto ?></span>
                                <span class="view_line"><span class="title_line">Data de Criação: </span><?php echo $post->data_criacao ?></span>
                                <span class="view_line"><span class="title_line">Largura: </span><?php echo$post->largura_foto ?></span>
                                <span class="view_line"><span class="title_line">Altura: </span><?php echo  $post->altura_foto ?></span>
                                <span class="view_line"><span class="title_line">Usuário: </span><?php echo $post->usuario_id ?></span>
                                <span class="view_line"><span class="title_line">Fase da obra: </span><?php echo $post->fase_obra_id ?></span>
                                <span class="view_line"><span class="title_line">Empresa: </span><?php echo $post->empresa_id ?></span>
                                <span class="view_line"><span class="title_line">Obra: </span><?php echo $post->obra_id ?></span>
                                <span class="view_line"><span class="title_line">Grupo de Material: </span><?php echo $post->grupo_material_obra_id ?></span>
                                          	      </div>
						      <div class="modal-footer">
								  	    <a href="<?php echo site_url('post') ?>" class="btn btn-default">Cancel</a>
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
						        <h4 class="modal-title" id="myModalLabel">Cadastrar novo Post</h4>
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
