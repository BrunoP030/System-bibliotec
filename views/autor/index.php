<div class="container">
    <div class="border p-4 col-md-12">
        <form name="frmcadautor" id="frmcadautor">
            <div class="form-outline mb-4 col-md-8">
                <label class="form-label" for="codautor">Codigo</label><br>
                <input type="text" name="codautor" id="codautor" required>
            </div>
            <div class="form-outline mb-4 col-md-8">
                    <label class="form-label" for="txtnomeautor">Nome do autor</label><br>
                    <input type="text" name="txtnomeautor" id="txtnomeautor" required>
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
                    <th>Autor</th>
                    <th>Codigo do Autor</th>
                    <tr>&nbsp;</tr>
                </tr>
                </thead>
                <tbody id="lsautor"></tbody>
            </table>
        </div>
    </div>
</div>