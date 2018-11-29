<?php

class Cliente{
    private $codigo;
    private $nome;
    /**
     *
     * @var Endereco $endereco
     */
    private $endereco;
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getInstancia();
        $oEndereco = new Endereco();
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEndereco(Endereco $endereco) {
        $this->endereco = $endereco;
    }

    public function inserir() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "INSERT INTO entrega.tbcliente (clinome, endcodigo) "
                . "VALUES ('{$this->nome}', {$this->endereco->getCodigo()})";
        $oRes = $this->conexao->query($sSql);
        $iQuantidadeLinhas = pg_affected_rows($oRes);
        
        if ($iQuantidadeLinhas > 0) {
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

    public function alterar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "UPDATE entrega.tbcliente "
                . "SET clinome='{$this->nome}',
                       endcodigo={$this->endereco->getCodigo()} "
                . "WHERE clicodigo={$this->codigo}";
        $oRes = $this->conexao->query($sSql);
        $iQuantidadeLinhas = pg_affected_rows($oRes);
        
        if ($iQuantidadeLinhas > 0) {
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

    public function deletar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "DELETE FROM entrega.tbcliente WHERE clicodigo='$this->codigo'";
        $oRes = $this->conexao->query($sSql);
        $iQuantidadeLinhas = pg_affected_rows($oRes);

        if ($iQuantidadeLinhas > 0) {
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

    public function listar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $aClientes = Array();
        $sSql = "SELECT clicodigo, clinome, tbendereco.endcodigo, enddescricao "
                . "FROM entrega.tbcliente "
                . "INNER JOIN entrega.tbendereco "
                . "ON entrega.tbcliente.endcodigo = entrega.tbendereco.endcodigo "
                . "ORDER BY clicodigo";
        $oRes = $this->conexao->query($sSql);

        while ($oClienteBanco = pg_fetch_assoc($oRes)) { 
            $oCliente = new Cliente();
            $oEndereco = new Endereco();
            $oCliente->setCodigo($oClienteBanco['clicodigo']); 
            $oCliente->setNome($oClienteBanco['clinome']);
            $oEndereco->setCodigo($oClienteBanco['endcodigo']);
            $oEndereco->setDescricao($oClienteBanco['enddescricao']);
            $oCliente->setEndereco($oEndereco);
            $aClientes[] = $oCliente;
        }
        $this->conexao->close();
        return $aClientes;
    }

    public function selecionar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $oCliente = new Cliente();
        $oEndereco = new Endereco();
        $sSql = "SELECT * FROM entrega.tbcliente WHERE clicodigo={$this->codigo}";
        $oRes = $this->conexao->query($sSql);
        $aArray = pg_fetch_array($oRes);

        if ($aArray) {
            $oCliente->setCodigo($aArray[0]);
            $oCliente->setNome($aArray[1]);
            $oEndereco->setCodigo($aArray[2]);
            $oCliente->setEndereco($oEndereco);
            $this->conexao->close();
            return $oCliente;
        } 
        else{
            return false;
        }

    }
    
}