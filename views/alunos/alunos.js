function loadData(id){
	getUrl(`${BASEURL}/alunos/loadData/${id}`)
	.then(res=>{	   
	    if(res.data.length>0){
			var txtra=document.querySelector("#txtra");
			var txtaluno=document.querySelector("#txtaluno");
				txtra.value=res.data[0].ra;
				txtra.dispatchEvent(new Event('change'));
				txtra.readOnly=true;
				txtaluno.value=res.data[0].nome;
				console.log(res.data);
				txtaluno.dispatchEvent(new Event('change'));
				activateLabel(document.querySelector("label[for='txtra']"));
				activateLabel(document.querySelector("label[for='txtaluno']"));
				
				showEdit();
		}
	});
}

function delData(id){
	if(confirm("Confirma a Exclusão do Registro?")){
	var params={id: id};
	deleteItem(`${BASEURL}/alunos/del`,params)
	.then(res=>{	   
		alert(res.data.texto);
		if(res.data.ra=="1"){
			listaAluno();
		}		 
	});
	}
}

function listaAluno(){
		
	document.querySelector("#lsaluno").innerHTML="";
	getUrl(BASEURL+"/alunos/listaAluno")
	   .then(res=>{	   
			var txt="";
			for(var i=0;i<res.data.length;i++){
				var reg=res.data[i];
				var row = document.createElement("tr");
				var bEdit=`<a href='javascript:void(0)' onclick='loadData(${reg.ra});'><i class="fas fa-edit"></i></a>`;
				var bDel=`<a href='javascript:void(0)' onclick='delData(${reg.ra});'><i class="fas fa-trash"></i></a>`;
				txt+=`<tr>
						<td>${reg.ra}</td>
						<td>${reg.nome}</td>
						<td>${bEdit} ${bDel}</td>
					  </tr>`;
			}
		    document.querySelector("#lsaluno").innerHTML=txt;
	});
}

function reset(){
	document.querySelector("#frmCadAluno").reset();
	document.querySelector("#txtcodaluno").readOnly=false;
	hideEdit();
  }

document.addEventListener("DOMContentLoaded",()=>{

	reset();
	listaAluno();
	document.querySelector("#btnInc").addEventListener("click",function(){             
		let form = document.querySelector("#frmCadAluno");
		postForm(`${BASEURL}/alunos/addAluno`,form).then(res=>{
		   // console.log(res.data);
		   alert(res.data.texto);
		   if(res.data.ra=="1"){
			   reset();
			   listaAluno();
		   }		 
		})
	});

	document.querySelector("#btnSave").addEventListener("click",function(){             
		let form = document.querySelector("#frmCadAluno");
		postForm(`${BASEURL}/alunos/save`,form).then(res=>{
		   // console.log(res.data);
		   alert(res.data.texto);
		   if(res.data.ra=="1"){
			   reset();
			   listaAluno();
		   }		 
		})
	});

	document.querySelector("#btnCancel").addEventListener("click",function(){
			reset();
	});
	

});
