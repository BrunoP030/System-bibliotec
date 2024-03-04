<div class="container">
    <div class="border p-4 col-md-12">
        <form name="frmcadlivro" id="frmcadlivro">
            <div class="form-outline mb-4 col-md-8">
                <label form="form-label" for="codlivro">Codigo</label><br>
                <input type="text" name="codlivro" id="codlivro" required>
            </div>
            <div class="form-outline mb-4 col-md-8">
                <label class="form-label" for="nomelivro">Nome do Livro</label><br>
                <input type="text" name="nomelivro" id="nomelivro" required>
            </div>
            <div class="form-outline mb-4 col-md-8">
                <label form="form-label" for="isbn">ISBN do livro</label><br>
                <input type="text" name="isbn" id="isbn" required>
            </div>
            <div class="form-outline mb-4 col-md-8">
                <label form="form-label" for="edicao">Edição</label><br>        
                <input type="text" name="edicao" id="edicao" required>
            </div>
            <div class="form-outline mb-4 col-md-8">
                <label class="form-label" for="codautor">Autor</label><br>
                <input type="text" name="codautor" id="codautor" required>
            <div class="form-outline mb-4 col-md-8">
                <label class="form-label" for="valor">Preço</label><br>
                <input type="number" min="0" max="800" step="1" name="valor" id="valor">
            </div>
            <div class="botaocad">
                <button type="button" class="btn btn-primary mb-4" id="btnInc">Cadastrar</button>
            </div>
            <div class="botoesedit">
            <button type="button" id="btnSave" name="btnSave" class="btn btn-succes">
                    Editar
                </button>
                <button type="button" name="btnCancel" id="btnCancel" class="btn btn-warning">
                    Cancelar
                </button>
            </div>
        </form>
        <div>
    <table class="table table-hover" id="tabres">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Autor</th>
                <tr>&nbsp;</tr>
            </tr>
            </thead>
            <tbody id="lslivro"></tbody>
        </table>
    </div>
    </div>
</div>