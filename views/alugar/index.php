<div class="container">
    <div class="form-outline mb-4 col-md-8">
        <label class="form-label" for="nomelivro">Nome do Livro</label><br>
        <input type="text" name="nomelivro" id="nomelivro" required>
    </div> 
    <div class="botaopsq">
        <button type="button" class="btn btn-primary mb-4" id="btnPsq">Pesquisar</button>
    </div>
    <div id="frmalugar">
        <div class="border p-4 col-md-12">
            <form name="frmalglivro" id="frmalglivro">
                <div class="form-outline mb-4 col-md-8">
                    <label form="form-label" for="raalug">Seu Ra</label><br>
                    <input type="text" name="raalug" id="raalug" required>
                </div>
                <div class="form-outline mb-4 col-md-8">
                    <label form="form-label" for="codlivro">Codigo</label><br>
                    <input type="text" name="codlivro" id="codlivro" required>
                </div>
                <div class="form-outline mb-4 col-md-8">
                    <label class="form-label" for="txtnomelivro">Nome do Livro</label><br>
                    <input type="text" name="txtnomelivro" id="txtnomelivro" required>
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
                </div>
                <div class="form-outline mb-4 col-md-8">
                    <label class="form-label" for="valor">Preço</label><br>
                    <input type="number" min="0" max="800" step="1" name="valor" id="valor">
                </div>
                <div class="form-outline mb-4 col-md-8">
                    <label class="form-label" for="dataprevista">Periodo de aluguel</label><br>
                    <input type="date" name="datainicio" id="datadev" value="2024-01-25" min="2024-01-29" max="2024-02-03"  required>Recebimento do livro</input>
                    <br><input type="date" name="datadev" id="datadev" value="2024-01-25" min="2024-01-29" max="2024-02-03">Entrega do livro</input>
                    <button type="button" class="btn btn-primary mb-4" id="btnAlg">Alugar</button>
                </div>   
            </form>
        </div>
    </div>
    <div class="teste" id="tbllivros">
        <table class="table table-hover" id="tabres">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <tr>&nbsp;</tr>
                </tr>
            </thead>
            <tbody id="lslivroal"></tbody>
        </table>
    </div>
</div>