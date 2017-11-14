<?php
namespace Connection;

error_reporting(0);
ini_set('display_errors', FALSE);

header('Content-type: text/html; charset=ISO-8859-1');


class connection /* Conexão com o PIDO e retorno JSON*/
{
    /* Search OP*/
   
    
    private $userPido = 'PIDO';

    private $pwdPido = 'PIDO';

    private $orderNo;
    
    private $codeCustomer;

    private $customer;

    private $materialNumber;

    private $materialDescription;
    
    private $materialDesc;

    private $machine;

    private $descStatus;

    private $opQuantity;

    private $startDate;

    private $producedPieces;

    private $deliveryDate;

    private $quantityToProduce;

    private $boxPerLayer;

    private $boxPerPallet;

    private $piecesPerPallet;

    private $quantityOfLayers;

    private $piecesPerBox;
    
    private $boxPredictedQuantity;
    
    private $palletPredictedQuantity;
    
    private $layerPredictedQuantity;
    
    private $errorMessage;
    
    
    
    /* Search Packaging*/
    
    private $codeItem;
    
    private $itemQuantity;
    
    private $itemUnity;
    
    private $itemDescription;
    
    private $quantityMaterial;
    
    /* Search Pallet*/

    private $confirmedNoPallet;
    
    private $confirmedBoxQuantity;
    
    private $confirmedLayerQuantity;
    
    private $confirmedApprovedQuantity;
    
    private $confirmedBoxPerLayer;
    
    private $quantityPallet;
    
    private $lineNumber;
    
    /* Search PalletNo*/
    
    private $palletNoBoxPerLayer;
   
    private $palletNoBoxPerPallet;
    
    private $palletNoPalletNo;
    
    private $palletNoLayerQuantity;
    
    private $palletNoPiecesInPallet;
    
    private $palletNoPiecesInBox;
    
    private $quantityPalletNo;
    
    /* Search OP*/
       
    /**
     *
     * @return the $login
     */
    private function getLogin()
    {
        return $this->userPido . '/' . $this->pwdPido;
    }
    

    /**
     *
     * @return the $Order
     */
    public function getOrderNo()
    {
        return $this->orderNo;
    }

    /**
     *
     * @return the $boxPredictedQuantity
     */
    public function getBoxPredictedQuantity()
    {
        return $this->boxPredictedQuantity;
    }
    /**
     *
     * @return the $palletPredictedQuantity
     */
    public function getPalletPredictedQuantity()
    {
        return $this->palletPredictedQuantity;
    }
    /**
     *
     * @return the $layerPredictedQuantity
     */
    public function getLayerPredictedQuantity()
    {
        return $this->layerPredictedQuantity;
    }
    

    /**
     *
     * @return the $codeCustomer
     */
    public function getCodeCustomer()
    {
        return $this->codeCustomer;
    }

    /**
     *
     * @return the $customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     *
     * @return the $materialNumber
     */
    public function getMaterialNumber()
    {
        return $this->materialNumber;
    }

    /**
     *
     * @return the $materialDescription
     */
    public function getMaterialDescription()
    {
        return $this->materialDescription;
    }

    /**
     * @return the $materialDesc
     */
    public function getMaterialDesc()
    {
        return $this->materialDesc;
    }

    /**
     *
     * @return the $machine
     */
    public function getMachine()
    {
        return $this->machine;
    }

    /**
     *
     * @return the $descStatus
     */
    public function getDescStatus()
    {
        return $this->descStatus;
    }

    /**
     *
     * @return the $opQuantity
     */
    public function getOpQuantity()
    {
        return $this->opQuantity;
    }
    
    

    /**
     * @param mixed $opQuantity
     */
    public function setOpQuantity($opQuantity)
    {
        $this->opQuantity = $opQuantity;
    }
    
    

    /**
     *
     * @return the $startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     *
     * @return the $producedPieces
     */
    public function getProducedPieces()
    {
        return $this->producedPieces;
    }

    /**
     *
     * @return the $deliveryDate
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     *
     * @return the $quantityToProduce
     */
    public function getQuantityToProduce()
    {
        return $this->quantityToProduce;
    }

    /**
     *
     * @return the $boxPerLayer
     */
    public function getBoxPerLayer()
    {
        return $this->boxPerLayer;
    }

    /**
     *
     * @return the $boxPerPallet
     */
    public function getBoxPerPallet()
    {
        return $this->boxPerPallet;
    }

    /**
     *
     * @return the $piecesPerPallet
     */
    public function getPiecesPerPallet()
    {
        return $this->piecesPerPallet;
    }

    /**
     *
     * @return the $quantityOfLayers
     */
    public function getQuantityOfLayers()
    {
        return $this->quantityOfLayers;
    }

    /**
     *
     * @return the $piecesPerBox
     */
    public function getPiecesPerBox()
    {
        return $this->piecesPerBox;
    }



    /* Search Materiais*/
    /**
     * @return the $codeItem
     */
    public function getCodeItem()
    {
        return $this->codeItem;
    }
    
    /**
     * @return the $itemQuantity
     */
    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }
    
    /**
     * @return the $itemUnity
     */
    public function getItemUnity()
    {
        return $this->itemUnity;
    }
    
    /**
     * @return the $itemDescription
     */
    public function getItemDescription()
    {
        return $this->itemDescription;
    }
    
    /**
     * @return the $itemDescription
     */
    public function getQuantityMaterial()
    {
        return $this->quantityMaterial;
    }
    
    /**
     * @return the $errorMessage
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
    
    /**
     * @param field_type $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }
       
    /* Search Pallets*/
    
    
    
    /**
     * @return the $confirmedNoPallet
     */
    public function getConfirmedNoPallet()
    {
        return $this->confirmedNoPallet;
    }

    /**
     * @return the $confirmedBoxQuantity
     */
    public function getConfirmedBoxQuantity()
    {
        return $this->confirmedBoxQuantity;
    }

    /**
     * @return the $confirmedLayerQuantity
     */
    public function getConfirmedLayerQuantity()
    {
        return $this->confirmedLayerQuantity;
    }

    /**
     * @return the $confirmedApprovedQuantity
     */
    public function getConfirmedApprovedQuantity()
    {
        return $this->confirmedApprovedQuantity;
    }

    /**
     * @return the $confirmedApprovedQuantity
     */
    public function getConfirmedBoxPerLayer()
    {
        return $this->confirmedBoxPerLayer;
    }
    
    /**
     * @return the $quantityPallet
     */
    public function getQuantityPallet()
    {
        return $this->quantityPallet;
    }
    
    /**
     * @return the $lineNumber
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }
    

    /**
     * @param the field_type $quantityMaterial
     */
    private function setQuantityMaterial($quantityMaterial)
    {
        $this->quantityMaterial = $quantityMaterial;
    }
    
    /**
     * @param field_type $quantityPallet
     */
    private function setQuantityPallet($quantityPallet)
    {
        $this->quantityPallet = $quantityPallet;
    }
    
    /**
     * @param field_type $quantityPalletNo
     */
    private function setQuantityPalletNo($quantityPalletNo)
    {
        $this->quantityPalletNo = $quantityPalletNo;
    }
    
    /////////////////////////
    /* Search PalletNo*/
    
    
    
    /**
     * @return the $PalletNoBoxPerLayer
     */
    public function getPalletNoBoxPerLayer()
    {
        return $this->palletNoBoxPerLayer;
    }

    /**
     * @return the $PalletNoBoxQuantity
     */
    public function getPalletNoBoxPerPallet()
    {
        return $this->palletNoBoxPerPallet;
    }

    /**
     * @return the $PalletNoPalletNo
     */
    public function getPalletNoPalletNo()
    {
        return $this->palletNoPalletNo;
    }

    /**
     * @return the $PalletNoLayerQuantity
     */
    public function getPalletNoLayerQuantity()
    {
        return $this->palletNoLayerQuantity;
    }

    /**
     * @return the $PalletNoPiecesInPallet
     */
    public function getPalletNoPiecesInPallet()
    {
        return $this->palletNoPiecesInPallet;
    }
    
    /**
     * @return the $PalletNoPiecesInBox
     */
    public function getPalletNoPiecesInBox()
    {
        return $this->palletNoPiecesInBox;
    }
    
    /**
     * @return the $quantityPalletNo
     */
    public function getQuantityPalletNo()
    {
        return $this->quantityPalletNo;
    }
    

    /* Busca informações da OP */
    function searchOP($op)
    {
        
        // Relatório no PIDO - DSCI_PPDS_FPA
        $urlOp = 'http://10.20.26.28/CronetJVX//pido/getData?p_pido=50000000380&ORDER_NO=' . $op . '&p_crosscompany=0&p_format=JSON&p_querytimeout=60&p_userid=' . $this->getLogin() . '@cronet_cpbritu1';
        
        $jsonFile = file_get_contents($urlOp);
        $jsonStr = json_decode($jsonFile, true);
        $records = $jsonStr['collection'];
        
        
        if($records!=null){
        $this->orderNo = $records[0]['ORDER_NO'];
        $this->codeCustomer = $records[0]['COD_CLIENTE'];
        $this->customer = $records[0]['CLIENTE'];
        $this->materialNumber = $records[0]['MATERIAL_NUM'];
        $this->materialDescription = $records[0]['DESCRICAO'];
        $this->materialDesc = $records[0]['MATERIAL_DESC'];
        
        if($records[0]['MAQUINA']!=null){
        $this->machine = $records[0]['MAQUINA'];
        }else{$this->machine = $records[0]['DEF_MAQUINA'];}
        
        $this->descStatus = $records[0]['DESC_STATUS'];
        $this->opQuantity = (int)$records[0]['QTDE_OP'];
        
//         if($records[0]['DATA_INICIO']!=null){
//         $this->startDate = date('d/m/Y', strtotime($records[0]['DATA_INICIO']));
//         }else{$this->startDate = date('d/m/Y', strtotime($records[0]['DEF_DATA_INICIO']));}
        $this->startDate = date('d/m/Y', strtotime($records[0]['EARLIEST_DATA_INICIO']));
        $this->producedPieces = str_replace(',', '.', number_format($records[0]['PCS_PROD']));
        $this->deliveryDate = date('d/m/Y', strtotime($records[0]['DATA_ENTREGA']));
        $this->quantityToProduce = str_replace(',', '.', number_format($records[0]['QTDE_A_PROD']));
        $this->boxPerLayer = (int) $records[0]['CXS_CAMADA'];
        $this->boxPerPallet = (int) $records[0]['CXS_PALETE'];
        $this->piecesPerPallet = str_replace(',', '.', number_format($records[0]['PCS_PALETE']));
        $this->quantityOfLayers = (int) $records[0]['QTDE_CAMADAS'];
        $this->piecesPerBox = (int)$records[0]['PCS_CAIXA'];
        $this->boxPredictedQuantity = $records[0]['QTDE_CAIXAS_PREV'];
        $this->layerPredictedQuantity = (int)$records[0]['QTDE_CAMADAS_PREV'];
        $this->palletPredictedQuantity = (int)$records[0]['QTDE_PALLET_PREV'];
        }else{$this->setErrorMessage(1);}
        

    }

    /* Busca informações de paletes bipados por OP */
    function searchPallets($op)
    {
        
        // Relatório no PIDO - DSCI_liberacao_pallet_FPA
        $urlPallets = 'http://10.20.26.28/CronetJVX//pido/getData?p_pido=50000000435&ORDER_NO=' . $op . '&p_crosscompany=1&p_format=JSON&p_querytimeout=30&p_userid=' . $this->getLogin() . '@cronet_cpbritu1';
        
        $jsonFile = file_get_contents($urlPallets);
        $jsonStr = json_decode($jsonFile, true);
        $records = $jsonStr['collection'];
        
        

        $this->setQuantityPallet(count($records));
        
        foreach ($records as $confirmedBoxPerLayer){
            $this->confirmedBoxPerLayer[] = $confirmedBoxPerLayer['UVAR4'];
        }
        
        foreach ($records as $confirmedNoPallet){
            $this->confirmedNoPallet[] = $confirmedNoPallet['PALLETE_NUM'];
        }
        
        foreach ($records as $confirmedBoxQuantity){
            $this->confirmedBoxQuantity[] = $confirmedBoxQuantity['CXS_PALETE'];
        }
        
        foreach ($records as $confirmedLayerQuantity){
            $this->confirmedLayerQuantity[] = (int)$confirmedLayerQuantity['QTDE_CAMADAS'];
        }
        
        foreach ($records as $confirmedApprovedQuantity){
            $this->confirmedApprovedQuantity[] = $confirmedApprovedQuantity['QTDE_APROVADA'];
        }
        
        foreach ($records as $lineNumber){
            $this->lineNumber[] = $lineNumber['LINE_NUMBER'];
        }

    }
       
    /* Busca informações unitárias de paletes bipados por OP e númeor do palete */
    function searchPalletsNo($op, $pallet)
    {
        
        // Relatório no PIDO - DSCI_liberacao_pallet_unit_FPA
        $urlPalletsNo = 'http://10.20.26.28/CronetJVX//pido/getData?p_pido=50000000445&ORDER_NO='.$op.'&PALETTE_NO='.$pallet.'&p_crosscompany=1&p_format=JSON&p_querytimeout=30&p_userid='. $this->getLogin() .'@cronet_cpbritu1';
        
        $jsonFile = file_get_contents($urlPalletsNo);
        $jsonStr = json_decode($jsonFile, true);
        $records = $jsonStr['collection'];
        
        $this->setQuantityPalletNo(count($records));

        $this->palletNoBoxPerLayer = $records[0]['UVAR4'];
        $this->palletNoBoxPerPallet = $records[0]['FUNCTION'];
        $this->palletNoPalletNo = $records[0]['PALETTE_NO'];
        $this->palletNoLayerQuantity = (int)$records[0]['FUNCTION7'];
        $this->palletNoPiecesInPallet = $records[0]['FUNCTION3'];

    }
   
    /* Busca materiais de embalagem do palete */
    function searchMaterials($op)
    {
        
        // Relatório no PIDO - PPB_BOM_PACKING_FPA
        $urlMaterials = 'http://10.20.26.28/CronetJVX//pido/getData?p_pido=50000000407&ORDER_NO=' . $op . '&p_crosscompany=0&p_format=JSON&p_querytimeout=30&p_userid=' . $this->getLogin() . '@cronet_cpbritu1';
        
        $jsonFile = file_get_contents($urlMaterials);
        $jsonStr = json_decode($jsonFile, true);
        $records = $jsonStr['collection'];
        
        $this->setQuantityMaterial(count($records));
        
        foreach ($records as $codMaterial){
            $this->codeItem[] = $codMaterial['COD_ITEM'];
        }
        
        foreach ($records as $itemQuantity){
            $this->itemQuantity[] = $itemQuantity['QUANTIDADE'];
        }
        
        foreach ($records as $itemUnity){
            $this->itemUnity[] = $itemUnity['UNIDADE'];
        }
        
        foreach ($records as $itemDescription){
            $this->itemDescription[] = $itemDescription['DESCRICAO'];
        }
        
    }
    
    public function leftover($total_qtde_caixas,$total_caixas_palete){
        
        if ($total_qtde_caixas>$total_caixas_palete){
            $result =  $total_qtde_caixas - $total_caixas_palete;
            return $result;
        }
        
    }
    
    
    public function calcPredicatedBox($pcs_caixa,$qtde_camadas_prev,$qtde_caixas_palete){
        
        return  $qtde_camadas_prev * $qtde_caixas_palete * $pcs_caixa;
        
    }
    
    
    /**
     * @param integer $predicatedBoxQuantity - resultado da função calcPredicatedBox - Calculo de caixas previstas
     * @param integer $boxPerLayer - valor que vem da consulta WEB ao PIDO que retorna o valor de caixas por camada
     * @return resultado da divisão de "quantidade de caixas previstas" pela "quantidade de caixas por camada" arredondado para cima no qual faz parte do calculo de camadas
     * No calculo da funcão calcPredictedLayer não se faz a divisão pela quantidade de paletes pois essa função é usada em um laço
     * que dividiria, em todas as etiquetas a quantidade de camadas pela quantidade de paletes, trazendo a quanitidade errada
     */
    public function calcPredicatedLayers($predicatedBoxQuantity, $boxPerLayer){
        
        return  ceil($predicatedBoxQuantity / $boxPerLayer);
        
    }
    
    public function calcPredicatedPieces($predicatedBoxQuantity, $boxPerLayer){
        
        return  round($predicatedBoxQuantity / $boxPerLayer);
        
    }
    
    
}

Class Connect_users{ /* Conexão com a base de dados de usuários e retorna autenticação*/
    //Local Access
    //protected $host = 'SBRIPVW720019';
      /*
    protected $host = 'localhost';
    protected $user = 'postgres';
    protected $pswd = 'schott';
    protected $dbname = 'integration_users';
    protected $con = null;
     */
    
  
     protected $host = '10.20.29.247';
     protected $user = 'integration_users';
     protected $pswd = 'users';
     protected $dbname = 'integration_users';
     protected $con = null;
    
    
    function __construct(){} //metodo construtor
    
    #metodo que inicia conexao
    function open(){
        $this->con = @pg_connect("host=$this->host user=$this->user
    password=$this->pswd dbname=$this->dbname");
        return $this->con;
    }
    
    #metodo que encerra a conexao
    function close(){
        @pg_close($this->con);
    }
    
    #metodo verifica status da conexao
    function statusCon(){
        if($this->con){
            echo "<h3>O sistema esta conectado a   [$this->dbname] em [$this->host].</h3>";
            exit;
        }
        else{
            echo "<h3>O sistema nao esta conectado a  [$this->dbname] em [$this->host].</h3>";
        }
    }
    
}

Class Connect_ReleasedPallets{
    //Local Access
    //protected $host = 'SBRIPVW720019';
   /* 
    protected $host = 'localhost';
    protected $user = 'fpp';
    protected $pswd = 'fpp';
    protected $dbname = 'fpp';
    protected $con = null;

     */
    
     protected $host = '10.20.29.247';
     protected $user = 'fpp';
     protected $pswd = 'fpp';
     protected $dbname = 'fpp';
     protected $con = null;
    
    
    function __construct(){} //metodo construtor
    
    #metodo que inicia conexao
    function open(){
        $this->con = @pg_connect("host=$this->host user=$this->user
    password=$this->pswd dbname=$this->dbname");
        return $this->con;
    }
    
    #metodo que encerra a conexao
    function close(){
        @pg_close($this->con);
    }
    
    #metodo verifica status da conexao
    function statusCon(){
        if($this->con){
            echo "<h3>O sistema esta conectado a   [$this->dbname] em [$this->host].</h3>";
            exit;
        }
        else{
            echo "<h3>O sistema nao esta conectado a  [$this->dbname] em [$this->host].</h3>";
        }
    }
    
    
    
}