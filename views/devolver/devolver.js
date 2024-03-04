$( document ).ready(function() {
           
    $('#frmdev').hide();
    $('.dev').hide();

});

function loadData_devolver(id){
    getUrl(`${BASEURL}/devolver/loadData_devolver/${id}`).then(res=>{
        console.log(res.data)
        $('#frmdev').show();
        if(res.data.length>0){
            var multa=document.querySelector("#multa");
            var detadv=document.querySelector("#datadevl");

                multa.value=res.data[0].multa;
                multa.dispatchEvent(new Event('change'));

                detadv.value=res.data[0].nome;
                detadv.dispatchEvent(new Event('change'));


                activateLabel(document.querySelector("label[for='multa']"));
                activateLabel(document.querySelector("label[for='datadevl']"));

                $('#frmdev').show();
        }
    });
}

document.querySelector("#btnPsq").addEventListener("click", function(){
    let dados = [];

    dados.push(document.getElementById('radv').value)
    pesquisa(dados)
    // axios.post(`${BASEURL}` + "devolver/pesquisa", dados).then(res=>{
    //     var txt=""
    //     for(var i = 0; i < res.data.length; i++){
    //         var reg = res.data[i];
    
    //         var bDev=`<a id="btndev" href='javascript:void(0)' onclick='devolver([${reg.cod},${reg.codlivro}]);' ><i class="fas fa-edit"></i></a>`
    //         txt+=`<tr><td>${reg.titulo}</td><td>${reg.data}</td><td>${reg.ra}</td><td>${reg.multa}</td><td>${bDev}</td></tr>`
    //     }

    //     document.querySelector("#lstbl").innerHTML=txt
    //     $('.dev').show();
    // })
})
 
function pesquisa(ra){
    
    axios.post(`${BASEURL}` + "devolver/pesquisa", ra).then(res=>{
        var txt=""
        for(var i = 0; i < res.data.length; i++){
            var reg = res.data[i];
            var bDev=`<a id="btndev" href='javascript:void(0)' onclick='devolver([${reg.cod},${reg.codlivro}]);' ><i class="fas fa-edit"></i></a>`
            txt+=`<tr><td>${reg.titulo}</td><td>${reg.data}</td><td>${reg.ra}</td><td>${reg.multa}</td><td>${bDev}</td></tr>`
        }

        document.querySelector("#lstbl").innerHTML=txt
        $('.dev').show();
    })
}


function devolver(id){
    let dados = [];
    let arr = {
        'codEmprestimo': id[0],
        'codLivro': id[1]
    }
    if(confirm("Confirma a devolução do livro??")){

        axios.post(`${BASEURL}devolver/devolver`, {arr}).then(res=>{
            if(res.data.codigo == 1){
                alert(res.data.texto);
                dados.push(document.getElementById('radv').value)
                pesquisa(dados);
                reset();
                return;
            
            }else if (res.data.codigo == 0){
                alert(res.data.texto);
                return;
            
            }else{
                alert("Erro ao inserir.");
                return;
            }
        });
    }
}

