<!DOCTYPE html>
<html>
	<head>
	<script src="../js/jquery-3.2.1.min.js?<?php echo time();?>" type="text/javascript"></script>
		<script type="text/javascript">

		
 		function teste(){
 			
		if ($("#idPalletno").val().length>0){
			 value2 = parseInt(new Date().getTime(),10);

			}else{
			  value1 = parseInt(new Date().getTime(),10);
			}
			
	 		  fin = value2 - value1;

			if (fin>=50){


				document.getElementById("formOp").reset();
				alert( "Favor usar o leitor de códigos de barras!");
				
				//$("#idPalletno").val("");
				}
			alert(fin);
			
			} 

	

 		
			
		</script>	
	</head>	

	<body >
		
		 <!-- <main>  -->
		<form id="formOp">
			<input type="text" name="namePalletNo" id="idPalletno" autofocus="autofocus" onkeyup="teste();">
		 </form>
	<!-- 	</main> -->
	
	</body>

</html>



<?php
?>