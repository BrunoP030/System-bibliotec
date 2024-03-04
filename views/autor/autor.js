function loadData_autor(id){
    getUrl(`${BASEURL}autor/loadData_autor/${id}`).then(res=>{
        if(res.data.length>"0"){
            var codautor=document.querySelector("#codautor");
            var txtnome=document.querySelector("#txtnomeautor")

                codautor.value=res.data[0].codigo;
                codautor.dispatchEvent(new Event('change'));

                txtnome.value=res.data[0].nome;
                txtnome.dispatchEvent(new Event('change'));


                activateLabel(document.querySelector("label[for='codautor']"));
                activateLabel(document.querySelector("label[for='txtnomeautor']"));

                showEdit();

        }
    });
}
function delData_autor(id){
    // console.log(id);
    if(confirm("Confirma a Exclusão do registro?")){
        var params = {'codautor': id};
        axios.post(`${BASEURL}` + "autor/del_autor", params).then(res=>{
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









function listaAutor(){
    document.querySelector("#lsautor").innerHTML="";
    axios.post(`${BASEURL}` + "autor/listaAutor").then(res=>{
    
        var txt=""
    
        for(var i = 0; i < res.data.length; i++){
            var reg = res.data[i];
            var bEdit=`<a href='javascript:void(0)' onclick='loadData_autor(${reg.codigo});' ><i class="fas fa-edit"></i></a>`
            var bDel= `<a href='javascript:void(0)' onclick='delData_autor(${reg.codigo});'><i class="fas fa-trash"></i></a>`
            txt+=`<tr><td>${reg.nome}</td><td>${reg.codigo}</td><td>${bEdit} ${bDel}</td></tr>`;

        }
        document.querySelector("#lsautor").innerHTML=txt
    })

    }
listaAutor();
















function reset(){
    document.querySelector("#frmcadautor").reset();
    hideEdit();
}








document.querySelector("#btnInc").addEventListener("click",function(){
    
    let dados = [];
    dados.push( document.getElementById('codautor').value,
                document.getElementById('txtnomeautor').value );
   
                if(document.getElementById('codautor').value == '' || document.getElementById('codautor').value == null){
        alert("Preencha o campo Codigo.");return;
    
    }else if(document.getElementById('txtnomeautor').value == '' || document.getElementById('txtnomeautor').value == null){
        alert("Preencha o campo Nome.");return;
   
    }else{
        axios.post(`${BASEURL}` + "autor/insert_autor", {"dados": dados}).then(res=>{
           
            if(res.data.codigo == 1){
                alert(res.data.texto);
                listaAutor();
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
        let form = document.querySelector("#frmcadautor");
    postForm(`${BASEURL}autor/save_autor`, form).then(res=>{
        if(res.data.codigo==1){
            alert(res.data.texto);
            listaAutor();
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