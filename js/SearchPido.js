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
	if (window.confirm(unescape("Deseja realmente cancelar as etiquetas da ordem de produção "+order +" ?"))) {				
	$.post('../br.schott.com.util/CancelGeneratedOrder.php',
        {
            order:        $("#txt_cancel_order").val(),
         
        }
         
         )   
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
	
	var palletNo = prompt(decodeURIComponent("Insira o n\u00FAmero do palete"), "");
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

function closePrint () {
	  document.body.removeChild(this.__container__);
	  
	}

function setPrint () {
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

function SaveDataGeneratedPallet(order,machine,material,materialDesc,quantity,pallet) {
	if (window.confirm(unescape("Confirmar a geração dos paletes da OP "+ order +" ?"))) {				
	$.post('../br.schott.com.util/SaveDataGeneratedPallet.php', {
					order    : order,
					machine    : machine,
					material : material,
					materialDesc : materialDesc,
					quantity:quantity,
					pallet: pallet
				}, function(data) {
					$("#confirmGeneratedPallet").html("<div class='painel' align='center'>Confirmado!</div>");
					$("#return_result_data").html(data);
				}
	
				)

			}		

}