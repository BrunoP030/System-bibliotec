


<!-- Jumbotron -->
<div id="intro" class="py-2 text-center bg-light">
        <h1 class="mb-0 h3"><?=$this->title?></h1>
      </div>
      <!-- Jumbotron -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-4 mb-5">
      <div class="container">        
		<div class="border p-4 col-md-12">			
		<form name="frmCadEmp" id="frmCadEmp">					
			<div class="form-outline mb-4 col-md-2">
				<input type="text" id="txtnum" name="txtnum" class="form-control" required/>
				<label class="form-label" for="txtnum">Número do Empréstimo</label>
			</div>
			<div class="form-outline mb-4 col-md-8">
				<input type="date" id="data" name="data" class="form-control" required />
				<label class="form-label" for="data"></label>
			</div>
			<div class="form-outline mb-4 col-md-8">
				<input type="text" id="txtcodlivro" name="txtcodlivro" class="form-control" required />
				<label class="form-label" for="txtcodlivro">Livros</label>
			</div>
			<div class="form-outline mb-4 col-md-8">
				<input type="text" id="txtra" name="txtra" class="form-control" required />
				<label class="form-label" for="txtra">Aluno que efetuou o empréstimo</label>
			</div>
			<div id="botaocad">
				<button type="button" class="btn btn-primary mb-4" id="btnInc">
					Incluir
				</button>
			</div>
			<div id="botoesedit">
				<button type="button" id="btnSave" name="btnSave" class="btn btn-success">
					Gravar
				</button>
				<button type="button" name="btnCancel" id="btnCancel" class="btn btn-warning">
					Cancelar
				</button>
			</div>
		</form>
		</div>
		<br>
		<div>
		
			<table class="table table-hover" id="tabres">
				<thead>
					<tr>
						<th>Número</th>
						<th>Data do Empréstimo</th>
						<th>Data da Devolução</th>
						<th>Livro</th>
						<th>Aluno</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody id="lsemp">
				</tbody>
			</table>
		</div>
		
      </div>
	  
    </main>
    <!--Main layout-->
		
		

