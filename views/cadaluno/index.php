<div class="container">
    <div class="border p-4 col-md-12">
        <form name="frmcadaluno" id="frmcadaluno">
            <div class="form-outline mb-4 col-md-8">
                <label class="form-label" for="ra">RA</label><br>
                <input type="text" name="ra" id="ra" required>
            </div>
            <div class="form-outline mb-4 col-md-8">
                    <label class="form-label" for="txtnomealuno">Nome do aluno</label><br>
                    <input type="text" name="txtnomealuno" id="txtnomealuno" required>
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
                    <th>Aluno</th>
                    <th>RA</th>
                    <tr>&nbsp;</tr>
                </tr>
                </thead>
                <tbody id="lsaluno"></tbody>
            </table>
        </div>
    </div>
</div>