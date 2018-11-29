<?php

class Pedido {

    private $codigo;
    private $descricao;
    private $datasolicitacao;
    private $dataentrega;

    /**
     *
     * @var Cliente $cliente
     */
    private $cliente;

    /**
     *
     * @var Entrega $entrega
     */
    private $entrega;
    private $situacao;
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getInstancia();
        $this->cliente = new Cliente();
        $this->entrega = new Entrega();
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDatasolicitacao() {
        return $this->datasolicitacao;
    }

    public function getDataentrega() {
        return $this->dataentrega;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getEntrega(){
        return $this->entrega;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDatasolicitacao($datasolicitacao) {
        $this->datasolicitacao = $datasolicitacao;
    }

    public function setDataentrega($dataentrega) {
        $this->dataentrega = $dataentrega;
    }

    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function setEntrega(Entrega $entrega) {
        $this->entrega = $entrega;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function inserir() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "INSERT INTO entrega.tbpedido (
                    peddescricao, pedsolicitacao, pedentrega, 
                    clicodigo, entcodigo, pedsituacao) "
                . "VALUES ('{$this->descricao}', '{$this->dataentrega}',
                  '{$this->datasolicitacao}', {$this->cliente->getCodigo()}, 
                   {$this->entrega->getCodigo()}, {$this->situacao})";
        $oRes = $this->conexao->query($sSql);
        $iQtdLinhas = pg_affected_rows($oRes);

        if ($iQtdLinhas > 0) {
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

    public function alterar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "UPDATE entrega.tbpedido "
                . "SET peddescricao = '{$this->descricao}', 
                        pedsolicitacao = '{$this->datasolicitacao}',
                        pedentrega = '{$this->dataentrega}', 
                    clicodigo = {$this->cliente->getCodigo()},
                    entcodigo = {$this->entrega->getCodigo()}, 
                    pedsituacao = {$this->situacao} "
                . "WHERE pedcodigo = {$this->codigo}";
        $oRes = $this->conexao->query($sSql);
        $iQtdLinhas = pg_affected_rows($oRes);
        if ($iQtdLinhas > 0) {
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

    public function deletar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "DELETE FROM entrega.tbpedido "
                . "WHERE pedcodigo = '{$this->codigo}'";
        $oRes = $this->conexao->query($sSql);
        $iQtdLinhas = pg_affected_rows($oRes);
        if ($iQtdLinhas > 0) {
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

    public function selecionar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $oPedido = new Pedido();
        $oEntrega = new Entrega();
        $oCliente = new Cliente();
        $sSql = "SELECT * FROM entrega.tbpedido WHERE pedcodigo = {$this->codigo}";
        $oRes = $this->conexao->query($sSql);
        $aPedido = pg_fetch_array($oRes);
        if ($aPedido) {
            $oPedido->setCodigo($aPedido[0]);
            $oPedido->setDescricao($aPedido[1]);
            $oPedido->setDatasolicitacao($aPedido[2]);
            $oPedido->setDataentrega($aPedido[3]);
            $oCliente->setCodigo($aPedido[4]);
            $oEntrega->setCodigo($aPedido[5]);
            $oPedido->setSituacao($aPedido[6]);
            $oPedido->setCliente($oCliente);
            $oPedido->setEntrega($oEntrega);
            $this->conexao->close();
            return $oPedido;
        } else {
            return false;
        }
    }

    public function listar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $aPedido = Array();
        $sSql = "SELECT * FROM entrega.tbpedido";
        $oRes = $this->conexao->query($sSql);
        while ($oPedidoBanco = pg_fetch_assoc($oRes)) {
            $oPedido = new Pedido();
            $oEntrega = new Entrega();
            $oCliente = new Cliente();
            $oPedido->setCodigo($oPedidoBanco['pedcodigo']);
            $oPedido->setDescricao($oPedidoBanco['peddescricao']);
            $oPedido->setDatasolicitacao($oPedidoBanco['pedsolicitacao']);
            $oPedido->setDataentrega($oPedidoBanco['pedentrega']);
            $oCliente->setCodigo($oPedidoBanco['clicodigo']);
            $oEntrega->setCodigo($oPedidoBanco['entcodigo']);
            $oPedido->setSituacao($oPedidoBanco['pedsituacao']);
            $oPedido->setCliente($oCliente);
            $oPedido->setEntrega($oEntrega);
            $aPedido[] = $oPedido;
        }
        $this->conexao->close();
        return $aPedido;
    }

    public function pesquisar() {
        $this->conexao->conecta("host=localhost dbname=entrega user=postgres password=postgres");
        $sSql = "SELECT pedcodigo, peddescricao, pedsolicitacao, pedentrega, tbcliente.clicodigo,
                        clinome, entcodigo, pedsituacao "
                . "FROM entrega.tbpedido "
                . "INNER JOIN entrega.tbcliente "
                . "USING (clicodigo)"
                . "WHERE clinome ILIKE '%{$this->cliente->getNome()}%'";
        $oRes = $this->conexao->query($sSql);
        while ($oPedidoBanco = pg_fetch_assoc($oRes)) {
            $oPedido = new Pedido();
            $oEntrega = new Entrega();
            $oCliente = new Cliente();
            $oPedido->setCodigo($oPedidoBanco['pedcodigo']);
            $oPedido->setDescricao($oPedidoBanco['peddescricao']);
            $oPedido->setDatasolicitacao($oPedidoBanco['pedsolicitacao']);
            $oPedido->setDataentrega($oPedidoBanco['pedentrega']);
            $oCliente->setCodigo($oPedidoBanco['clicodigo']);
            $oEntrega->setCodigo($oPedidoBanco['entcodigo']);
            $oPedido->setSituacao($oPedidoBanco['pedsituacao']);
            $oPedido->setCliente($oCliente);
            $oPedido->setEntrega($oEntrega);
            $aPedido[] = $oPedido;
        }
        $this->conexao->close();
        return $aPedido;
    }

}
