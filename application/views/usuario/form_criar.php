
    <form action="Usuario/create_action" method="post">
	    <div class="form-group">
            <label for="varchar">Nome <?php echo form_error('nome') ?></label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email"  />
        </div>
	    <div class="form-group">
            <label for="varchar">Senha <?php echo form_error('senha') ?></label>
            <input type="text" class="form-control" name="senha" id="senha" placeholder="Senha" />
        </div>
	    <div class="form-group">
            <label for="varchar">Cargo <?php echo form_error('cargo') ?></label>
            <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo"  />
        </div>
	    <div class="form-group">
            <label for="varchar">Departamento <?php echo form_error('departamento') ?></label>
            <input type="text" class="form-control" name="departamento" id="departamento" placeholder="Departamento"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd1 <?php echo form_error('ddd1') ?></label>
            <input type="text" class="form-control" name="ddd1" id="ddd1" placeholder="Ddd1" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone1 <?php echo form_error('telefone1') ?></label>
            <input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone1" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd2 <?php echo form_error('ddd2') ?></label>
            <input type="text" class="form-control" name="ddd2" id="ddd2" placeholder="Ddd2" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone2 <?php echo form_error('telefone2') ?></label>
            <input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone2" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Chat Ativo <?php echo form_error('chat_ativo') ?></label>
            <input type="text" class="form-control" name="chat_ativo" id="chat_ativo" placeholder="Chat Ativo" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo" />
        </div>
	    <div class="form-group">
            <label for="int">Empresa <?php echo form_error('empresa_id') ?></label>


                <select class="form-control" name="empresa_id" id="empresa_id">
				<?php
				$query = $this->db->query("SELECT * FROM empresa");
				foreach ($query->result() as $user)
				{ ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->razao_social; ?> </option>         
                <?php } ?>
                </select>






          <!-- <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id"  />-->
        </div>
	    <div class="form-group">
            <label for="int">Perfil <?php echo form_error('perfil_id') ?></label>

                     <select class="form-control" name="perfil_id" id="perfil_id">
				<?php
				$query = $this->db->query("SELECT * FROM perfil");
				foreach ($query->result() as $user)
				{ ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->descricao; ?> </option>         
                <?php } ?>
                </select>


        </div>
                <div class="modal-footer">
	    <button type="submit" class="btn btn-success">Salvar</button> 
         <a href="<?php echo site_url('usuario') ?>" class="btn btn-default">Cancel</a>
	      </div>
	</form>

