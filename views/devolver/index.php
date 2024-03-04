<div class="container">
        <div class="form-outline mb-4 col-md-8">
            <label form="form-label" for="radv">RA</label><br>
                <input type="text" name="radv" id="radv" required>
        </div>
        <form>
        <div class="botaopsq">
            <button type="button" class="btn btn-primary mb-4" id="btnPsq">Pesquisar</button>
        </div>
        <div id="frmdev">
        <div class="form-outline mb-4 col-md-8">
                <label class="form-label" for="codlivro">Livro</label><br>
                <input type="text" name="codlivro" id="codlivro" required>
        </div>
            <div class="form-outline mb-4 col-md-8">
                <label class="form-label" for="datadevl">Data devolvida</label><br>
                <input type="date" name="datadevl" id="datadevl" required>
            </div> 
            <div class="form-outline mb-4 col-md-8">
                <label class="form-label" for="multa">Multa</label><br>
                <input type="number" name="multa" id="multa" value="0" readonly>
            </div> 
            <div class="botaodev">
                <button type="button" id="btndev" name="btndev" class="btn btn-primary mb-4">Devolver</button>
            </div>     
        </div>
    </form>   
    <div class="dev">
        <table class="table table-hover" id="tabres">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Data de inicio</th>
                    <th>RA</th>
                    <th>Multa</th>
                    <th>Devolver</th>
                    <tr>&nbsp;</tr>
                </tr>
            </thead>
            <tbody id="lstbl"></tbody>
        </table>
    </div>
</div>