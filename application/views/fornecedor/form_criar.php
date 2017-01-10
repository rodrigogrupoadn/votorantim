
    <form action="Fornecedor/create_action" method="post">
  <div class="form-group">
            <label for="varchar">Razao Social <?php echo form_error('razao_social') ?></label>
            <input type="text" class="form-control" name="razao_social" id="razao_social" placeholder="Razao Social" />
        </div>
	    <div class="form-group">
            <label for="char">Cnpj <?php echo form_error('cnpj') ?></label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="Cnpj"  />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd1 <?php echo form_error('ddd1') ?></label>
            <input type="text" class="form-control" name="ddd1" id="ddd1" placeholder="Ddd1"  />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone1 <?php echo form_error('telefone1') ?></label>
            <input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone1" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd2 <?php echo form_error('ddd2') ?></label>
            <input type="text" class="form-control" name="ddd2" id="ddd2" placeholder="Ddd2"  />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone2 <?php echo form_error('telefone2') ?></label>
            <input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone2" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo"  />
        </div>
	    <div class="form-group">
            <label for="int">Empresa Id <?php echo form_error('empresa_id') ?></label>
            <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id" />
        </div>
	   
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('fornecedor') ?>" class="btn btn-default">Cancelar</a>
	</form>