<?php
namespace Util;

use Connection\connection;


class Util extends connection
{
   
   private $op;
   private $pallet; 
   private $unity;
   private $secao;
   
 

    /**
     * @return the $unity
     */
    public function getUnity()
    {
        return $this->unity;
    }

    
    /**
     * @param field_type $unity
     */
    public function setUnity($unity)
    {
        $this->unity = $unity;
    }


    /**
     * @return the $secao
     */
    public function getSecao()
    {
        return $this->secao;
    }

/**
     * @param field_type $secao
     */
    public function setSecao($secao)
    {
        $this->secao = $secao;
    }

    /**
     * @return the $op
     */
    public function getOp()
    {
        return $this->op;
    }

    /**
     * @param field_type $op
     */
    public function setOp($op)
    {
        $this->op = $op;
    }

    /**
     * @return the $pallet
     */
    public function getPallet()
    {
        return $this->pallet;
    }

    /**
     * @param field_type $pallet
     */
    public function setPallet($pallet)
    {
        $this->pallet = $pallet;
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

