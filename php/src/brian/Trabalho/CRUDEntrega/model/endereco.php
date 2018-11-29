<?php

class Endereco{
    private $codigo;
    private $tipo;
    private $descricao;
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

    public function getDescricao() {
        return $this->descricao;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    //MÉTODO DE INSERÇÃO DE DADOS
    public function inserir(){
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "INSERT INTO entrega.tbendereco (endtipo, enddescricao) "  
                . "VALUES ('{$this->tipo}', '{$this->descricao}')";
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
        $sSql = "UPDATE entrega.tbendereco "
                . "SET endtipo = '{$this->tipo}',
                       enddescricao = '{$this->descricao}' "
                . "WHERE endcodigo = {$this->codigo}";
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
        $sSql = "DELETE FROM entrega.tbendereco "  
                . "WHERE endcodigo = '{$this->codigo}'";
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
        $oEndereco = new Endereco();
        $sSql = "SELECT * FROM entrega.tbendereco "
                . "WHERE endcodigo = {$this->codigo}";
        $oRes = $this->conexao->query($sSql);
        $aEndereco = pg_fetch_array($oRes); 
        if($aEndereco){
            $oEndereco->setCodigo($aEndereco[0]); 
            $oEndereco->setTipo($aEndereco[1]); 
            $oEndereco->setDescricao($aEndereco[2]); 
            $this->conexao->close();
            return $oEndereco;
        }
        else{
            return false;
        }
    }
    
    public function listar(){
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres"); 
        $aEndereco = Array();                                                                           
        $sSql = "SELECT * FROM entrega.tbendereco";  
        $oRes = $this->conexao->query($sSql);
        
        while($oEnderecoBanco = pg_fetch_assoc($oRes)){ 
            $oEndereco = new Endereco();
            $oEndereco->setCodigo($oEnderecoBanco['endcodigo']); 
            $oEndereco->setTipo($oEnderecoBanco['endtipo']); 
            $oEndereco->setDescricao($oEnderecoBanco['enddescricao']); 
            $aEndereco[] = $oEndereco;
        }
        $this->conexao->close(); //FECHA A CONEXAO COM O BANCO DE DADOS
        return $aEndereco; //RETORNA UM ARRAY COM OS RESULTADOS DA REPETIÇÃO
    }
}
