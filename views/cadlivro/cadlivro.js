    function loadData(id){
        getUrl(`${BASEURL}cadlivro/loadData/${id}`).then(res=>{
            console.log(id)
            if(res.data.length > "0"){
                var codlivro=document.querySelector("#codlivro");
                var txtnome=document.querySelector("#nomelivro")
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

                    showEdit();

            }
        });
    }
function delData(id){
    if(confirm("Confirma a Exclusão do registro?")){
        var params = {'codlivro': id};
        axios.post(`${BASEURL}` + "cadlivro/del", params).then(res=>{
            if(res.data.codigo == 1){
                alert(res.data.texto);
                listaAutor();
                return;
            }else if(res.data.codigo = 0){
                alert(res.data.texto);
                return;
            }else{
                alert("Erro ao deletar.");
                return;
            }
        })
    }
}

function listaLivro(){
    document.querySelector("#lslivro").innerHTML="";
    axios.post(`${BASEURL}` + "listalivro/listaLivro").then(res=>{
    var txt=""
        for(var i = 0; i < res.data.length; i++){
            var reg = res.data[i];
            var bEdit=`<a href='javascript:void(0)' onclick='loadData(${reg.codigo});' ><i class="fas fa-edit"></i></a>`
            var bDel= `<a href='javascript:void(0)' onclick='delData(${reg.codigo});'><i class="fas fa-trash"></i></a>`
            txt+=`<tr><td>${reg.titulo}</td><td>${reg.nome}</td><td>${bEdit} ${bDel}</td></tr>`
        }
        document.querySelector("#lslivro").innerHTML=txt
})
    }
listaLivro()
















function reset(){
    document.querySelector("#frmcadlivro").reset();
    hideEdit();
}








document.querySelector("#btnInc").addEventListener("click",function(){
    
    let dados = [];
    dados.push( document.getElementById('codlivro').value,
                document.getElementById('nomelivro').value,
                document.getElementById('isbn').value,
                document.getElementById('edicao').value,
                document.getElementById('codautor').value,
                document.getElementById('valor').value );
   console.log(dados)
                if(document.getElementById('codlivro').value == '' || document.getElementById('codlivro').value == null){
        alert("Preencha o campo Codigo.");return;
    
    }else if(document.getElementById('nomelivro').value == '' || document.getElementById('nomelivro').value == null){
        alert("Preencha o campo Titulo.");return;
   
    }else if(document.getElementById('isbn').value == '' || document.getElementById('isbn').value == null){
        alert("Preencha o campo ISBN.");return;
   
    }else if(document.getElementById('edicao').value == '' || document.getElementById('edicao').value == null){
        alert("Preencha o campo Edição.");return;
   
    }else if(document.getElementById('codautor').value == '' || document.getElementById('codautor').value == null){
        alert("Preencha o campo Autor.");return;
   
    }else if(document.getElementById('valor').value == '' || document.getElementById('valor').value == null){
        alert("Preencha o campo Preço.");return;
   
    }
    
    else{
        axios.post(`${BASEURL}` + "cadlivro/insert", {"dados": dados}).then(res=>{
           
            if(res.data.codigo == 1){
                alert(res.data.texto);
                listaLivro();
                reset();
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












    document.querySelector("#btnSave").addEventListener("click",function(){
        let form = document.querySelector("#frmcadlivro");
    postForm(`${BASEURL}cadlivro/save`, form).then(res=>{
        if(res.data.codigo==1){
            alert(res.data.texto);
            listaLivro();
            return;
        }else if(res.data.codigo==0){
            alert(res.data.texto);
            return
        }else{
            alert("Erro ao atualizar.");
            return;
        }
        })

    document.querySelector("#btnCancel").addEventListener("click",function(){
        reset();
    })
    })