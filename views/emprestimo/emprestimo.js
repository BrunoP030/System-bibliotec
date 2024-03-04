function loadData(id){
	getUrl(`${BASEURL}/emprestimo/loadData/${id}`)
	.then(res=>{	   
	    if(res.data.length>0){
			var txtnum=document.querySelector("#txtnum");
			var data=document.querySelector("#data");
			var txtcodlivro=document.querySelector("#txtcodlivro");
			var txtra=document.querySelector("#txtra");
				txtnum.value=res.data[0].numero;
				txtnum.dispatchEvent(new Event('change'));
				txtnum.readOnly=true;
				data.value=res.data[0].dataprevistadev;
				data.dispatchEvent(new Event('change'));
				txtcodlivro.value=res.data[0].codigo;
				txtcodlivro.dispatchEvent(new Event('change'));
				txtra.value=res.data[0].ra;
				txtra.dispatchEvent(new Event('change'));
				activateLabel(document.querySelector("label[for='txtnum']"));
				activateLabel(document.querySelector("label[for='data']"));
				activateLabel(document.querySelector("label[for='txtcodlivro']"))
				activateLabel(document.querySelector("label[for='txtra']"));
				
				showEdit();
		}
	});
}

function delData(id){
	if(confirm("Confirma a Exclusão do Registro?")){
	var params={id: id};
	deleteItem(`${BASEURL}/emprestimo/del`,params)
	.then(res=>{	   
		alert(res.data.texto);
		if(res.data.numero=="1"){
			listaEmp();
		}		 
	});
	}
}

function listaEmp(){
		
	document.querySelector("#lsemp").innerHTML="";
	getUrl(BASEURL+"/emprestimo/listaEmp")
	   .then(res=>{	   
			var txt="";
			for(var i=0;i<res.data.length;i++){
				var reg=res.data[i];
				var row = document.createElement("tr");
				var bEdit=`<a href='javascript:void(0)' onclick='loadData(${reg.numero});'><i class="fas fa-edit"></i></a>`;
				var bDel=`<a href='javascript:void(0)' onclick='delData(${reg.numero});'><i class="fas fa-trash"></i></a>`;
				txt+=`<tr>
						<td>${reg.numero}</td>
						<td>${reg.data}</td>
						<td>${reg.dataprevistadev}</td>
						<td>${reg.titulo}</td>
						<td>${reg.nome}</td>
						<td>${bEdit} ${bDel}</td>
					</tr>`;
			}
		    document.querySelector("#lsemp").innerHTML=txt;
	});
}

function reset(){
	document.querySelector("#frmCadEmp").reset();
	document.querySelector("#txtnum").readOnly=false;
	hideEdit();
  }

	document.addEventListener("DOMContentLoaded",()=>{

		reset();
		listaEmp();
		document.querySelector("#btnInc").addEventListener("click",function(){             
			let form = document.querySelector("#frmCadEmp");
			postForm(`${BASEURL}/emprestimo/addEmp`,form).then(res=>{
			// console.log(res.data);
			alert(res.data.texto);
			if(res.data.numero=="1"){
				reset();
				listaEmp();
			}		 
			})
		});

		document.querySelector("#btnSave").addEventListener("click",function(){             
			let form = document.querySelector("#frmCadEmp");
			postForm(`${BASEURL}/emprestimo/save`,form).then(res=>{
			// console.log(res.data);
			alert(res.data.texto);
			if(res.data.numero=="1"){
				reset();
				listaEmp();
			}		 
			})
		});

		document.querySelector("#btnCancel").addEventListener("click",function(){
			reset();
	});
	

});
