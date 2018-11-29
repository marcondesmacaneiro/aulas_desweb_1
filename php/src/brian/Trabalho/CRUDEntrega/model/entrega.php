<?php

class Entrega{
    private $codigo;
    private $tipo;
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getInstancia();
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    public function inserir(){
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "INSERT INTO entrega.tbentrega (enttipo) "  
                . "VALUES ('{$this->tipo}')";
        $oRes = $this->conexao->query($sSql);
        $iQtdLinhas = pg_affected_rows($oRes);
        
        if($iQtdLinhas > 0){
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }
    
    //MÉTODO DE ALTERAÇÃO DE DADOS
    public function alterar(){
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "UPDATE entrega.tbentrega "
                . "SET enttipo = '{$this->tipo}' "
                . "WHERE entcodigo = {$this->codigo}";
        $oRes = $this->conexao->query($sSql);
        $iQtdLinhas = pg_affected_rows($oRes);
        if($iQtdLinhas > 0){
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }
    
    //MÉTODO DE EXCLUSÃO DE DADOS
    public function deletar(){
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "DELETE FROM entrega.tbentrega "  
                . "WHERE entcodigo = '{$this->codigo}'";
        $oRes = $this->conexao->query($sSql);
        $iQtdLinhas = pg_affected_rows($oRes); 
        if($iQtdLinhas > 0){ 
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }
    
    //MÉTODO DE SELEÇÃO DE DADOS
    public function selecionar(){
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $oEntrega = new Entrega();
        $sSql = "SELECT * FROM entrega.tbentrega "
                . "WHERE entcodigo = {$this->codigo}";
        $oRes = $this->conexao->query($sSql);
        $aEntrega = pg_fetch_array($oRes); 
        if($aEntrega){
            $oEntrega->setCodigo($aEntrega[0]); 
            $oEntrega->setTipo($aEntrega[1]); 
            $this->conexao->close();
            return $oEntrega;
        }
        else{
            return false;
        }
    }
    
    //MÈTODO PARA LISTAR OS DADOS DA TABELA
    public function listar(){
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres"); 
        $aEntrega = Array();                                                                           
        $sSql = "SELECT * FROM entrega.tbentrega";  
        $oRes = $this->conexao->query($sSql);
        
        while($oEntregaBanco = pg_fetch_assoc($oRes)){ 
            $oEntrega = new Entrega();
            $oEntrega->setCodigo($oEntregaBanco['entcodigo']); 
            $oEntrega->setTipo($oEntregaBanco['enttipo']); 
            $aEntrega[] = $oEntrega;
        }
        $this->conexao->close(); //FECHA A CONEXAO COM O BANCO DE DADOS
        return $aEntrega; //RETORNA UM ARRAY COM OS RESULTADOS DA REPETIÇÃO
    }

}

