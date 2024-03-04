function loadData(id){
	getUrl(`${BASEURL}/devolucao/loadData/${id}`)
	.then(res=>{	   
	    if(res.data.length>0){
			var txtnum=document.querySelector("#txtnum");
			var txtcodlivro=document.querySelector("#txtcodlivro");
				
			txtnum.value=res.data[0].numero;
				txtnum.dispatchEvent(new Event('change'));
				txtnum.readOnly=true;
				txtcodlivro.value=res.data[0].codigo;
				txtcodlivro.dispatchEvent(new Event('change'));
				activateLabel(document.querySelector("label[for='txtnum']"));
				activateLabel(document.querySelector("label[for='txtcodlivro']"))
				
				showEdit();
		}
	});
}

function delData(id){
	if(confirm("Confirma a Exclusão do Registro?")){
	var params={id: id};
	deleteItem(`${BASEURL}/devolucao/del`,params)
	.then(res=>{	   
		alert(res.data.texto);
		if(res.data.numero=="1"){
			listaDev();
		}		 
	});
	}
}

function listaDev(){
		
	document.querySelector("#lsdev").innerHTML="";
	getUrl(BASEURL+"/devolucao/listaDev")
	   .then(res=>{	   
			var txt="";
			for(var i=0;i<res.data.length;i++){
				var reg=res.data[i];
				var row = document.createElement("tr");
				var bDel=`<a href='javascript:void(0)' onclick='delData(${reg.numero});'><i class="fas fa-trash"></i></a>`;
				txt+=`<tr>
						<td>${reg.numero}</td>
						<td>${reg.dataprevistadev}</td>
						<td>${reg.datadevolucao}</td>
						<td>${reg.titulo}</td>
						<td>${reg.nome}</td>
						<td>${reg.multa}</td>
						<td>${bDel}</td>
					</tr>`;
			}
		    document.querySelector("#lsdev").innerHTML=txt;
	});
}

function reset(){
	document.querySelector("#frmCadDev").reset();
	document.querySelector("#txtnum").readOnly=false;
	hideEdit();
  }

	document.addEventListener("DOMContentLoaded",()=>{

		reset();
		listaDev();
		document.querySelector("#btnInc").addEventListener("click",function(){             
			let form = document.querySelector("#frmCadDev");
			postForm(`${BASEURL}/devolucao/addDev`,form).then(res=>{
			// console.log(res.data);
			alert(res.data.texto);
			if(res.data.numero=="1"){
				reset();
				listaDev();
			}		 
			})
		});

		document.querySelector("#btnSave").addEventListener("click",function(){             
			let form = document.querySelector("#frmCadDev");
			postForm(`${BASEURL}/devolucao/save`,form).then(res=>{
			// console.log(res.data);
			alert(res.data.texto);
			if(res.data.numero=="1"){
				reset();
				listaDev();
			}		 
			})
		});

		document.querySelector("#btnCancel").addEventListener("click",function(){
			reset();
	});
	

});
