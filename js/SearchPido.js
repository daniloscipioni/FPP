//submete o formulário por post usando o botão ENTER
$("#formSearch").submit(function(){
	  $.ajax({
	    type: "POST",
	    url: "viewFormReturn.php",

	    }).done(function( msg ) {
	    });

	  return false; // Impede a mudança de página

	});
//////////
//submete o formulário por post usando o botão ENTER
$("#formCancel").submit(function(){
	  $.ajax({
	    type: "POST",

	    }).done(function( msg ) {
	    });

	  return false; // Impede a mudança de página

	});
//////////

function SearchOpInformation(op){

	var  order ="";
	var  customer ="";
	var  cod_customer ="";
	var  customer ="";
	var  data_inicio ="";
	var  default_data_inicio ="";
	var  primeira_data_inicio ="";
	var  data_entrega ="";
	var  material_num ="";
	var  material_desc ="";
	var  pcs_caixa ="";
	var  cxs_palete ="";
	var  uvar3 ="";
	var  cxs_camada ="";
	var  uvar5 ="";
	var  uvar6 ="";
	var  default_maquina ="";
	var  maquina ="";
	var  uvar11 ="";
	var  uvar21 ="";
	var  uvar51 ="";
	var  uvar61 ="";
	var  pcs_prod ="";
	var  qtde_a_produzir ="";
	var  qtde_op ="";
	var  status ="";
	var  desc_status ="";
	var  function6 ="";
	var  function7 ="";
	var  qtde_camadas ="";
	var  qtde_pallet_prev ="";
	var  qtde_camadas_prev ="";
	var  qtde_caixas_prev ="";
	var  pcs_palete ="";
	var  material_desc ="";

	
     $.ajax({
		 method:"get",
		 dataType:"json",
		 url:"http://10.20.26.28/CronetJVX//pido/getData?p_pido=50000000380&ORDER_NO="+ op +"&p_crosscompany=0&p_format=JSON&p_querytimeout=30&p_userid=PIDO/PIDO@cronet_cpbritu1",
		 success: function(data){

	     order 					= data["collection"]["0"]["ORDER_NO"];
		 customer 				= data["collection"]["0"]["DATE1"];
		 cod_customer 			= data["collection"]["0"]["COD_CLIENTE"];
		 customer 				= data["collection"]["0"]["CLIENTE"];
		 data_inicio 			= data["collection"]["0"]["DATA_INICIO"];
		 default_data_inicio 	= data["collection"]["0"]["DEF_DATA_INICIO"];
		 primeira_data_inicio 	= data["collection"]["0"]["EARLIEST_DATA_INICIO"];
		 data_entrega 			= data["collection"]["0"]["DATA_ENTREGA"];
		 material_num 			= data["collection"]["0"]["MATERIAL_NUM"];
		 material_desc 			= data["collection"]["0"]["DESCRICAO"];
		 pcs_caixa 				= data["collection"]["0"]["PCS_CAIXA"];
		 cxs_palete 			= data["collection"]["0"]["CXS_PALETE"];
		 uvar3 					= data["collection"]["0"]["UVAR3"];
		 cxs_camada 			= data["collection"]["0"]["CXS_CAMADA"];
		 uvar5 					= data["collection"]["0"]["UVAR5"];
		 uvar6 					= data["collection"]["0"]["UVAR6"];
		 default_maquina 		= data["collection"]["0"]["DEF_MAQUINA"];
		 maquina 				= data["collection"]["0"]["MAQUINA"];
		 uvar11 				= data["collection"]["0"]["UVAR11"];
		 uvar21 				= data["collection"]["0"]["UVAR21"];
		 uvar51 				= data["collection"]["0"]["UVAR51"];
		 uvar61 				= data["collection"]["0"]["UVAR61"];
		 pcs_prod 				= data["collection"]["0"]["PCS_PROD"];
		 qtde_a_produzir 		= data["collection"]["0"]["QTDE_A_PROD"];
		 qtde_op 				= data["collection"]["0"]["QTDE_OP"];
		 status 				= data["collection"]["0"]["STATUS"];
		 desc_status 			= data["collection"]["0"]["DESC_STATUS"];
		 function6 				= data["collection"]["0"]["FUNCTION6"];
		 function7 				= data["collection"]["0"]["FUNCTION7"];
		 qtde_camadas 			= data["collection"]["0"]["QTDE_CAMADAS"];
		 qtde_pallet_prev 		= data["collection"]["0"]["QTDE_PALLET_PREV"];
		 qtde_camadas_prev 		= data["collection"]["0"]["QTDE_CAMADAS_PREV"];
		 qtde_caixas_prev 		= data["collection"]["0"]["QTDE_CAIXAS_PREV"];
		 pcs_palete 			= data["collection"]["0"]["PCS_PALETE"];
		 material_desc 			= data["collection"]["0"]["MATERIAL_DESC"];
	     
		 $.post('viewFormReturn.php',
			{
	         order  : order,
			 customer  :  customer,
			 cod_customer  :  cod_customer,
			 customer  :  customer,
			 data_inicio  :  data_inicio,
			 default_data_inicio :  default_data_inicio,
			 primeira_data_inicio  :  primeira_data_inicio,
			 data_entrega  :  data_entrega,
			 material_num  :  material_num,
			 material_desc  :  material_desc,
			 pcs_caixa  :  pcs_caixa,
			 cxs_palete  :  cxs_palete,
			 uvar3  :  uvar3,
			 cxs_camada  :  cxs_camada,
			 uvar5  :  uvar5,
			 uvar6  :  uvar6,
			 default_maquina  :  default_maquina,
			 maquina  : maquina,
			 uvar11  :  uvar11,
			 uvar21  :  uvar21,
			 uvar51  :  uvar51,
			 uvar61  :  uvar61,
			 pcs_prod  :  pcs_prod,
			 qtde_a_produzir  :  qtde_a_produzir,
			 qtde_op  :  qtde_op,
			 status  :  status,
			 desc_status  :  desc_status,
			 function6  :  function6,
			 function7  :  function7,
			 qtde_camadas  :  qtde_camadas,
			 qtde_pallet_prev  :  qtde_pallet_prev,
			 qtde_camadas_prev  :  qtde_camadas_prev,
			 qtde_caixas_prev  :  qtde_caixas_prev,
			 pcs_palete  :  pcs_palete,
			 material_desc  :  material_desc
				         
				  },function(data){
				         	// $("#retorno").html(data);
					        $("#return_result").html(data);           
				  }
			         
				         )  
			 }

		 });
	
}

function SearchPido()
{
	$("#return_result").html('<br><img src="../images/loading_3.gif" width="48px" height="48px"/><br><b>Buscando informa&ccedil;&otilde;es de paletes...</b>').text();
	$.post('viewFormReturn.php',
        {
            op:        $("#txt_search_order").val(),
         
        },function(data){
        	setTimeout(function(){
        							$("#search-order").hide();
        							$("#return_result").html(data);
        						    
        						 }, 3000);
                        }
         
         )   
  
}

function CancelOrder(order)
{
	if (window.confirm(unescape("Deseja realmente cancelar as fichas da ordem de produ\u00e7\u00e3o "+ order +"?"))) {				
	$.post('../br.schott.com.util/CancelGeneratedOrder.php',
        {
            order:        $("#txt_cancel_order").val(),
         
        }, function(data) {
			$("#return_result").html(data);
		}   
         
         )
        $("#txt_cancel_order").val(''); 
          
	}
}

function SearchReleasedPallets()
{
	var msg = "Buscando Paletes Liberados";
	$("#return_result").html('<br><img src="../Images/loading_3.gif" width="48px" height="48px"/><br><b>'+msg+'</b>').text();
	$.post('viewSearchReleasedPallets.php',
        {},function(data){
        	setTimeout(function(){$("#return_result").html(data)}, 1000);
                        }
         
         )   
  
}

function SearchTransferredPallets()
{
	var msg = "Buscando Paletes Tranferidos";
	$("#return_result").html('<br><img src="../Images/loading_3.gif" width="48px" height="48px"/><br><b>'+msg+'</b>').text();
	$.post('viewSearchTransferredPallets.php',
        {},function(data){
        	setTimeout(function(){$("#return_result").html(data)}, 1000);
                        }
         
         )   
  
}

function SearchNotReleasedPallets()
{
	var msg = "Buscando Paletes N&atilde;o Liberados";
	$("#return_result").html('<br><img src="../Images/loading_3.gif" width="48px" height="48px"/><br><b>'+msg+'</b>').text();
	$.post('viewSearchNotReleasedPallets.php',
        {},function(data){
        	setTimeout(function(){$("#return_result").html(data)}, 1000);
                        }
         
         )   
  
}

function SaveDataReleaseadPallet(order,machine,material,materialDesc,quantity,pallet,index) {
	
	if (window.confirm(unescape("Deseja realmente Liberar o palete "+ pallet +" ?"))) {				
	$.post('../br.schott.com.util/SaveDataReleasedPallet.php', {
					order    : order,
					machine    : machine,
					material : material,
					materialDesc : materialDesc,
					pallet: pallet,
					quantity:quantity
				}, function(data) {
					$("#return_result_data").html(data);
				}
	
				)
				MarkField(index);
	}		

}

function UpdateDataReleaseadPallet(order,machine,material,materialDesc,quantity,pallet,index) {

	if (window.confirm(unescape("Deseja realmente Liberar o palete "+ pallet +" ?"))) {				
	$.post('../br.schott.com.util/UpdateDataReleasedPallet.php', {
					order    : order,
					machine    : machine,
					material : material,
					materialDesc : materialDesc,
					pallet: pallet,
					quantity:quantity
				}, function(data) {
					$("#return_result_data").html(data);
				}
	
				)
				MarkField(index);
	}		

}

function MarkField(index)
{
	//Dois botões invisiveis para acertar o tamanho da linha da tabela
	$("#liberar"+index).html("<button style='visibility: hidden;'>1</button><font color='green'><b>Liberado</b></font><button style='visibility: hidden;'>1</button>");
  
}

function MarkPallet(palletSelected)
{
	
	var palletNo = prompt(decodeURIComponent("Insira o n\u00FAmero do palete") , "");
	
		
		if(palletNo == palletSelected){	
			$.post('../br.schott.com.util/UpdateDataTransferredPallet.php', {
				pallet: palletNo,
					}, function() {
						$("#liberados").focus();
						SearchReleasedPallets();
					}
		
					)
		}else{alert('Palete selecionado diferente de palete bipado! Selecione o palete correto!')}			
				
}

function ReturnPallet(palletSelected)
{
	
	var palletNo = prompt(decodeURIComponent("Insira o n\u00FAmero do palete para retorno"), "");
	
	if(palletNo == palletSelected){	
			$.post('../br.schott.com.util/UpdateReturnPallet.php', {
				pallet: palletNo,
					}, function() {
						$("#liberados").focus();
						SearchReleasedPallets();
					}
		
					)
		}else{alert('Palete selecionado diferente de palete bipado! Selecione o palete correto!')}			
				
}

function closePrint() {
	  document.body.removeChild(this.__container__);
	  
	}

function setPrint() {
	  this.contentWindow.__container__ = this;
	  this.contentWindow.onbeforeunload = closePrint;
	  this.contentWindow.onafterprint = closePrint;
	  this.contentWindow.focus(); // Required for IE
	  this.contentWindow.print();
}

function printPage (sURL) {
	  var oHiddFrame = document.createElement("iframe");
	  oHiddFrame.height = 1;
	  oHiddFrame.width = 1;
	  oHiddFrame.onload = setPrint;
	 
	  oHiddFrame.style.visibility = "visible";
	  oHiddFrame.style.position = "fixed";
	  oHiddFrame.style.right = "0";
	  oHiddFrame.style.bottom = "0";
	  oHiddFrame.src = sURL;
	  
	  document.body.appendChild(oHiddFrame);
	 

	}

function SaveDataGeneratedPallet(order,machine,material,materialDesc,quantity,pallet,boxqty,trayqty) {
	//if (window.confirm("Confirmar a gera\u00e7\u00e3o dos paletes da OP "+ order +" ?")) {				
	$.post('../br.schott.com.util/SaveDataGeneratedPallet.php', {
					order    : order,
					machine    : machine,
					material : material,
					materialDesc : materialDesc,
					quantity:quantity,
					pallet: pallet,
					boxqty:boxqty,
					trayqty:trayqty
				}, function(data) {
					$("#confirmGeneratedPallet").html("<div class='flash notice' align='center'>Fichas liberadas</div>");
					$("#return_result_data").html(data);
				}
	
				)

			//}		

}