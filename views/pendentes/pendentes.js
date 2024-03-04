function listaPendente(){
    document.querySelector("#lspendente").innerHTML="";
    axios.post(`${BASEURL}` + "pendentes/listaPendente").then(res=>{
    var txt=""
        for(var i = 0; i < res.data.length; i++){
            console.log(res.data)
            var reg = res.data[i];
            txt+=`<tr><td>${reg.titulo}</td><td>${reg.nome}</td><td>${reg.dataprevistadev}</td></tr>`
        }
        document.querySelector("#lspendente").innerHTML=txt
})
    }
    listaPendente();