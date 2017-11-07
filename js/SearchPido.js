function SearchPido()
{
	$("#return_result").html('<br><img src="../images/loading_3.gif" width="48px" height="48px"/><br><b>Calculando previs&atilde;o de paletes</b>').text();
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

function MarkField(index)
{

	$("#liberar"+index).html("<font color='green'><b>Liberado</b></font>");
  
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

