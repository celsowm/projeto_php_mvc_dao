<h1>Novo livro</h1>
<form action="" method="post">
  <div class="form-group row">
    <label for="titulo" class="col-4 col-form-label">Título</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-book"></i>
          </div>
        </div> 
        <input id="titulo" name="titulo" placeholder="Título do livro" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="preco" class="col-4 col-form-label">Preço (R$)</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-money"></i>
          </div>
        </div> 
        <input id="preco" name="preco" placeholder="Digite o preço" type="number" min="4" step="any"  required="required" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="isbn" class="col-4 col-form-label">ISBN</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-id-card-o"></i>
          </div>
        </div> 
        <input id="isbn" name="isbn" placeholder="Digite o número ISBN do livro" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="ano_publicacao" class="col-4 col-form-label">Ano de publicação</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-calendar"></i>
          </div>
        </div> 
          <input id="ano_publicacao" maxlength="4" name="ano_publicacao" placeholder="Ano YYYY de publicação" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label" for="editora_id">Editora</label> 
    <div class="col-8">
      <select id="editora_id" name="editora_id" class="custom-select" required="required">   
          <option value=""> Selecione... </option>
          <?php foreach ($editoras as $v => $t){
            echo "<option value='$v'> $t </option>";
          }
          ?>
      </select>
    </div>
  </div>  
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </div>
</form>