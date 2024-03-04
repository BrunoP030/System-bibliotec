function loadData_livro(id){
    // console.log("opa")
    getUrl(`${BASEURL}listalivro/loadData_livro/${id}`).then(res=>{
        if(res.data.length>0){
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


function listaLivro(){
    document.querySelector("#lslivro").innerHTML="";
    axios.post(`${BASEURL}` + "listalivro/listaLivro").then(res=>{
    var txt=""
        for(var i = 0; i < res.data.length; i++){
            var reg = res.data[i];
            txt+=`<tr><td>${reg.titulo}</td><td>${reg.nome}</td></tr>`
        }
        document.querySelector("#lslivro").innerHTML=txt
})
// console.log("aqui")
    }
    listaLivro()