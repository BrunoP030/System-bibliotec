function listaDevolvido(){
    document.querySelector("#lslivrodv").innerHTML="";
    axios.post(`${BASEURL}` + "livrodevolvido/listaDevolvido").then(res=>{
    var txt=""
        for(var i = 0; i < res.data.length; i++){
            console.log(res.data)
            var reg = res.data[i];
            txt+=`<tr><td>${reg.titulo}</td><td>${reg.nome}</td><td>${reg.datadevolucao}</td><td>${reg.multa}</td></tr>`
        }
        document.querySelector("#lslivrodv").innerHTML=txt
})
    }
    listaDevolvido()