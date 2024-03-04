$( document ).ready(function() {
    // $('.teste').hide();
    // $('#hide').hide();
    // fecharForm();
    //fecharTable();

    document.querySelector("#btnPsq").addEventListener("click", function(){
        let dados = [];

        dados.push(document.getElementById('nomelivro').value)
        axios.post(`${BASEURL}` + "alugar/pesquisaLivro", dados).then(res=>{
            var txt=""
            for(var i = 0; i < res.data.length; i++){
                var reg = res.data[i];
                var bAlug=`<a id="btnAlug" href='javascript:void(0)' onclick='loadData_alugar(${reg.codigo});' ><i class="fas fa-edit"></i></a>`
                txt+=`<tr><td>${reg.titulo}</td><td>${reg.autor}</td><td>${bAlug}</td></tr>`
            }

            document.querySelector("#lslivroal").innerHTML=txt
            $('#tbllivros').show();
        })
    
    })

});



function loadData_alugar(id){
    getUrl(`${BASEURL}alugar/loadData_alugar/${id}`).then(res=>{
        if(res.data.length > "0"){
            var codlivro=document.querySelector("#codlivro");
            var txtnome=document.querySelector("#txtnomelivro")
            var isbn=document.querySelector('#isbn')
            var edicao=document.querySelector('#edicao')
            var autor=document.querySelector('#codautor')
            var valor=document.querySelector('#valor')

                codlivro.value=res.data[0].codigo;
                codautor.dispatchEvent(new Event('change'));

                txtnome.value=res.data[0].titulo;
                txtnome.dispatchEvent(new Event('change'));

                isbn.value=res.data[0].isbn;
                isbn.dispatchEvent(new Event('change'));

                edicao.value=res.data[0].edicao;
                edicao.dispatchEvent(new Event('change'));

                autor.value=res.data[0].autor;
                autor.dispatchEvent(new Event('change'));

                valor.value=res.data[0].valor;
                valor.dispatchEvent(new Event('change'));

                activateLabel(document.querySelector("label[for='codlivro']"));
                activateLabel(document.querySelector("label[for='nomelivro']"));
                activateLabel(document.querySelector("label[for='isbn']"));
                activateLabel(document.querySelector("label[for='edicao']"));
                activateLabel(document.querySelector("label[for='codautor']"));
                activateLabel(document.querySelector("label[for='valor']"));

                
                $('#frmalugar').show();
        }
    });
}

function listaLivro(){
    document.querySelector("#lslivroal").innerHTML="";
    axios.post(`${BASEURL}` + "listalivro/listaLivro").then(res=>{
        var txt=""
        for(var i = 0; i < res.data.length; i++){
            var reg = res.data[i];
            var bAlug=`<a id="btnAlug" href='javascript:void(0)' onclick='loadData_alugar(${reg.codautor});' ><i class="fas fa-edit"></i></a>`
            txt+=`<tr><td>${reg.titulo}</td><td>${reg.nome}</td><td>${bAlug}</td></tr>`
        }

        document.querySelector("#lslivroal").innerHTML=txt
        console.log(txt)
    })
}

    $( document ).ready(function() {
           
        $('#frmalugar').hide();
        $('#tbllivros').hide();
    
    });

    document.querySelector("#btnAlg").addEventListener("click",function(){
        let dados = [];
        console.log(document.getElementById('datadev'))
        dados.push(
                    document.getElementById('datainicio').value,
                    document.getElementById('raalug').value,
                    document.getElementById('codlivro').value,
                    document.getElementById('datadev').value
                    );
        console.log(dados);
        if(document.getElementById('raalug').value == '' || document.getElementById('raalug').value == null){
            alert("Preencha o campo RA.");
            return;
        }else{
            axios.post(`${BASEURL}` + "alugar/alugar", {"dados": dados}).then(res=>{
                console.log(res.data)
                if(res.data.codigo == 1){
                    alert(res.data.texto);
                    return;
                }else if (res.data.codigo == 0){
                    alert(res.data.texto);
                    return;
                }else{
                    alert("Erro ao inserir.");
                    return;
                }
        })
        }
        });
        