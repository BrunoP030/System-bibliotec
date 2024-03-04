function loadData_aluno(id){
    getUrl(`${BASEURL}/cadaluno/loadData_aluno/${id}`).then(res=>{
        if(res.data.length>0){
            var ra=document.querySelector("#ra");
            var txtnome=document.querySelector("#txtnomealuno")

                ra.value=res.data[0].ra;
                ra.dispatchEvent(new Event('change'));

                txtnome.value=res.data[0].nome;
                txtnome.dispatchEvent(new Event('change'));


                activateLabel(document.querySelector("label[for='ra']"));
                activateLabel(document.querySelector("label[for='txtnomealuno']"));

                showEdit();

        }
    });
}
function delData_aluno(id){
    if(confirm("Confirma a Exclusão do registro?")){
        var params = {'ra': id};
        axios.post(`${BASEURL}` + "cadaluno/del_aluno", params).then(res=>{
            if(res.data.codigo == 1){
                alert(res.data.texto);
                listaAluno();
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


function listaAluno(){
    document.querySelector("#lsaluno").innerHTML="";
    axios.post(`${BASEURL}` + "cadaluno/listaAluno").then(res=>{
    var txt=""
        for(var i = 0; i < res.data.length; i++){

            var reg = res.data[i];
            var bEdit=`<a href='javascript:void(0)' onclick='loadData_aluno(${reg.ra});' ><i class="fas fa-edit"></i></a>`
            var bDel= `<a href='javascript:void(0)' onclick='delData_aluno(${reg.ra});'><i class="fas fa-trash"></i></a>`
            txt+=`<tr><td>${reg.nome}</td><td>${reg.ra}</td><td>${bEdit} ${bDel}</td></tr>`;

        }
        document.querySelector("#lsaluno").innerHTML=txt
    })

    }
listaAluno();


function reset(){
    document.querySelector("#cadaluno").reset();
    hideEdit();
}

document.querySelector("#btnInc").addEventListener("click",function(){
    let dados = [];
    dados.push( document.getElementById('ra').value,
                document.getElementById('txtnomealuno').value );
    if(document.getElementById('ra').value == '' || document.getElementById('ra').value == null){
        alert("Preencha o campo RA.");return;
    }else if(document.getElementById('txtnomealuno').value == '' || document.getElementById('txtnomealuno').value == null){
        alert("Preencha o campo Nome.");return;
    }else{
        axios.post(`${BASEURL}` + "cadaluno/insert_aluno", {"dados": dados}).then(res=>{
            if(res.data.codigo == 1){
                alert(res.data.texto);
                listaAluno();
                reset()
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
        let form = document.querySelector("#frmcadaluno");
    postForm(`${BASEURL}cadaluno/save_aluno`, form).then(res=>{
        if(res.data.codigo==1){
            alert(res.data.texto);
            listaAluno();
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