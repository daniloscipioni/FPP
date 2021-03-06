<?php
session_start();
use Connection\Connect_users;
use Connection\Connect_ReleasedPallets;

//session_start();
require 'connection.php';


class Access_users extends Connect_users{
    
    /* Variaveis de usuários */
    public $id_user;
    public $cd_user;
    public $nm_user;
    public $nm_setor;
    public $fpp_permission;
    public $fpp_desc_permission;
    /* -- */
    
    function Login($id)
    {
        $sql = "select id_user,cd_user,nm_user,nm_setor,fpp_permission,fpp_desc_permission from users.tbl_user_login where cd_user = '$id'";
        
       
        $conn = new Connect_users();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        $i = 1;
        while ($row = pg_fetch_array($query)) {
            
            $this->id_user[$i] = $row['id_user'];
            $this->cd_user[$i] = $row['cd_user'];
            $this->nm_user[$i] = $row['nm_user'];
            $this->nm_setor[$i] = $row['nm_setor'];
            $this->fpp_permission[$i] = $row['fpp_permission'];
            $this->fpp_desc_permission[$i] = $row['fpp_desc_permission'];
            $i ++;
            
        }
        
        $conn->close();
    }
}


Class Access_ReleasedPallets extends Connect_ReleasedPallets{
    
    public $num_rows;
    
    private $emission_date;
    private $order_no;
    private $pallet_no;
    private $prod_sap;
    private $desc_prod_sap;
    private $paleteQty;
    private $ReleasedPalletNo;
    private $timesleep;
    private $daysleep;
    private $hoursleep;
    private $minutesleep;
    private $machine;
    private $ready;
    private $maxPieces;
    private $prodPieces;
    private $completePalete;
    private $releasedResp;
    private $transfResp;
    
    
    private $notReleasedOrderNo;
    private $notReleasedPalletNo;
    private $notReleasedMachine;
    private $notReleasedReady;
    private $notReleasedMaxPieces;
    private $notReleasedProdPieces;
    private $notReleasedCodMaterial;
    private $notReleasedDescMaterial;
    private $notReleasedQuantity;
    private $notReleasedCompletePalete;
    
    
    private $AuxiliarNotReleasedOrderNo;
    private $AuxiliarNotReleasedPalletNo;
    private $AuxiliarNotReleasedMachine;
    private $AuxiliarNotReleasedReady;
    private $AuxiliarNotReleasedMaxPieces;
    private $AuxiliarNotReleasedProdPieces;
    private $AuxiliarNotReleasedCodMaterial;
    private $AuxiliarnotReleasedDescMaterial;
    private $AuxiliarnotReleasedCompletePalete;
    
    
    /* Declara��o das variaveis de vetor - vetor de paletes aprovados e n�o aprovados */
    public $arrReleased;
    public $arrNotReleased;
    
   


    /**
     * @return the $transfResp
     */
    public function getTransfResp()
    {
        return $this->transfResp;
    }

    
     /**
     * @return the $releasedResp
     */
    public function getReleasedResp()
    {
        return $this->releasedResp;
    }

    /**
     * @return the $completePalete
     */
    public function getCompletePalete()
    {
        return $this->completePalete;
    }

    /**
     * @return the $notReleasedCompletePalete
     */
    public function getNotReleasedCompletePalete()
    {
        return $this->notReleasedCompletePalete;
    }

    /**
     * @return the $AuxiliarnotReleasedCompletePalete
     */
    public function getAuxiliarnotReleasedCompletePalete()
    {
        return $this->AuxiliarnotReleasedCompletePalete;
    }

    /**
     * @return the $notReleasedMaxPieces
     */
    public function getNotReleasedMaxPieces()
    {
        return $this->notReleasedMaxPieces;
    }

    /**
     * @return the $notReleasedProdPieces
     */
    public function getNotReleasedProdPieces()
    {
        return $this->notReleasedProdPieces;
    }

    /**
     * @return the $AuxiliarNotReleasedMaxPieces
     */
    public function getAuxiliarNotReleasedMaxPieces()
    {
        return $this->AuxiliarNotReleasedMaxPieces;
    }

    /**
     * @return the $AuxiliarNotReleasedProdPieces
     */
    public function getAuxiliarNotReleasedProdPieces()
    {
        return $this->AuxiliarNotReleasedProdPieces;
    }

    /**
     * @return the $ready
     */
    public function getReady()
    {
        return $this->ready;
    }

    /**
     * @return the $notReleasedReady
     */
    public function getNotReleasedReady()
    {
        return $this->notReleasedReady;
    }

    /**
     * @return the $AuxiliarNotReleasedReady
     */
    public function getAuxiliarNotReleasedReady()
    {
        return $this->AuxiliarNotReleasedReady;
    }

    /**
     * @return the $notReleasedMachine
     */
    public function getNotReleasedMachine()
    {
        return $this->notReleasedMachine;
    }

    /**
     * @return the $AuxiliarNotReleasedMachine
     */
    public function getAuxiliarNotReleasedMachine()
    {
        return $this->AuxiliarNotReleasedMachine;
    }

    /**
     * @return the $timesleep
     */
    public function getTimesleep()
    {
        return $this->timesleep;
    }

    /**
     * @return the $daysleep
     */
    public function getDaysleep()
    {
        return $this->daysleep;
    }

    /**
     * @return the $hoursleep
     */
    public function getHoursleep()
    {
        return $this->hoursleep;
    }

    
     /**
     * @return the $minutesleep
     */
    public function getMinutesleep()
    {
        return $this->minutesleep;
    }

    /**
     * @return the $AuxiliarNotReleasedOrderNo
     */
    public function getAuxiliarNotReleasedOrderNo()
    {
        return $this->AuxiliarNotReleasedOrderNo;
    }

    /**
     * @return the $AuxiliarNotReleasedPalletNo
     */
    public function getAuxiliarNotReleasedPalletNo()
    {
        return $this->AuxiliarNotReleasedPalletNo;
    }

    /**
     * @return the $AuxiliarNotReleasedCodMaterial
     */
    public function getAuxiliarNotReleasedCodMaterial()
    {
        return $this->AuxiliarNotReleasedCodMaterial;
    }

    /**
     * @return the $AuxiliarnotReleasedDescMaterial
     */
    public function getAuxiliarnotReleasedDescMaterial()
    {
        return $this->AuxiliarnotReleasedDescMaterial;
    }

    /**
     * @return the $notReleasedCodMaterial
     */
    public function getNotReleasedCodMaterial()
    {
        return $this->notReleasedCodMaterial;
    }

    /**
     * @return the $notReleasedDescMaterial
     */
    public function getNotReleasedDescMaterial()
    {
        return $this->notReleasedDescMaterial;
    }

    /**
     * @param field_type $notReleasedCodMaterial
     */
    public function setNotReleasedCodMaterial($notReleasedCodMaterial)
    {
        $this->notReleasedCodMaterial = $notReleasedCodMaterial;
    }

    /**
     * @param field_type $notReleasedDescMaterial
     */
    public function setNotReleasedDescMaterial($notReleasedDescMaterial)
    {
        $this->notReleasedDescMaterial = $notReleasedDescMaterial;
    }

    /**
     * @return the $ReleasedPalletNo
     */
    public function getReleasedPalletNo()
    {
        return $this->ReleasedPalletNo;
    }

    /**
     * @param field_type $ReleasedPalletNo
     */
    public function setReleasedPalletNo($ReleasedPalletNo)
    {
        $this->ReleasedPalletNo = $ReleasedPalletNo;
    }

    /**
     * @return the $notReleasedOrderNo
     */
    public function getNotReleasedOrderNo()
    {
        return $this->notReleasedOrderNo;
    }
    
    /**
     * @return the $notReleasedPalletNo
     */
    public function getNotReleasedPalletNo()
    {
        return $this->notReleasedPalletNo;
    }
    
    /**
     * @return the $notReleasedQuantity
     */
    public function getNotReleasedQuantity()
    {
        return $this->notReleasedQuantity;
    }
    
    /**
     * @param field_type $notReleasedQuantity
     */
    private function setNotReleasedQuantity($notReleasedQuantity)
    {
        $this->notReleasedQuantity = $notReleasedQuantity;
    }
    
    
    /**
     * @return the $num_rows
     */
    public function getNum_rows()
    {
        return $this->num_rows;
    }

    /**
     * @return the $emission_date
     */
    public function getEmission_date()
    {
        return $this->emission_date;
    }

    /**
     * @return the $prod_sap
     */
    public function getProd_sap()
    {
        return $this->prod_sap;
    }

    /**
     * @return the $desc_prod_sap
     */
    public function getDesc_prod_sap()
    {
        return $this->desc_prod_sap;
    }

    /**
     * @return the $paleteQty
     */
    public function getPaleteQty()
    {
        return $this->paleteQty;
    }
    
    /**
     * @return the $order_no
     */
    public function getOrder_no()
    {
        return $this->order_no;
    }

    /**
     * @return the $pallet_no
     */
    public function getPallet_no()
    {
        return $this->pallet_no;
    }
 
        /**
     * @return the $machine
     */
    public function getMachine()
    {
        return $this->machine;
    }

    function InsertReleasedPallet($order,$machine,$material,$materialDesc,$quantity,$pallet)
    {
        $sql = "INSERT INTO data.tbl_fpp_released_pallets(prod_sap, machine, desc_prod_sap,order_no, qty_pieces_palete, pallet_no, released_resp)
                VALUES ($material,'$machine','$materialDesc','$order', $quantity ,'$pallet','$_SESSION[cd_user]');";
        
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        if ($query = pg_query($sql))
            try {
                
        } catch (Exception $ex) {
            echo "Dados n�o Salvos";
        }
        
        $conn->close();
        
    }
    
    function InsertGeneratedPallet($order,$machine,$material,$materialDesc,$quantity,$pallet,$boxqty,$trayqty)
    {
        $sql = '';
        $arrquantity = explode(';', $quantity);
        $arrpallet = explode(';', $pallet);
        $arrboxqty = explode(';', $boxqty);
        $arrtrayqty = explode(';', $trayqty);
        

        for ($i=0; $i<count($arrpallet)-1;$i++){
        
        $sql.= "INSERT INTO data.tbl_fpp_generated_card(order_no, machine , prod_sap, desc_prod_sap,qty_pieces_palete,qty_box_palete,qty_tray_box, pallet_no,resp_generated,card_generated,pallet_removed,pallet_released,status)
                VALUES ('$order', '$machine', $material, '$materialDesc', $arrquantity[$i],$arrboxqty[$i],$arrtrayqty[$i],'$arrpallet[$i]','$_SESSION[cd_user]',TRUE,FALSE,FALSE,'1');";
       
        } 
        
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        if ($query = pg_query($sql))
            try {
                
        } catch (Exception $ex) {
            echo "Dados n�o Salvos";
        }
        
        $conn->close();
         
    }
    
    function UpdateTranferredPallet($pallet)
    {
        $sql = "UPDATE data.tbl_fpp_released_pallets SET pallet_removed = true,transf_resp = '$_SESSION[cd_user]' where pallet_no = '$pallet';";
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        if ($query = pg_query($sql))
            try {
                
        } catch (Exception $ex) {
            echo "Dados n�o Atualizados";
        }
        
        $conn->close();
    }
    
    function SearchPalletsConfirm($order)
    {
        $sql = "SELECT 1 FROM data.tbl_fpp_generated_card WHERE order_no = '$order' limit 1;";
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        return $this->num_rows;
        
        $conn->close();
        
    }
    
    /*
    function SearchPallets($pallet)
    {
        $sql = "SELECT 1 FROM data.tbl_fpp_released_pallets WHERE pallet_no ='$pallet';";
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        return $this->num_rows;
        
        $conn->close();
        
    }
    */
    /*
    function SearchReleased()
    {
        
        $sql = "SELECT emission_date,
                       pallet_no,
                       machine, 
                       prod_sap, 
                       desc_prod_sap, 
                       qty_pieces_palete,
                       released_resp, 
		       EXTRACT(DAYS FROM (current_timestamp-emission_date)) ||'dia(s) '|| EXTRACT(HOURS FROM (current_timestamp-emission_date))||'h '|| EXTRACT(MINUTES FROM (current_timestamp-emission_date))||'min ' timesleep,
		       EXTRACT(DAYS FROM (current_timestamp-emission_date)) as daysleep,
		       EXTRACT(HOURS FROM (current_timestamp-emission_date)) as hoursleep,
		       EXTRACT(MINUTES FROM (current_timestamp-emission_date)) as minutesleep
               FROM data.tbl_fpp_released_pallets WHERE pallet_removed is false ORDER BY timesleep DESC";

        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        $i = 1;
        while ($row = pg_fetch_array($query)) {
            
            $this->emission_date[$i] = $row['emission_date'];
            $this->pallet_no[$i] = $row['pallet_no'];
            $this->machine[$i] = $row['machine'];
            $this->paleteQty[$i] = $row['qty_pieces_palete'];
            $this->prod_sap[$i] = $row['prod_sap'];
            $this->desc_prod_sap[$i] = $row['desc_prod_sap'];
            $this->timesleep[$i] = $row['timesleep'];
            $this->daysleep[$i] = $row['daysleep'];
            $this->hoursleep[$i] = $row['hoursleep'];
            $this->minutesleep[$i] = $row['minutesleep'];
            $this->releasedResp[$i] = $row['released_resp'];
            $i ++;
            
        }
        
        $conn->close();
    }
    */
    /*
    function SearchTransferred()
    {
        $sql = "SELECT emission_date, 
                       machine, 
                       pallet_no, 
                       prod_sap, 
                       desc_prod_sap,
                       transf_resp 
                FROM data.tbl_fpp_released_pallets WHERE pallet_removed is true ORDER BY emission_date DESC";
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        $i = 1;
        while ($row = pg_fetch_array($query)) {
            
            $this->emission_date[$i] = $row['emission_date'];
            $this->pallet_no[$i] = $row['pallet_no'];
            $this->machine[$i] = $row['machine'];
            $this->prod_sap[$i] = $row['prod_sap'];
            $this->desc_prod_sap[$i] = $row['desc_prod_sap'];
            $this->transfResp[$i] = $row['transf_resp'];
            $i ++;
            
        }
        
        $conn->close();
    }
    */
    
    function SearchNotReleased(){
        
        $sql = "SELECT pallet_no FROM data.tbl_fpp_released_pallets";
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query); 
       
        
        
        /* Salva os valores dos paletes j� liberados da consulta ao BD POSTGRES */
        while ($row = pg_fetch_assoc($query)) {
            $this->ReleasedPalletNo[] = $row['pallet_no'];
        }
        
       
        // Relat�rio no PIDO - PPB_OPs_em_M�quinas_Pallet
         $urlPallets = 'http://sbritvs0012.bripv.schott.org:80/CronetJVX//pido/getData?p_pido=50000000942&p_crosscompany=1&p_format=JSON&p_querytimeout=180&p_userid=DSCI/DSCI@cronet_cpbritu1';
        
        $jsonFile = file_get_contents($urlPallets);
        $jsonStr = json_decode($jsonFile, true);
        $records = $jsonStr['collection'];

        
        /* Atribui os valores nos vetores da consulta ao relat�rio do PIDO */ 
          foreach ($records as $palletno){
            $this->notReleasedPalletNo[] = $palletno['NO_PALETE'];
          }
          
          foreach ($records as $machine){
              $this->notReleasedMachine[] = $machine['MACHINE'];
          }
          
          foreach ($records as $ready){
              $this->notReleasedReady[] = $ready['READY'];
          }
        
          foreach ($records as $order){
            $this->notReleasedOrderNo[] = $order["ORDEM"];
          } 
        
          foreach ($records as $codMaterial){
            $this->notReleasedCodMaterial[] = $codMaterial['COD_MATERIAL'];
          }
        
          foreach ($records as $descMaterial){
            $this->notReleasedDescMaterial[] = $descMaterial['DESC_MATERIAL'];
          }
          
          foreach ($records as $maxPieces){
              $this->notReleasedMaxPieces[] = $maxPieces['MAX_PIECES'];
          }
          
          foreach ($records as $prodPieces){
              $this->notReleasedProdPieces[] = $prodPieces['PROD_PIECES'];
          }
          
          foreach ($records as $completePalete){
              $this->notReleasedCompletePalete[] = $completePalete['COMPLETE_PALETE'];
          }
         

        
        /* Atribui os valores de n�mero dos paletes liberados no vetor */
         for($i = 0; $i<=$this->num_rows;$i++){
             $releasedPallet[] = trim($this->ReleasedPalletNo[$i]);
         }  
         
                
         /* Atribui os valores de paletes n�o liberados aos respectivos vetores  */
          for($i = 0; $i<=count($records);$i++){
              $noReleasedPallet[] = trim($this->notReleasedPalletNo[$i]);
              $noReleasedOrder[] = trim($this->notReleasedOrderNo[$i]);
              $noReleasedMachine[] = trim($this->notReleasedMachine[$i]);
              $noReleasedReady[] = trim($this->notReleasedReady[$i]);
              $noReleasedCodMaterial[] = trim($this->notReleasedCodMaterial[$i]);
              $noReleasedDescMaterial[] = trim($this->notReleasedDescMaterial[$i]);
              $noReleasedMaxPieces[] = trim($this->notReleasedMaxPieces[$i]);
              $noReleasedProdPieces[] = trim($this->notReleasedProdPieces[$i]);
              $noReleasedCompletePalete[] = trim($this->notReleasedCompletePalete[$i]);             
          }   
    
          /* Diferen�a entre vetores de paletes n�o liberados(do PIDO) e paletes liberados(do BD POSTGRES) */
          $ArrDiference = array_diff($noReleasedPallet,$releasedPallet);
          

          /* Atribui os valores das variaveis da difer�n�a entre paletes liberados e paletes n�o liberados das ordens que est�o rodando em m�quinas   */
          foreach ($ArrDiference as $value){
         
              for($i = 0;$i<=count($noReleasedPallet);$i++){
                  /* Verifica se o valor*/
                  if($value == $noReleasedPallet[$i]){
                      $this->AuxiliarNotReleasedPalletNo[] = $noReleasedPallet[$i];
                      $this->AuxiliarNotReleasedOrderNo[] = $noReleasedOrder[$i];
                      $this->AuxiliarNotReleasedMachine[] = $noReleasedMachine[$i];
                      $this->AuxiliarNotReleasedReady[] = $noReleasedReady[$i];
                      $this->AuxiliarNotReleasedCodMaterial[] = $noReleasedCodMaterial[$i];
                      $this->AuxiliarnotReleasedDescMaterial[] = $noReleasedDescMaterial[$i];
                      $this->AuxiliarNotReleasedMaxPieces[] = $noReleasedMaxPieces[$i];
                      $this->AuxiliarNotReleasedProdPieces[] = $noReleasedProdPieces[$i];
                      $this->AuxiliarnotReleasedCompletePalete[] = $noReleasedCompletePalete[$i];
                  }
              }
             
          }  
      
          /* Atribui a quantidade de itens a variavel que ser� usada na impress�o do resultado  */
          $this->setNotReleasedQuantity(count($ArrDiference));
       
        
    }
        
    function CancelOrder($order){
        $sql = "UPDATE data.tbl_fpp_generated_card SET status = '0' where order_no = '$order';";
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        if ($query = pg_query($sql))
            try {
                
        } catch (Exception $ex) {
            echo "Dados n�o Atualizados";
        }
        
        $conn->close();
    }
    
    function SearchNotReleasedDB()
    {
           
        $sql = "SELECT date_generated,
                       order_no,
                       pallet_no,
                       machine,
                       prod_sap,
                       desc_prod_sap,
                       qty_pieces_palete,
                       resp_released,
		       EXTRACT(DAYS FROM (current_timestamp-date_generated)) ||' dia(s) '|| EXTRACT(HOURS FROM (current_timestamp-date_generated))||'h '|| EXTRACT(MINUTES FROM (current_timestamp-date_generated))||'min ' timesleep,
		       EXTRACT(DAYS FROM (current_timestamp-date_generated)) as daysleep,
		       EXTRACT(HOURS FROM (current_timestamp-date_generated)) as hoursleep,
		       EXTRACT(MINUTES FROM (current_timestamp-date_generated)) as minutesleep
               FROM data.tbl_fpp_generated_card WHERE card_generated is true and pallet_released is false and status = '1' ORDER BY timesleep DESC";
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        $i = 1;
        while ($row = pg_fetch_array($query)) {
            
            $this->emission_date[$i] = date_create($row['date_generated']);
            $this->order_no[$i]  = $row['order_no'];
            $this->pallet_no[$i] = $row['pallet_no'];
            $this->machine[$i] = $row['machine'];
            $this->paleteQty[$i] = $row['qty_pieces_palete'];
            $this->prod_sap[$i] = $row['prod_sap'];
            $this->desc_prod_sap[$i] = $row['desc_prod_sap'];
            $this->timesleep[$i] = $row['timesleep'];
            $this->daysleep[$i] = $row['daysleep'];
            $this->hoursleep[$i] = $row['hoursleep'];
            $this->minutesleep[$i] = $row['minutesleep'];
            $this->releasedResp[$i] = $row['resp_released'];
            $i ++;
            
        }
        
        $conn->close();
    }
     
    function SearchReleasedDB()
    {
        
        $sql = "SELECT date_released,
                       pallet_no,
                       machine,
                       prod_sap,
                       desc_prod_sap,
                       qty_pieces_palete,
                       resp_released,
		       EXTRACT(DAYS FROM (current_timestamp-date_released)) ||' dia(s) '|| EXTRACT(HOURS FROM (current_timestamp-date_released))||'h '|| EXTRACT(MINUTES FROM (current_timestamp-date_released))||'min ' timesleep,
		       EXTRACT(DAYS FROM (current_timestamp-date_released)) as daysleep,
		       EXTRACT(HOURS FROM (current_timestamp-date_released)) as hoursleep,
		       EXTRACT(MINUTES FROM (current_timestamp-date_released)) as minutesleep
               FROM data.tbl_fpp_generated_card WHERE card_generated is true and pallet_released is true and pallet_removed is false ORDER BY timesleep";
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        $i = 1;
        while ($row = pg_fetch_array($query)) {
            
            $this->emission_date[$i] = date_create($row['date_released']);
            $this->pallet_no[$i] = $row['pallet_no'];
            $this->machine[$i] = $row['machine'];
            $this->paleteQty[$i] = $row['qty_pieces_palete'];
            $this->prod_sap[$i] = $row['prod_sap'];
            $this->desc_prod_sap[$i] = $row['desc_prod_sap'];
            $this->timesleep[$i] = $row['timesleep'];
            $this->daysleep[$i] = $row['daysleep'];
            $this->hoursleep[$i] = $row['hoursleep'];
            $this->minutesleep[$i] = $row['minutesleep'];
            $this->releasedResp[$i] = $row['resp_released'];
            $i ++;
            
        }
        
        $conn->close();
    }
    
    function SearchTransferredDB()
    {
        $sql = "SELECT date_transferred,
                       pallet_no,
                       machine,
                       prod_sap,
                       desc_prod_sap,
                       qty_pieces_palete,
                       resp_released,
                       resp_transferred,
		       EXTRACT(DAYS FROM (current_timestamp-date_transferred)) ||'dia(s) '|| EXTRACT(HOURS FROM (current_timestamp-date_transferred))||'h '|| EXTRACT(MINUTES FROM (current_timestamp-date_transferred))||'min ' timesleep,
		       EXTRACT(DAYS FROM (current_timestamp-date_transferred)) as daysleep,
		       EXTRACT(HOURS FROM (current_timestamp-date_transferred)) as hoursleep,
		       EXTRACT(MINUTES FROM (current_timestamp-date_transferred)) as minutesleep
               FROM data.tbl_fpp_generated_card WHERE card_generated is true and pallet_removed is true ORDER BY timesleep DESC";
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        $i = 1;
        while ($row = pg_fetch_array($query)) {
            
            $this->emission_date[$i] = date_create($row['date_transferred']);
            $this->pallet_no[$i] = $row['pallet_no'];
            $this->machine[$i] = $row['machine'];
            $this->paleteQty[$i] = $row['qty_pieces_palete'];
            $this->prod_sap[$i] = $row['prod_sap'];
            $this->desc_prod_sap[$i] = $row['desc_prod_sap'];
            $this->transfResp[$i] = $row['resp_transferred'];
            $this->timesleep[$i] = $row['timesleep'];
            $this->daysleep[$i] = $row['daysleep'];
            $this->hoursleep[$i] = $row['hoursleep'];
            $this->minutesleep[$i] = $row['minutesleep'];
            $this->releasedResp[$i] = $row['resp_released'];
            $i ++;
            
        }
        
        $conn->close();
    }

    function UpdateReleasedPalletDB($pallet)
    {
        $sql = "UPDATE data.tbl_fpp_generated_card SET pallet_released = true, resp_released = '$_SESSION[cd_user]', date_released = now() where pallet_no = '$pallet';";
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        if ($query = pg_query($sql))
            try {
                
        } catch (Exception $ex) {
            echo "Dados n�o Atualizados";
        }
        
        $conn->close();
    }
    
    function UpdateTranferredPalletDB($pallet)
    {
        $sql = "UPDATE data.tbl_fpp_generated_card SET pallet_removed = true,resp_transferred = '$_SESSION[cd_user]', date_transferred=now() where pallet_no = '$pallet';";
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        if ($query = pg_query($sql))
            try {
                
        } catch (Exception $ex) {
            echo "Dados n�o Atualizados";
        }
        
        $conn->close();
    }

    function SearchPalletsDB($pallet)
    {
        $sql = "SELECT 1 FROM data.tbl_fpp_generated_card WHERE pallet_no ='$pallet' and pallet_released is true;";
        
        
        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        return $this->num_rows;
        
        $conn->close();
        
    }
    
    /**
     * @param unknown $order retorna '1' se encontrar a ordem pesquisada e 
     *                       retorna '0' caso n�o existir a order ou j� tiver sido liberada ou se j� tiver sido cancelada
     * @return number
     */
    function SearchOrderDB($order)
    {
        $sql = "select distinct 1 from data.tbl_fpp_generated_card WHERE order_no='$order' and status = '1' 
                and (select count(order_no) from data.tbl_fpp_generated_card WHERE order_no='$order' and pallet_released is true )=0";
        

        $conn = new Connect_ReleasedPallets();
        
        $conn->open();
        
        $query = pg_query($sql);
        
        $this->num_rows = pg_num_rows($query);
        
        return $this->num_rows;
        
        $conn->close();
        
    }
}
?>