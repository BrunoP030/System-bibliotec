function listaEmprestimo(){
    document.querySelector("#lsalugado").innerHTML="";
    axios.post(`${BASEURL}` + "livrosalugados/listaEmprestimo").then(res=>{
    var txt=""
        for(var i = 0; i < res.data.length; i++){
            console.log(res.data)
            var reg = res.data[i];
            txt+=`<tr><td>${reg.titulo}</td><td>${reg.datadevolucao}</td></tr>`
        }
        document.querySelector("#lsalugado").innerHTML=txt
})
    }
    listaEmprestimo();